<div wire:poll.60000ms="refresh" class="flex justify-center items-center">
    <span title="Timezone: {{ config('app.timezone') }}"
        class="inline-block px-3.5 py-[3px] border-2 border-secondary-dark rounded-tr-[10px] rounded-bl-[10px] font-semibold text-[0.8rem] tracking-wider text-primary transition-all duration-300 ease-in-out hover:shadow-md"
        style="box-shadow: 0 0 4px rgba(15, 118, 110, 0.6), 0 0 8px rgba(26, 82, 206, 0.4);">
        {{ $time }}
    </span>
</div>