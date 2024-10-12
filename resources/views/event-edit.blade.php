@extends('layout')

@section('content')
    <section class="w-screen px-16 py-8">
        <h1 class="text-4xl font-bold">Edit Event</h1>
        <form method="POST" action="{{ route('event.update', $event->id) }}" class="contents">
            @csrf
            @method('PUT') <!-- This is important for PATCH/PUT requests -->
            <div class="flex flex-col w-[500px] gap-y-4 mt-8">
                <div class="flex gap-x-8 w-full">
                    <div class="flex flex-col w-full">
                        <label for="title">Event Title</label>
                        <input value="{{ old('title', $event->title) }}" class="border border-black" type="text"
                            id="title" name="title">
                        @error('title')
                            <p class="text-danger text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="date">Date</label>
                        <input value="{{ old('date', $event->date) }}" class="border border-black" type="date"
                            id="date" name="date">
                        @error('date')
                            <p class="text-danger text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-x-8 w-full">
                    <div class="flex flex-col w-full">
                        <label for="venue">Location</label>
                        <input value="{{ old('venue', $event->venue) }}" class="border border-black" type="text"
                            id="venue" name="venue">
                        @error('venue')
                            <p class="text-danger text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="start_time">Start Time</label>
                        <input value="{{ old('start_time', $event->start_time) }}" class="border border-black"
                            type="time" id="start_time" name="start_time">
                        @error('start_time')
                            <p class="text-danger text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-x-8 w-full">
                    <div class="flex flex-col w-full">
                        <label for="organizer_id">Organizer</label>
                        <select name="organizer_id" id="organizer_id" class="border border-black">
                            @foreach ($organizers as $organizer)
                                <option value="{{ $organizer->id }}"
                                    {{ old('organizer_id', $event->organizer_id) == $organizer->id ? 'selected' : '' }}>
                                    {{ $organizer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="event_category_id">Category</label>
                        <select name="event_category_id" id="event_category_id" class="border border-black">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('event_category_id', $event->event_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="booking_url">Booking URL</label>
                    <input value="{{ old('booking_url', $event->booking_url) }}" class="border border-black" type="url"
                        id="booking_url" name="booking_url">
                    @error('booking_url')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="description">About</label>
                    <textarea class="border border-black" id="description" name="description">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="max-w-md mx-auto mt-10">
                    <label for="chips-input" class="block mb-2 text-sm font-medium text-gray-700">Add Tags</label>

                    <div class="flex flex-wrap items-center border rounded-lg p-2 gap-2">
                        <ul id="chips-container" class="flex flex-wrap gap-2">
                            <!-- Chips will be dynamically added via JavaScript -->
                        </ul>
                        <input id="chips-input" type="text" class="flex-1 outline-none border-none focus:ring-0 p-2"
                            placeholder="Type a tag..." />
                        <button type="button" id="add-chip-btn"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                            Add Tag
                        </button>
                    </div>
                </div>
                <input type="hidden" name="tags" id="tags-hidden-input" value="{{ old('tags', $event->tags) }}" />

                <div class="flex gap-x-4">
                    <button class="px-4 py-1 bg-success text-white" type="submit">Update Event</button>
                    <a href="{{ route('events.master') }}" class="contents">
                        <button class="px-4 py-1 bg-warning text-white">Cancel/Back</button>
                    </a>
                </div>
            </div>
        </form>
    </section>

    <script>
        const inputField = document.getElementById('chips-input');
        const chipsContainer = document.getElementById('chips-container');
        const addButton = document.getElementById('add-chip-btn');
        const hiddenInput = document.getElementById('tags-hidden-input');

        // Decode JSON encoded tags and initialize them
        let selectedTags = {!! json_encode(json_decode(old('tags', $event->tags))) !!};

        // Initialize tags and display them on page load
        selectedTags.forEach(tag => {
            if (tag.trim()) {
                addChip(tag.trim()); // Ensure to trim whitespace around tags
            }
        });

        addButton.addEventListener('click', function() {
            const tagValue = inputField.value.trim();

            if (tagValue !== '' && !selectedTags.includes(tagValue)) {
                selectedTags.push(tagValue);
                addChip(tagValue);
                updateHiddenInput();
                inputField.value = ''; // Clear input field after adding a tag
            }
        });

        function addChip(value) {
            const chip = document.createElement('li');
            chip.className = 'flex items-center bg-blue-500 text-white px-3 py-1 rounded-full';

            const chipText = document.createElement('span');
            chipText.textContent = value;

            const removeButton = document.createElement('button');
            removeButton.innerHTML = '&times;';
            removeButton.className = 'ml-2 text-white hover:text-gray-300 focus:outline-none';
            removeButton.addEventListener('click', function() {
                chipsContainer.removeChild(chip);
                selectedTags = selectedTags.filter(tag => tag !== value);
                updateHiddenInput();
            });

            chip.appendChild(chipText);
            chip.appendChild(removeButton);
            chipsContainer.appendChild(chip);
        }

        function updateHiddenInput() {
            hiddenInput.value = selectedTags.join(',');
        }
    </script>
@endsection
