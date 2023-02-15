<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('図書検索') }}
        </h2>
        <form method="get" action="{{ route('admin.book.search') }}">
            <div class="lg:flex lg:justify-around">
                <div class="lg:flex items-center mx-auto">
                    <div class="w-80 mr-5">
                        <select name="category" id="book-category-choices" class="mb-2 lg:mb-0 lg:mr-2">
                            <optgroup>
                                <option value="0" @if (\Request::get('category') === '0') selected @endif>全て</option>
                            </optgroup>
                            @foreach ($parentCategories as $parentCategory)
                                <optgroup label="{{ $parentCategory->name }}">
                                    @foreach ($parentCategory->categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ((int) \Request::get('category') === $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
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
                <div class="flex">
                    <div>
                        <span class="text-sm">絞り込み<br></span>
                        <select name="filter" id="filter" class="mr-4">
                            <option value="0">
                                全て
                            </option>
                            <option value="{{ \Constant::IS_CHECKED_OUT }}"
                                @if (\Request::get('filter') === \Constant::IS_CHECKED_OUT) selected @endif>
                                貸出中
                            </option>
                            <option value="{{ \Constant::IS_RETURNED }}"
                                @if (\Request::get('filter') === \Constant::IS_RETURNED) selected @endif>
                                貸出可能
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <x-flash-message status="{{ session('status') }}" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- 検索結果（検索実行時） --}}
                    @isset($books)
                        <x-admin.book-list :books="$books" title="図書一覧" />
                    @endisset
                </div>
            </div>
        </div>
        @isset($books)
            <div class="mx-auto sm:px-6 lg:px-8 mt-6">
                {{ $books->appends([
                        'pagination' => \Request::get('pagination'),
                        'category' => \Request::get('category'),
                        'filter' => \Request::get('filter'),
                    ])->links() }}
            </div>
        @endisset
    </div>
    <script>
        const filter = document.getElementById('filter');
        filter.addEventListener('change', function() {
            this.form.submit();
        });
        const category = document.getElementById('category');
        category.addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</x-app-layout>
