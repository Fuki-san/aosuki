<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('個人情報') }}
    </x-slot>

    <x-slot name="description">
        {{ __('名前またはメールアドレスを更新する.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('名前') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('メールアドレス') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('あなたのメールアドレスは未確認です') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('メールの確認を再送するにはこちらをクリックしてください') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('新しい確認リンクがあなたのメールアドレスに送信されました') }}
                    </p>
                @endif
            @endif
        </div>

        {{-- 住所 --}}
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    住所
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option>New Mexico</option>
                        <option>Missouri</option>
                        <option>Texas</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    学校
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option value="" selected>都道府県</option>
  <option value="1">北海道</option>
  <option value="2">青森県</option>
  <option value="3">岩手県</option>
  <option value="4">宮城県</option>
  <option value="5">秋田県</option>
  <option value="6">山形県</option>
  <option value="7">福島県</option>
  <option value="8">茨城県</option>
  <option value="9">栃木県</option>
  <option value="10">群馬県</option>
  <option value="11">埼玉県</option>
  <option value="12">千葉県</option>
  <option value="13">東京都</option>
  <option value="14">神奈川県</option>
  <option value="15">新潟県</option>
  <option value="16">富山県</option>
  <option value="17">石川県</option>
  <option value="18">福井県</option>
  <option value="19">山梨県</option>
  <option value="20">長野県</option>
  <option value="21">岐阜県</option>
  <option value="22">静岡県</option>
  <option value="23">愛知県</option>
  <option value="24">三重県</option>
  <option value="25">滋賀県</option>
  <option value="26">京都府</option>
  <option value="27">大阪府</option>
  <option value="28">兵庫県</option>
  <option value="29">奈良県</option>
  <option value="30">和歌山県</option>
  <option value="31">鳥取県</option>
  <option value="32">島根県</option>
  <option value="33">岡山県</option>
  <option value="34">広島県</option>
  <option value="35">山口県</option>
  <option value="36">徳島県</option>
  <option value="37">香川県</option>
  <option value="38">愛媛県</option>
  <option value="39">高知県</option>
  <option value="40">福岡県</option>
  <option value="41">佐賀県</option>
  <option value="42">長崎県</option>
  <option value="43">熊本県</option>
  <option value="44">大分県</option>
  <option value="45">宮崎県</option>
  <option value="46">鹿児島県</option>
  <option value="47">沖縄県</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="school" value="{{ __('学校') }}" />
                <x-input id="school" type="text" class="mt-1 block w-full" wire:model="state.school" required
                    autocomplete="school" />
                <x-input-error for="school" class="mt-2" />
            </div>

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('保存されています') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('保存する') }}
        </x-button>
    </x-slot>
</x-form-section>
