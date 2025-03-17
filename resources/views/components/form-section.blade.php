@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="md:mt-0 md:col-span-2">
        <flux:card>
            <form wire:submit="{{ $submit }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>

                @if (isset($actions))
                    <flux:separator class="mt-4" />
                    <div class="mt-4 flex items-center justify-start text-start">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </flux:card>
    </div>
</div>
