<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイページ
        </h2>
        <x-flash-message status="{{ session('status') }}" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @isset($rentals)
                        <div class="font-semibold text-xl text-gray-800 pb-2 border-b border-gray-200 flex">
                            貸出履歴
                        </div>
                        <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                            @if ($rentals->isEmpty())
                                <li class="py-3 sm:pb-4">
                                    <span>貸出履歴はありません。</span>
                                </li>
                            @endif
                            @foreach ($rentals as $rental)
                                <li class="py-3 sm:pb-4">
                                    <div class="flex items-center space-x-8">
                                        <div class="flex-shrink-0">
                                            <img class="w-auto h-16"
                                                src="{{ asset('storage/books/' . $rental->book->image) }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('user.book.show', ['bookId' => $rental->book->id]) }}">
                                                <p
                                                    class="text-base font-medium text-gray-800 truncate hover:text-orange-500">
                                                    {{ $rental->book->title }}
                                                </p>
                                            </a>
                                            <p class="text-sm text-gray-800 truncate">
                                                @foreach ($rental->book->authors as $author)
                                                    {{ $author->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                                | @if ($rental->book->published_date)
                                                    {{ $rental->book->published_date->format('Y/m/d') }}
                                                @endif
                                            </p>
                                            <x-review-star :rating="\App\Helpers\RatingHelper::roundRating(
                                                $rental->book->ratingAverage(),
                                            )" :reviewCount="$rental->book->reviewsCount()" />
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold">
                                            @if ($rental->is_returned ?? true)
                                                <div class="text-green-400">
                                                    @if (request()->routeIs('user.rental.mypage'))
                                                        返却済み
                                                    @else
                                                        貸出可能
                                                    @endif
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
        <div class="mx-auto sm:px-6 lg:px-8 mt-6">
            {{ $rentals->appends([
                    'pagination' => \Request::get('pagination'),
                ])->links() }}
        </div>
    </div>
</x-app-layout>
