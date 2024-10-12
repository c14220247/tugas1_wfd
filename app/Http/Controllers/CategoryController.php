<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['title'] = "Event Category List";
        $data['categories'] = Category::all();
        return view('categories', $data);
    }

    public function create()
    {
        $data['title'] = "Create Event Category";
        return view('category-create', $data);
    }

    public function edit(Category $category)
    {
        $data['title'] = "Edit category";
        $data['category'] = $category;
        return view('category-edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        $valid = $request->validate([
            'name' => 'required',
        ]);

        $category->update($valid);
        return redirect()->route('categories')->with('success', 'Event category updated successfully');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')->with('success', 'Event category deleted successfully');
    }
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
        ]);

        Category::create($valid);
        return redirect()->route('categories')->with('success', 'Event category created successfully');
    }

    public function show(Category $organizer)
    {
        $data['title'] = "Organizer Details";
        $data['organizer'] = $organizer->load(['events']);
        return view('organizer-details', $data);
    }
}
