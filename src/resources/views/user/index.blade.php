<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('図書検索') }}
        </h2>
        <form method="get" action="{{ route('user.book.search') }}">
            <div class="lg:flex lg:justify-around">
                <div class="lg:flex items-center">
                    <select name="category" class="mb-2 lg:mb-0 lg:mr-2">
                        <option value="0" @if (\Request::get('category') === '0') selected @endif>全て</option>
                        @foreach ($parentCategories as $parentCategory)
                            <optgroup label="{{ $parentCategory->name }}">
                                @foreach ($parentCategory->categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ((int) \Request::get('category') === $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                        @endforeach
                    </select>
                    <div class="flex space-x-2 items-center">
                        <div>
                            <input name="keyword" class="border-gray-500 py-2" type="text" placeholder="キーワードを入力">
                        </div>
                        <div>
                            <button
                                class="ml-auto text-white bg-cyan-500 border-0 py-2 px-6 focus:outline-none hover:bg-cyan-600 rounded">
                                検索
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- 新着図書表示（初回アクセス時） --}}
                    @isset($newBooks)
                        <x-book-list :books="$newBooks" title="新着図書" />
                    @endisset
                    {{-- 検索結果（検索実行時） --}}
                    @isset($books)
                        <x-book-list :books="$books" title="検索結果" />
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
