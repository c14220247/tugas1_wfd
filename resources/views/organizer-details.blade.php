@extends('layout')

@section('content')
    <section class="w-screen px-16 py-8">
        <h1 class="text-3xl font-bold mb-4">Organizer Details</h1>
        <p class="font-bold text-xl">{{ $organizer->name }}</p>
        <div class="flex mb-4 mt-2">
            <button data-te-ripple-init data-te-ripple-color="light"
                onclick="window.location.href='{{ route('organizer.edit', $organizer->id) }}'"
                class="members-button mr-3 btn-detail block rounded bg-warning px-4 py-2 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                <i class="fa-solid fa-pen text-base"></i>
            </button>
            <form class="contents" method="POST" action="{{ route('organizer.delete', $organizer->id) }}">
                @csrf
                @method('DELETE')
                <button data-te-ripple-init data-te-ripple-color="light" type="submit"
                    class="mr-3 btn-detail block rounded bg-danger px-4 py-2 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out">
                    <i class="fa-solid fa-trash text-base"></i>
                </button>
            </form>
        </div>
        <p class="font-bold">Facebook: <a class="text-primary underline"
                href="{{ $organizer->facebook_link }}">{{ $organizer->facebook_link }}</a></p>
        <p class="font-bold">X: <a class="text-primary underline"
                href="{{ $organizer->x_link }}">{{ $organizer->x_link }}</a></p>
        <p class="font-bold">Webiste: <a class="text-primary underline"
                href="{{ $organizer->website_link }}">{{ $organizer->website_link }}</a></p>
        <h2 class="font-bold text-xl">About</h2>
        <p>{{ $organizer->description }}</p>
    </section>
@endsection
