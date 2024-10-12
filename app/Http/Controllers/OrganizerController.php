<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $data['title'] = "Organizer List";
        $data['organizers'] = Organizer::all();
        return view('organizers', $data);
    }

    public function create()
    {
        $data['title'] = "Create Organizer";
        return view('organizer-create', $data);
    }

    public function edit(Organizer $organizer)
    {
        $data['title'] = "Edit Organizer";
        $data['organizer'] = $organizer->load(['events']);
        return view('organizer-edit', $data);
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'facebook_link' => 'required|url',
            'x_link' => 'required|url',
            'website_link' => 'required|url',
            'description' => 'required',
        ]);

        Organizer::create($valid);
        return redirect()->route('organizers')->with('success', 'Organizer created successfully');
    }
    public function update(Request $request, Organizer $organizer)
    {
        $valid = $request->validate([
            'name' => 'required',
            'facebook_link' => 'required|url',
            'x_link' => 'required|url',
            'website_link' => 'required|url',
            'description' => 'required',
        ]);

        $organizer->update($valid);
        return redirect()->route('organizers')->with('success', 'Organizer updated successfully');
    }

    public function show(Organizer $organizer)
    {
        $data['title'] = "Organizer Details";
        $data['organizer'] = $organizer->load(['events']);
        return view('organizer-details', $data);
    }

    public function delete(Organizer $organizer)
    {
        $organizer->delete();
        return redirect()->route('organizers')->with('success', 'Organizer deleted successfully');
    }
}
