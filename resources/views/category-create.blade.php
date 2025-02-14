@extends('layout')

@section('content')
    <section class="w-screen px-16 py-8">
        <h1 class="text-4xl font-bold">Create Event Category</h1>
        <form method="POST" action="{{ route('category.store') }}" class="contents">
            @csrf
            <div class="flex flex-col w-[500px] gap-y-4 mt-8">
                <div class="flex flex-col">
                    <label for="name">Category Name</label>
                    <input value="{{ old('name') }}" class="border border-black" type="text" id="name"
                        name="name">
                    @error('name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-x-4">
                    <button class="px-4 py-1 bg-success text-white" type="submit">Save Changes</button>
                    <a href="{{ route('categories') }}" class="contents">
                        <button class="px-4 py-1 bg-warning text-white">Cancel/Back</button>
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection
