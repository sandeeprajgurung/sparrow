<div class="flex flex-col w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div class="px-4 py-5 bg-white sm:p-6">
        <form action="{{ route('content.about.store') }}" method="POST">
            @csrf
            <div class="col-span-6 mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Short Description</label>
                <input type="text" name="description" id="description"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>

            <div class="my-5">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                About List
            </h2>
        </div>

        <!-- Tailwind CSS table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Short Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Content
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Active
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($abouts as $about)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $about->title }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $about->description }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $about->content }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if ($about->status == 1)
                                                <input type="checkbox" id="checkbox{{ $about->id }}"
                                                    onclick="myFunction({{ $about->id }})"
                                                    class="form-checkbox h-5 w-5 text-red-600" checked>
                                            @else
                                                <input type="checkbox" id="checkbox{{ $about->id }}"
                                                    onclick="myFunction({{ $about->id }})"
                                                    class="form-checkbox h-5 w-5 text-red-600">
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('content.about.edit', $about->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            <form class="inline-block"
                                                action="{{ route('content.about.destroy', $about->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="_method" value="DELETE">
                                                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}">   -->
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                    value="Delete">
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tailwind CSS table -->
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function myFunction(id) {
        if ($('#checkbox' + id).is(":checked")) {
            $.ajax({
                url: `/content/about/status/` + id,
                type: 'PUT',
                data: {
                    status: 1,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert(id);
                }
            });
        } else {
            $.ajax({
                url: `/content/about/status/` + id,
                type: 'PUT',
                data: {
                    status: 0,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // alert('Load was performed.');
                }
            });
        }
        location.reload();
    }
</script>
