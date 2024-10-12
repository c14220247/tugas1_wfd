@extends('layout')

@section('content')
    <section class="w-screen px-16 py-8">
        <h1 class="text-4xl font-bold">Edit Organizer</h1>
        <form method="POST" action="{{ route('organizer.update', $organizer->id) }}" class="contents">
            @method('PUT')
            @csrf
            <div class="flex flex-col w-[500px] gap-y-4 mt-8">
                <div class="flex flex-col">
                    <label for="name">Organizer Name</label>
                    <input value="{{ $organizer->name }}" class="border border-black pl-1" type="text" id="name"
                        name="name">
                    @error('name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-x-8 w-full">
                    <div class="flex flex-col w-full">
                        <label for="facebook">Facebook Link</label>
                        <input value="{{ $organizer->facebook_link }}" class="border border-black pl-1" type="url" id="facebook"
                            name="facebook_link">
                        @error('facebook_link')
                            <p class="text-danger text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="x">X Link</label>
                        <input value="{{ $organizer->x_link }}" class="border border-black pl-1" type="url" id="x"
                            name="x_link">
                        @error('x_link')
                            <p class="text-danger text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="website">Website Link</label>
                    <input value="{{ $organizer->website_link }}" class="border border-black pl-1" type="url" id="website"
                        name="website_link">
                    @error('website_link')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="website">About</label>
                    <textarea class="border border-black pl-1" type="url" id="website" name="description">{{ $organizer->description }}</textarea>
                    @error('description')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-x-4">
                    <button class="px-4 py-1 bg-success text-white" type="submit">Save Changes</button>
                    <a href="{{ route('organizers') }}" class="contents">
                        <button class="px-4 py-1 bg-warning text-white">Cancel/Back</button>
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection
