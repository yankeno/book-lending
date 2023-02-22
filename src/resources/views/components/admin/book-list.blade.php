@isset($books)
    <div class="font-semibold text-xl text-gray-800 pb-2 border-b border-gray-200 flex">
        {{ $title }}
    </div>
    <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
        @if ($books->isEmpty())
            <li class="py-3 sm:pb-4">
                <span>該当する図書はありません。</span>
            </li>
        @endif
        @foreach ($books as $book)
            <li class="py-3 sm:pb-4">
                <div class="flex items-center space-x-8">
                    <div class="flex-shrink-0">
                        <x-image class="h-16" :image="$book->image" />
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('admin.book.show', ['bookId' => $book->id]) }}">
                            <p class="text-base font-medium text-gray-800 truncate hover:text-orange-500">
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
                        <x-review-star :rating="\App\Helpers\RatingHelper::roundRating($book->ratingAverage())" :reviewCount="$book->reviewsCount()" />
                    </div>
                    <div class="inline-flex items-center text-base font-semibold">
                        @if ($book->canBeBorrowed())
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
