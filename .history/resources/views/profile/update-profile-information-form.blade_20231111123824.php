<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('個人情報') }}
    </x-slot>

    <x-slot name="description">
        {{ __('名前またはメールアドレスを更新する.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('名前') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('メールアドレス') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <!-- メール確認関連の表示 -->
            @endif
        </div>

        <!-- 住所 -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('住所') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" required autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!-- 学校 -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="school" value="{{ __('学校') }}" />
            <x-input id="school" type="text" class="mt-1 block w-full" wire:model="state.school" required autocomplete="school" />
            <x-input-error for="school" class="mt-2" />
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
