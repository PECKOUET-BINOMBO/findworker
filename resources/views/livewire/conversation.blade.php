<div>
    <div class="flex mt-10">
        @include('partials.pub')

        <div class="flex flex-col px-2 max-w-1/2 w-1/2 mx-auto box-message pt-5">

            @foreach($conversation->messages as $message)
            <div class="rounded-lg px-3 py-3 mb-2 font-medium
    {{ $message->user->id === auth()->user()->id  ? 'bg-orange-500 text-white ml-auto max-w-1/2 w-1/2' : 'mr-auto bg-gray-300 text-gray-700 max-w-1/2 w-1/2'}}">
                <p class="font-light">{{ $message->user->id === auth()->user()->id  ? 'Vous : ' : $message->user->name . ' :'}}</p>
                <p>{{ $message->content }}</p>
            </div>
            @endforeach
            <textarea wire:keydown.enter.prevent="sendMessage" wire:model="message" class="border rounded px-3 py-4 mt-3 mb-5 shadow-md w-full"></textarea>
        </div>

    </div>
</div>
