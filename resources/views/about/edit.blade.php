<div
    class="flex flex-col w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div class="px-4 py-5 bg-white sm:p-6">
        <form action="{{ route('content.about.update',$about->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="col-span-6 mb-6">
                <label for="title"
                    class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $about->title }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 mb-6">
                <label for="description"
                    class="block text-sm font-medium text-gray-700">Short Description</label>
                    <input type="text" name="description" id="description" value="{{ $about->description }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 mb-6">
                <label for="content"
                    class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ $about->content }}</textarea>
            </div>
            
            <div class="my-5">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
                
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>