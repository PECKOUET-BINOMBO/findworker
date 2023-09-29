<div class="inline-block relative" x-data="{ open: true }">
    <input @click.away="open = false; resetIndex()" @click="open = true" type="text" class="w-56 mr-3 bg-white-200 text-gray-700 border-2 focus:outline-none placeholder-gray-500 px-2 rounded-full" placeholder="Rechercher une offre..." wire:model="query" wire:keydown.arrow-down.prevent="incrementIndex" wire:keydown.arrow-up.prevent="decrementIndex" wire:keydown.backspace="resetIndex" wire:keydown.enter.prevent="showJob">

    @if(strlen($query) >= 1)
    <div class="absolute border rounded bg-white text-gray-700 font-semibold p-1 text-md w-56 mt-2" x-show="open">
        @if(count($jobs) > 0)
        @foreach($jobs as $index => $job)
        <p class="p-1 {{ $index === $selectedIndex ? 'text-orange-500 font-semibold' : '' }}">{{ $job->title }}</p>
        @endforeach
        @else
        <span class="text-orange-500 p-1">0 résultats pour "{{$query}}"</span>
        @endif
    </div>
    @endif
</div>
