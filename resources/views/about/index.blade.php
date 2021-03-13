<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
                    <div @click.away="open = false"
                        class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
                        x-data="{ open: false }">
                        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                            <a href="#"
                                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Customize
                                UI</a>
                            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                                @click="open = !open">
                                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                    <path x-show="!open" fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                    <path x-show="open" fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <nav :class="{'block': open, 'hidden': !open}"
                            class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Home</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('about') }}">About</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Services</a>

                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    <a href="{{ route('service') }}">External Services</a>
                                    <svg fill="currentColor" viewBox="0 0 20 20"
                                        :class="{'rotate-180': open, 'rotate-0': !open}"
                                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="{{ route('servicedetail') }}">External Service Details</a>
                                    </div>
                                </div>
                            </div>

                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Protfolio</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('team') }}">Team</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('testimonial') }}">Testimonial</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('faq') }}">FAQ</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('contact') }}">Contact</a>
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    <span>Dropdown</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20"
                                        :class="{'rotate-180': open, 'rotate-0': !open}"
                                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="#">Link #1</a>
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="#">Link #2</a>
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="#">Link #3</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div
                        class="flex flex-col w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <form action="{{ route('about.store') }}" method="POST">
                            @csrf
                                <div class="col-span-6 mb-6">
                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="col-span-6 mb-6">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Short Description</label>
                                    <input type="text" name="description" id="description"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="col-span-6 mb-6">
                                    <label for="content"
                                        class="block text-sm font-medium text-gray-700">Content</label>
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
                                
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Short Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Content
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Active
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                                    @if($about->status == 1)
                                                        <input type="checkbox" id="checkbox{{$about->id}}" onclick="myFunction({{ $about->id }})" class="form-checkbox h-5 w-5 text-red-600" checked>
                                                    @else
                                                        <input type="checkbox" id="checkbox{{$about->id}}" onclick="myFunction({{ $about->id }})" class="form-checkbox h-5 w-5 text-red-600">
                                                    @endif

                                                    <!-- <input type="checkbox" id="checkbox{{$about->id}}" onclick="myFunction({{ $about->id }})"> -->
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('about.edit', $about->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                    <form class="inline-block" action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                </div>
            </div>
        </div>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'content' );

        </script>
        
        <!-- <script type="text/javascript">
            function myFunction() {
            var checkBox = document.getElementById("checkbox");
                alert("hre");
            }
        </script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function myFunction(id){
                if($('#checkbox'+id).is(":checked")){
                    $.ajax({
                        url: `/content/about/status/`+id,
                        type: 'PUT',
                        data: {status:1, _token: '{{csrf_token()}}'},
                        success: function(data) {
                            // alert(id);
                        }
                    });
                }
                else{
                    $.ajax({
                        url: `/content/about/status/`+id,
                        type: 'PUT',
                        data: {status:0, _token: '{{csrf_token()}}'},
                        success: function(data) {
                            // alert('Load was performed.');
                        }
                    });
                }
                location.reload();
            }

            // $(document).ready(function(){
            //     $('#checkbox').change(function () {
            //         if($('#checkbox').is(":checked")){
            //             $.ajax({
            //                 url: 'http://127.0.0.1:8000/content/about/status/1',
            //                 type: 'PUT',
            //                 data: {status:1},
            //                 success: function(data) {
            //                     alert('Load was performed.');
            //                 }
            //             });
            //         }
            //         else{
            //             $.ajax({
            //                 url: 'http://127.0.0.1:8000/content/about/status/1',
            //                 type: 'PUT',
            //                 data: {status:0},
            //                 success: function(data) {
            //                     alert('Load was performed.');
            //                 }
            //             });
            //         }
            //         // $.post(Url,data, function(data, status){
            //         //     console.log(`${data} and status is ${status}`)
            //         // })
            //         // alert('changed');
            //     });
            // })
        </script>

</x-app-layout>
