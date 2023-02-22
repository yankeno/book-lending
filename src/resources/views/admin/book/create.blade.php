<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            図書登録
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md px-6 py-4 my-auto bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Validation Errors -->
            <x-admin.book-validation-errors class="mb-4" :errors="$errors" />
            <x-flash-message status="{{ session('status') }}" />

            <form method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div>
                    <x-label for="title" :value="__('タイトル')" />

                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                        required autofocus />
                </div>

                <!-- Author -->
                <div class="mt-4">
                    <x-label for="publisher" :value="__('著者')" />

                    <select multiple name="authors[]" id="book-authors-choices"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Publisher -->
                <div class="mt-4">
                    <x-label for="publisher" :value="__('出版社')" />

                    <select name="publisher" id="book-publisher-choices"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-label for="password" :value="__('カテゴリ')" />

                    <select name="category" id="book-category-choices"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                        @foreach ($parentCategories as $parentCategory)
                            <optgroup label="{{ $parentCategory->name }}">
                                @foreach ($parentCategory->categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <!-- Published date -->
                <div class="mt-4">
                    <x-label for="published_date" :value="__('出版日')" />

                    <x-input id="published-date" class="block mt-1 w-full" type="date" name="published_date"
                        value="{{ old('published_date') }}" required />
                </div>

                <!-- ISBN-13 -->
                <div class="mt-4">
                    <x-label for="isbn_13" :value="__('ISBN-13')" />

                    <x-input id="isbn-13" class="block mt-1 w-full" type="text" name="isbn_13"
                        value="{{ old('isbn_13') }}" required />
                </div>

                <!-- Image -->
                <div class="mt-4">
                    <x-label for="image" :value="__('画像')" />

                    <input id="image" class="block mt-1 w-full" type="file" name="image"
                        accept=".jpg, .jpeg, .png" />
                    <figure id="figure" class="text-gray-500 mx-auto my-5 hidden">
                        <figcaption>プレビュー</figcaption>
                        <img src="" alt="表紙" id="figureImage" class="h-36">
                    </figure>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('登録') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        (() => {
            const input = document.getElementById('image');
            const figure = document.getElementById('figure');
            const figureImage = document.getElementById('figureImage');

            input.addEventListener('change', (event) => {
                const file = event.target.files[0];

                if (file) {
                    figureImage.setAttribute('src', URL.createObjectURL(file));
                    figure.style.display = 'block';
                } else {
                    figure.style.display = 'none';
                }
            })
        })();
    </script>
</x-app-layout>
