<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザ情報更新
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md px-6 py-4 my-auto bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Validation Errors -->
            <x-admin.user-validation-errors class="mb-4" :errors="$errors" />
            <x-flash-message status="{{ session('status') }}" />

            <form method="POST" action="{{ route('admin.user.update', ['userId' => $user->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('名前')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)"
                        required autofocus />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-label for="email" :value="__('メールアドレス')" />

                    <x-input name="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $user->email)"
                        required />
                </div>

                <!-- Address -->
                <div class="mt-4">
                    <x-label for="password" :value="__('住所')" />

                    <x-input name="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $user->address)"
                        required />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('パスワード')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('パスワード再入力')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="ml-4" type="button">
                        <a href="{{ route('admin.user.index') }}"
                            class='inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>戻る</a>
                    </button>
                    <x-button class="ml-4">
                        {{ __('更新') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
