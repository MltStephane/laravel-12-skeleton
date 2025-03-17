<x-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <flux:label>{{ __('Team Owner') }}</flux:label>

            <div class="flex items-center mt-2">
                <img
                    class="size-12 rounded-full object-cover"
                    src="{{ $team->owner->profile_photo_url }}"
                    alt="{{ $team->owner->name }}"
                />

                <div class="ms-4 leading-tight">
                    <div class="text-gray-900">{{ $team->owner->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <flux:input
                label="{{ __('Team Name') }}"
                id="name"
                type="text"
                class="mt-1 block w-full"
                wire:model="state.name"
                :disabled="! Gate::check('update', $team)"
            />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <flux:button type="submit" variant="primary">
                {{ __('Save') }}
            </flux:button>
        </x-slot>
    @endif
</x-form-section>
