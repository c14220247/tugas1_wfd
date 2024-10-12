@extends('layout')

@section('content')
    <section class="w-screen px-16 py-8 max-sm:py-4 max-sm:px-8">
        <h2 class="text-2xl max-sm:text-xl">{{ $event->category->name }}</h2>
        <h1 class="text-3xl font-bold max-sm:text-2xl">{{ $event->title }}</h1>
        <img class="my-4" src="{{ asset('assets/600x400.png') }}" alt="Image">
        <div class="grid grid-cols-2 w-fit gap-x-32 gap-y-8 max-md:gap-x-24 max-sm:gap-x-16">
            <div>
                <h2 class="font-bold sm:text-xl max-sm:text-lg">Organizer</h2>
                <p>{{ $event->organizer->name }}</p>
            </div>
            <div>
                <h2 class="font-bold sm:text-xl max-sm:text-lg">Booking URL</h2>
                <a href="{{ $event->booking_url }}">{{ $event->booking_url }}</a>
            </div>
            <div>
                <h2 class="font-bold sm:text-xl max-sm:text-lg">Date and Time</h2>
                <p>{{ $event->date . ' - ' . $event->start_time }}</p>
            </div>
            <div>
                <h2 class="font-bold sm:text-xl max-sm:text-lg">Location</h2>
                <p>{{ $event->venue }}</p>
            </div>
        </div>
        <h2 class="font-bold sm:text-xl max-sm:text-lg mt-8">About This Event</h2>
        <p>{{ $event->description }}</p>

        <h2 class="font-bold sm:text-xl max-sm:text-lg mt-8">Tags</h2>
        <div class="flex gap-x-4 mt-2">
            @foreach ($tags as $tag)
                <p class="border-black border w-fit px-4 bg-neutral-100 py-1">{{ $tag }}</p>
            @endforeach
        </div>
    </section>
@endsection
