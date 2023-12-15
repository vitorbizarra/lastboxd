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
    @endforeach
    <audio x-ref="trackPreviewAudio">
        <source x-ref="trackPreviewSource" src="" type="audio/mpeg" />
        Your browser does not support the audio format.
    </audio>
</div>