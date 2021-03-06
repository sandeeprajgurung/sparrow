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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-3">
                <p>fhdskjfhdsjkfhjkds</p>
                <p>nhflkdsjfkldjslkf jdsklfjkdlsjf kldsjfk ldsjkfldjsklf jdsklfjkdlsjfklsjfl kdsjkfljsd klfjksdlfjlkds</p>
            </div>
            <div class="mb-3">
                <p>fhdskjfhdsjkfhjkds</p>
                <p>nhflkdsjfkldjslkfj dsklfjkd lsjfklds jfklds jkfldjsk lfjdsklfjkdlsjf klsjflkds jkfljsdklfjks dlfjlkds</p>
            </div>
            <div class="mb-3">
                <p>fhdskjfhdsjkfhjkds</p>
                <p>nhflkdsjfkldjslkfj dsklfjkd lsjfkldsj fkldsjk fldjsklfjdsklfjkd lsjfklsjflkdsj kfljsd klfj ksdl fjlkds</p>
            </div>
        </div>
    </div>
</div>