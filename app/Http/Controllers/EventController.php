<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data['title'] = "Event List";
        $data['events'] = Event::with(['organizer', 'category'])->get();
        return view('events', $data);
    }

    public function master()
    {
        $data['title'] = "Event List";
        $data['events'] = Event::with(['organizer', 'category'])->get();
        return view('master-events', $data);
    }

    public function show(Event $event)
    {
        $data['title'] = "Event Details";
        $data['event'] = $event->load(['organizer', 'category']);
        $data['tags'] = json_decode($event->tags);
        return view('event-details', $data);
    }


    public function create()
    {
        $data['title'] = "Create Event";
        $data['organizers'] = Organizer::all();
        $data['categories'] = Category::all();
        return view('event-create', $data);
    }

    public function edit(Event $event)
    {
        $data['title'] = "Edit Event";
        $data['event'] = $event->load(['organizer', 'category']);
        $data['organizers'] = Organizer::all();
        $data['categories'] = Category::all();
        return view('event-edit', $data);
    }

    public function store(Request $request)
    {

        $tags = explode(',', $request->tags);
        $valid = $request->validate([
            'title' => 'required',
            'organizer_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'booking_url' => 'required|url',
            'start_time' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'tags' => 'required',
        ]);

        $valid['tags'] = json_encode($tags);
        Event::create($valid);
        return redirect()->route('events.master')->with('success', 'Event created successfully');
    }
    public function update(Request $request, Event $event)
    {
        $tags = explode(',', $request->tags);
        $valid = $request->validate([
            'title' => 'required',
            'organizer_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'booking_url' => 'required|url',
            'start_time' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'tags' => 'required',
        ]);

        $valid['tags'] = json_encode($tags);
        $event->update($valid);
        return redirect()->route('events.master')->with('success', 'Event updated successfully');
    }


    public function delete(Event $event)
    {
        $event->delete();
        return redirect()->route('events.master')->with('success', 'Event deleted successfully');
    }
}
