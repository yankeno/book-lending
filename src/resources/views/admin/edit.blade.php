<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            図書登録
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md px-6 py-4 mb-32 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Validation Errors -->
            <x-register-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('admin.book.update', 1) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <x-label for="title" :value="__('タイトル')" />

                    <x-input id="title" class="block mt-1 w-full" type="text" name="name" :value="old('title', $book->title)"
                        required autofocus />
                </div>

                <!-- Publisher -->
                <div class="mt-4">
                    <x-label for="publisher" :value="__('出版社')" />

                    <select name="publisher" id="publisher"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1">オライリージャパン</option>
                        <option value="2">角川文庫</option>
                        <option value="3">サンマーク出版</option>
                    </select>
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-label for="password" :value="__('カテゴリ')" />

                    <select name="category" id="category"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($parentCategories as $parentCategory)
                            @foreach ($parentCategory->categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <!-- 出版日 -->
                <div class="mt-4">
                    <x-label for="published-date" :value="__('出版日')" />

                    <x-input id="published-date" class="block mt-1 w-full" type="date" name="published-date"
                        required />
                </div>

                <!-- ISBN-13 -->
                <div class="mt-4">
                    <x-label for="isbn-13" :value="__('ISBN-13')" />

                    <x-input id="isbn-13" class="block mt-1 w-full" type="text" name="isbn-13" required />
                </div>

                <!-- 画像 -->
                <div class="mt-4">
                    <x-label for="image" :value="__('画像')" />

                    <input id="image" class="block mt-1 w-full" type="file" name="image" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('登録') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
