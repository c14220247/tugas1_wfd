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
        <h1 class="text-4xl font-bold">Categories</h1>
        <button class="bg-primary mt-4 text-white text-xl w-fit px-4 py-2 rounded-2xl"
            onclick="window.location.href='{{ route('category.create') }}'">+ Create</button>
        <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
            <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const customDatatable = document.getElementById("datatable");
        const data = @json($categories);
        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: `<span class="text-black">No</span>`,
                        field: "index",
                        sort: true,
                    }, {
                        label: `<span class="text-black">Event Category Name</span>`,
                        field: "name",
                        sort: true,
                    },
                    {
                        label: `<span class="text-black">Actions</span>`,
                        field: "actions",
                        sort: true,
                    },
                ],
                rows: data.map((category, i) => {
                    return {
                        index: `<p class="text-black font-medium">${i + 1}</p>`,
                        ...category,
                        name: `<p class="text-black font-medium">${category.name}</p>`,
                        actions: `
    <div class="flex">
       
        <button data-te-ripple-init data-te-ripple-color="light" onclick="window.location.href='{{ route('category.edit', '') }}/${category.id}'"
            class="members-button mr-3 btn-detail block rounded bg-warning px-4 py-2 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
            <i class="fa-solid fa-pen text-base"></i>
        </button>
        <form class="contents" method="POST" action="{{ route('category.delete', '') }}/${category.id}">
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
