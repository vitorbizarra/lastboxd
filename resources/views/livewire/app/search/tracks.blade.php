<div class="max-w-screen-xl mx-auto flex flex-col px-4">
    <div class="py-8">
        <livewire:components.search-track-form />
    </div>
    <h2 class="mb-2 text-4xl font-bold dark:text-white">Results for "{{ $term }}"</h2>


    <div class="flex flex-col gap-4">
        <h3 class="text-3xl font-semibold dark:text-white">Tracks</h3>
        <livewire:components.search.tracks :term="$term" lazy />
    </div>
</div>