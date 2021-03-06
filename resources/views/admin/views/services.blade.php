<div class="services">
    <form action="{{ route('content.services.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="col-span-6 mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6 mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="description" id="description"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="my-5">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>

    <div class="services-review">
        <p class="text-lg font-semibold tracking-widest text-gray-900 uppercase mb-5">Current layout</p>
        @if($services)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @foreach ($services as $service)
            <div class="services-review-block">
                <p>{{ $service->title }}</p>
                <p>{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>