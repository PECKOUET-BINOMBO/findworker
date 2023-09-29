<div x-data="{ open: false, message: '', type: '' }" x-init="
        Livewire.on('flash', (message, type) => {
            open = true;
            this.message = message;
            this.type = type;
            setTimeout(() => {
                open = false;
            }, 5000);
        })
    ">

    <div x-show="open" x-cloak class="border {{ $type ? $colors[$type] : '' }} px-1 py-2 rounded">
        {{ $message }}
    </div>

</div>
