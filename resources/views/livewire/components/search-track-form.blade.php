<form wire:submit="search">
    <div class="flex flex-col">
        <div class="relative w-full rounded-full overflow-hidden">
            <input
                class="block ps-6 py-4 w-full text-xl text-gray-900 bg-gray-50 rounded-s-full rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-violet-500"
                type="search" placeholder="Search" wire:model="term">
            <button type="submit"
                class="absolute flex top-0 end-0 h-full aspect-square text-xl font-medium text-white bg-violet-700 rounded-e-full border border-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                <svg class="w-4 h-4 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </div>
        @error('term')<span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</form>