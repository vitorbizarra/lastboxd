<div class="max-w-screen-xl mx-auto flex flex-col">
    <div class="py-8">
        <livewire:components.search-track-form />
    </div>
    <div class="flex flex-col gap-4">
        <h2 class="text-4xl font-extrabold dark:text-white">Results for: "{{ $term }}"</h2>



        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach ($artists['items'] as $artist)
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center py-4">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $artist['images'][0]['url'] }}"
                        alt="{{ $artist['name'] }}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $artist['name'] }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add friend
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">
                            Message
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>