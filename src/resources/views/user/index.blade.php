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
                                        {{ $category->name }}{{ $category->id }}
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
                        <h2 class="font-semibold text-xl text-gray-800 block pb-2 border-b border-gray-200">
                            新着図書
                        </h2>
                        <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                            @foreach ($newBooks as $newBook)
                                <li class="py-3 sm:pb-4">
                                    <div class="flex items-center space-x-8">
                                        <div class="flex-shrink-0">
                                            <img class="w-auto h-16" src="{{ asset('storage/books/' . $newBook->image) }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('user.book.show', ['bookId' => $newBook->id]) }}">
                                                <p
                                                    class="text-base font-medium text-gray-800 truncate hover:text-orange-500">
                                                    {{ $newBook->title }}
                                                </p>
                                            </a>
                                            <p class="text-sm text-gray-800 truncate">
                                                @foreach ($newBook->authors as $author)
                                                    {{ $author->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                                | @if ($newBook->published_date)
                                                    {{ $newBook->published_date->format('Y/m/d') }}
                                                @endif
                                            </p>
                                            <div class="flex items-center">
                                                <div class="star5_rating"
                                                    data-rate="{{ \App\Helpers\RatingHelper::roundRating($newBook->ratingAverage()) }}">
                                                </div>
                                                <span
                                                    class="text-sm text-gray-500 items-center px-1">{{ $newBook->reviewsCount() }}
                                                    件の評価</span>
                                            </div>
                                        </div>
                                        {{-- <div class="flex-1 min-w-0">
                                            <p>
                                                <span class="star5_rating" data-rate="4"></span>
                                            </p>
                                        </div> --}}
                                        {{-- <div class="inline-flex items-center">

                                        </div> --}}
                                        <div class="inline-flex items-center text-base font-semibold">
                                            @if ($newBook->status()->is_returned ?? true)
                                                <div class="text-green-400">
                                                    貸出可能
                                                </div>
                                            @else
                                                <div class="text-rose-400">
                                                    貸出中
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                    {{-- 検索結果（検索実行時） --}}
                    @isset($books)
                        <h2 class="font-semibold text-xl text-gray-800 block pb-2 border-b border-gray-200">
                            検索結果
                        </h2>
                        <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                            @foreach ($books as $book)
                                <li class="py-3 sm:pb-4">
                                    <div class="flex items-center space-x-8">
                                        <div class="flex-shrink-0">
                                            <img class="w-auto h-16" src="{{ asset('storage/books/' . $book->image) }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('user.book.show', ['bookId' => $book->id]) }}">
                                                <p
                                                    class="text-base font-medium text-gray-800 truncate hover:text-orange-500">
                                                    {{ $book->title }}
                                                </p>
                                            </a>
                                            <p class="text-sm text-gray-800 truncate">
                                                @foreach ($book->authors as $author)
                                                    {{ $author->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                                | @if ($book->published_date)
                                                    {{ $book->published_date->format('Y/m/d') }}
                                                @endif
                                            </p>
                                            <div class="flex items-center">
                                                <div class="star5_rating"
                                                    data-rate="{{ \App\Helpers\RatingHelper::roundRating($book->ratingAverage()) }}">
                                                </div>
                                                <span
                                                    class="text-sm text-gray-500 items-center px-1">{{ $book->reviewsCount() }}
                                                    件の評価</span>
                                            </div>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold">
                                            @if ($book->status()->is_returned ?? true)
                                                <div class="text-green-400">
                                                    貸出可能
                                                </div>
                                            @else
                                                <div class="text-rose-400">
                                                    貸出中
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
