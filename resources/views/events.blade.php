@extends('layout')

@section('content')
    <section class="w-screen py-8 lg:px-16 md:px-8 px-4">
        <h1 class="font-bold text-3xl mb-4">Events in Surabaya</h1>
        <div class="grid grid-cols-3 max-md:grid-cols-2 lg:gap-16 md:gap-8 gap-4 max-md:gap-y-8">
            @foreach ($events as $event)
                <div>
                    <img src="{{ asset('assets/600x400.png') }}" alt="Event's Image">
                    <p class="my-4">{{ $event->title }}</p>
                    <p class="font-bold">{{ $event->date . ' - ' . $event->start_time }}</p>
                    <p>{{ $event->venue }}</p>
                    <p class="mt-4">Free</p>
                    <p>Organizer: {{ $event->organizer->name }}</p>
                    <a href="{{ route('event.show', $event->id) }}" class="contents">
                        <button class="h-[35px] w-fit px-4 mt-2 rounded-xl bg-primary text-white">View Details</button>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
