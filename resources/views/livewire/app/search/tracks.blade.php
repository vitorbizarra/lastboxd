<div class="max-w-screen-xl mx-auto flex flex-col px-4">
    <div class="py-8">
        <livewire:components.search-track-form />
    </div>
    <h2 class="mb-2 text-4xl font-bold dark:text-white">Results for "{{ $term }}"</h2>


    <div class="flex flex-col gap-4">
        <h3 class="text-3xl font-semibold dark:text-white">Tracks</h3>
        <div class="flex flex-col gap-4">
            @foreach ($tracks['items'] as $track)
            <div
                class="bg-white rounded-lg shadow dark:bg-gray-800 w-full flex p-4 h-32 gap-4 hover:bg-gray-100 hover:dark:bg-gray-700 transition-all ease-in-out">
                <div class="relative h-full w-auto aspect-square rounded-lg overflow-hidden">
                    <img src="{{ $track['album']['images'][0]['url'] }}" alt="{{ $track['name'] }}" class="w-full" />
                    @if ($track['preview_url'])
                    <div
                        class="absolute flex top-0 right-0 w-full h-full z-20 bg-gradient-to-b from-transparent to-black text-white">
                        <button class="m-auto text-4xl" x-on:click="                           
                                        $refs.trackPreviewSource.src = '{{ $track['preview_url'] }}';
                                        $refs.trackPreviewAudio.load()
                                        $refs.trackPreviewAudio.play()
                                        ">
                            <span class="bi bi-play-fill"></span>
                        </button>
                    </div>
                    @endif
                </div>

                <div class="">
                    <h4 class="text-xl font-semibold dark:text-white">
                        {{ $track['name'] }}
                    </h4>
                    <span class="text-gray-200">
                        {{ $track['album']['name'] }} - {{ collect($track['artists'])->pluck('name')->implode(', ') }}
                    </span>
                </div>
                <div class="ms-auto my-auto dark:text-white">
                    <a href="#">
                        See <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            {{-- <div
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
            </div> --}}
            @endforeach
            <audio x-ref="trackPreviewAudio">
                <source x-ref="trackPreviewSource" src="" type="audio/mpeg" />
                Your browser does not support the audio format.
            </audio>
        </div>
    </div>
</div>