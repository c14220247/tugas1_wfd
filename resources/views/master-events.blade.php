@extends('layout')

@section('content')
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            })
        </script>
    @endif
    <div class=" px-16 pt-8">
        <h1 class="text-4xl font-bold">Master Events</h1>
        <button class="bg-primary mt-4 text-white text-xl w-fit px-4 py-2 rounded-2xl"
            onclick="window.location.href='{{ route('event.create') }}'">+ Create</button>
        <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
            <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const customDatatable = document.getElementById("datatable");
        const data = @json($events);
        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: `<span class="text-black">No</span>`,
                        field: "index",
                        sort: true,
                    }, {
                        label: `<span class="text-black">Event Name</span>`,
                        field: "name",
                        sort: true,
                    }, {
                        label: `<span class="text-black">Date</span>`,
                        field: "date",
                        sort: true,
                    },
                    {
                        label: `<span class="text-black">Location</span>`,
                        field: "venue",
                        sort: true,
                    }, {
                        label: `<span class="text-black">Organizer</span>`,
                        field: "organizer",
                        sort: true,
                    }, {
                        label: `<span class="text-black">About</span>`,
                        field: "description",
                        sort: true,
                        width: 400,
                    }, {
                        label: `<span class="text-black">Tags</span>`,
                        field: "tags",
                        sort: true,
                    },
                    {
                        label: `<span class="text-black">Actions</span>`,
                        field: "actions",
                        sort: true,
                    },
                ],
                rows: data.map((event, i) => {
                    const tagsArray = JSON.parse(event.tags);
                    return {
                        index: `<p class="text-black font-medium">${i + 1}</p>`,
                        ...event,
                        name: `<a class="text-primary underline font-medium" href="{{ route('event.show', '') }}/${event.id}">${event.title}</a>`,
                        date: `<p class="font-normal">${event.date}</p><p class="font-normal">${event.start_time}</p>`,
                        venue: `<span class="font-normal">${event.venue}</span>`,
                        description: `<p class="font-normal h-fit text-wrap">${event.description}</p>`,
                        organizer: `<span class="font-normal">${event.organizer.name}</span>`,
                        tags: tagsArray.length > 0 ?
                            tagsArray.map(tag =>
                                `<p class="bg-slate-200 text-black font-normal px-2 my-2 py-1 rounded">${tag}</p>`).join(
                                ' ') : `<p class="font-normal">No Tags</p>`,
                        actions: `
                                    <div class="flex">
                                        <button data-te-ripple-init data-te-ripple-color="light" onclick="window.location.href='{{ route('event.edit', '') }}/${event.id}'"
                                            class="members-button mr-3 btn-detail block rounded bg-warning px-4 py-2 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                                            <i class="fa-solid fa-pen text-base"></i>
                                        </button>
                                    <form class="contents" method="POST" action="{{ route('event.delete', '') }}/${event.id}">
                                            @csrf
                                            @method('DELETE')
                                            <button data-te-ripple-init data-te-ripple-color="light" type="submit"
                                                class="mr-3 btn-detail block rounded bg-danger px-4 py-2 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out">
                                                <i class="fa-solid fa-trash text-base"></i>
                                            </button>
                                        </form>
                                    </div>
                                `
                    };

                }),
            }, {
                hover: true,
                stripped: true
            },
        );
    </script>
@endsection
