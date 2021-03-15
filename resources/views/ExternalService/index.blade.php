<div class="flex flex-col w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <form action="{{ route('content.service.store') }}" method="POST">
                            @csrf
                                <div class="col-span-6 mb-6">
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="col-span-6 mb-6">
                                    <label for="icon"
                                        class="block text-sm font-medium text-gray-700">Icon</label>
                                    <input type="text" name="icon" id="icon"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="col-span-6 mb-6">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Description</label>

                                        <textarea class="form-control" id="description" name="description"></textarea>
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
                                    External Service List
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
                                
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Icon
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($externalServices as $externalService)
                                            <tr>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $externalService->name }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <i class="{{ $externalService->icon }}" style="font-size:24px;"></i>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $externalService->description }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('content.service.edit', $externalService->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                    <form class="inline-block" action="{{ route('content.service.destroy', $externalService->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                         <input type="hidden" name="_method" value="DELETE"> 
                                                         <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}">   -->
                                                        <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
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
    CKEDITOR.replace( 'description' );
</script>