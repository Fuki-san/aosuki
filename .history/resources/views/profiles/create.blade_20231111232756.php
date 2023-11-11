<x-form-section submit="creatematch">
    <x-slot name="title">
        {{ __('マッチング条件設定') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="nickname" value="{{ __('Nickname') }}" />
            <x-input id="nickname" type="text" class="mt-1 block w-full" wire:model="state.nickname" required />
            <x-input-error for="nickname" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="body" value="{{ __('Body') }}" />
            <x-textarea id="body" class="mt-1 block w-full" wire:model="state.body" />
            <x-input-error for="body" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="hobby" value="{{ __('Hobby') }}" />
            <x-input id="hobby" type="text" class="mt-1 block w-full" wire:model="state.hobby" required />
            <x-input-error for="hobby" class="mt-2" />
        </div>

        

        <div class="col-span-6 sm:col-span-4">
            <x-label for="image" value="{{ __('Image') }}" />
            <x-input id="image" type="file" class="mt-1 block w-full" wire:model="state.image" accept="image/*" required />
            <x-input-error for="image" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>