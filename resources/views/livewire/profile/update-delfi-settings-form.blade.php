<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Delfi RSS') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Provide default news category and records count to display.') }}
    </x-slot>

    <x-slot name="form">
        <!-- channel -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="channel" value="{{ __('News channel') }}" />
            <select id="channel"  class="block mt-1 w-full" name="channel" wire:model.defer="channel" autocomplete="channel">

                <option value="">Select a channel</option>
                @foreach ($channels as $channel)
                    <option value="{{ $channel->name }}">{{ $channel->name }}</option>
                @endforeach

            </select>
        </div>

        <!-- records count -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Records per page') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="records_count" autocomplete="records_count" />
            <x-jet-input-error for="name" class="mt-2" />
            @error('records_count') <span ...>{{ $message }}</span> @enderror
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
