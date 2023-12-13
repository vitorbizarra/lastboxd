<div class="max-w-screen-xl mx-auto flex flex-col px-4">
    <div class="py-8">
        <livewire:components.search-track-form />
    </div>
    <h2 class="mb-2 text-4xl font-bold dark:text-white">Results for "{{ $term }}"</h2>
    <div class="flex flex-col gap-8">
        <div class="flex flex-col gap-4">
            <h3 class="text-3xl font-semibold dark:text-white">Artists</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @foreach ($artists['items'] as $artist)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center p-4">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ data_get($artist,'images.0.url', 'https://source.boringavatars.com/marble/120/' . urlencode($artist['name'])) }}"
                            alt="{{ $artist['name'] }}" />

                        <h5 class="mb-1 text-xl font-medium text-center w-full truncate text-gray-900 dark:text-white">
                            {{ $artist['name'] }}
                        </h5>
                        <span class="text-sm py-1 px-2 rounded-full bg-gray-900 text-gray-400">{{
                            str($artist['type'])->title() }}</span>
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

        <div class="flex flex-col gap-4">
            <h3 class="text-3xl font-semibold dark:text-white">Albums</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @foreach ($albums['items'] as $album)
                <div
                    class="w-full max-w-sm relative flex border border-gray-200 dark:border-gray-700 rounded-lg shadow overflow-hidden aspect-square
                    before:absolute before:top-0 before:left-0 before:h-full before:w-full before:content-[''] before:bg-gradient-to-b before:from-transparent before:to-black before:z-10">
                    <div class="relative p-4 z-10 mt-auto w-full flex flex-col">
                        <h5 class="mb-1 text-xl font-medium w-full truncate text-gray-900 dark:text-white">
                            {{ $album['name'] }}
                        </h5>
                        <span class="text-sm text-gray-300 w-full truncate">
                            {{ date('Y', strtotime($album['release_date'])) }} - {{
                            collect($album['artists'])->pluck('name')->implode(', ') }}
                        </span>

                    </div>
                    <img src="{{ $album['images'][0]['url'] }}" alt="{{ $album['name'] }}"
                        class="absolute w-full top-0 left-0 rounded-lg" />
                </div>
                @endforeach

            </div>
        </div>

        <div class="flex flex-col gap-4">
            <h3 class="text-3xl font-semibold dark:text-white">Tracks</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @foreach ($tracks['items'] as $track)
                <div
                    class="w-full max-w-sm relative flex border border-gray-200 dark:border-gray-700 rounded-lg shadow overflow-hidden aspect-square
                    before:absolute before:top-0 before:left-0 before:h-full before:w-full before:content-[''] before:bg-gradient-to-b before:from-transparent before:to-black before:z-10">

                    <div class="relative p-4 z-10 mt-auto w-full flex flex-col">
                        <h5 class="mb-1 text-xl font-medium w-full truncate text-gray-900 dark:text-white">
                            {{ $track['name'] }}
                        </h5>
                        <span class="text-sm text-gray-300 w-full truncate">
                            {{ $track['album']['name'] }} - {{
                            collect($track['artists'])->pluck('name')->implode(', ') }}
                        </span>
                    </div>
                    <img src="{{ $track['album']['images'][0]['url'] }}" alt="{{ $track['name'] }}"
                        class="absolute w-full top-0 left-0 rounded-lg" />
                    @if ($track['preview_url'])
                    <div class="absolute top-0 right-0 z-20 p-1">
                        <button class="bg-violet-800 text-white p-1 rounded-full" x-on:click="                           
                                $refs.trackPreviewSource.src = '{{ $track['preview_url'] }}';
                                $refs.trackPreviewAudio.load()
                                $refs.trackPreviewAudio.play()
                                ">
                            <span class="bi bi-play-fill"></span>
                        </button>
                    </div>
                    @endif
                </div>
                @endforeach
                <audio x-ref="trackPreviewAudio">
                    <source x-ref="trackPreviewSource" src="" type="audio/mpeg" />
                    Your browser does not support the audio format.
                </audio>
            </div>
        </div>
    </div>
</div>