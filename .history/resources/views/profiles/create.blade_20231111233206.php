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
            <x-label for="dislike" value="{{ __('Dislike') }}" />
            <x-input id="dislike" type="text" class="mt-1 block w-full" wire:model="state.dislike" required />
            <x-input-error for="dislike" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="mbti" value="{{ __('MBTI') }}" />
            <x-input id="mbti" type="text" class="mt-1 block w-full" wire:model="state.mbti" required />
            <x-input-error for="mbti" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="smoking" value="{{ __('Smoking') }}" />
            <x-input id="smoking" type="text" class="mt-1 block w-full" wire:model="state.smoking" required />
            <x-input-error for="smoking" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="distance" value="{{ __('Distance') }}" />
            <x-input id="distance" type="text" class="mt-1 block w-full" wire:model="state.distance" required />
            <x-input-error for="distance" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="where" value="{{ __('Where') }}" />
            <x-input id="where" type="text" class="mt-1 block w-full" wire:model="state.where" required />
            <x-input-error for="where" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="age" value="{{ __('Age') }}" />
            <x-input id="age" type="text" class="mt-1 block w-full" wire:model="state.age" required />
            <x-input-error for="age" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="where" value="{{ __('Where') }}" />
            <x-input id="where" type="text" class="mt-1 block w-full" wire:model="state.where" required />
            <x-input-error for="where" class="mt-2" />
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
