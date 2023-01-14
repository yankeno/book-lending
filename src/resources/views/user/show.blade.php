<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            図書詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center mx-auto">
                        <x-book-validation-errors :errors="$errors" />
                    </div>
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-2 py-12 mx-auto">
                            <div class="lg:w-5/6 mx-auto flex flex-wrap justify-center">
                                <img alt="image" src="{{ asset('storage/books/' . $book->image) }}"
                                    class="w-auto h-96">
                                <div class="lg:w-1/2 w-full h-96 lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    <span class="text-sm mb-6">{{ $book->category->parent_category->name }} ›
                                        {{ $book->category->name }}</span>
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $book->title }}
                                    </h1>
                                    <h2>
                                        @foreach ($book->authors as $author)
                                            {{ $author->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                        <span>(著)</span>
                                    </h2>
                                    <div class="my-1">
                                        <x-review-star :rating="\App\Helpers\RatingHelper::roundRating($book->ratingAverage())" :reviewCount="$book->reviewsCount()" />
                                    </div>
                                    <div class="border-t border-gray-200 py-2">
                                        <h1 class="text-gray-800 text-2xl title-font bold font-medium mb-1">登録情報</h1>
                                        <h2 class="py-1"><span
                                                class="font-semibold">出版社</span>：{{ $book->publisher->name }}</h2>
                                        <h2 class="py-1"><span
                                                class="font-semibold">発売日</span>：{{ $book->published_date->format('Y/m/d') }}
                                        </h2>
                                        <h2 class="py-1"><span
                                                class="font-semibold">ISBN-13</span>：{{ substr($book->isbn_13, 0, 3) }}-{{ substr($book->isbn_13, 3, 12) }}
                                        </h2>
                                    </div>
                                    <div class="flex flex-wrap py-2">
                                        <form method="POST"
                                            action="@if ($isBorrowing) {{ route('user.rental.return') }} @else {{ route('user.rental.checkout') }} @endif">
                                            @csrf
                                            <input type="hidden" value="{{ $book->id }}" name="bookId" />
                                            <button id="checkout" type="submit"
                                                class="bg-cyan-500 hover:bg-cyan-600 text-white  border-0 py-2 px-12 focus:outline-none  rounded mx-2 my-2">
                                                @if ($isBorrowing)
                                                    本を返却
                                                @else
                                                    本を借りる
                                                @endif
                                            </button>
                                        </form>
                                        <button id="review"
                                            class="text-white bg-cyan-500 border-0 py-2 px-10 focus:outline-none hover:bg-cyan-600 rounded mx-2 my-2">レビューを書く</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @php
        if ($isBorrowing) {
            $confirmMessage = '図書を返却しますか？';
        } else {
            $confirmMessage = 'この本を借りますか？\n1度に借りられるのは3冊までです。';
        }
    @endphp
    <script>
        const confirmMessage = "<?php echo $confirmMessage; ?>";
    </script>
    <script src="{{ asset('js/user/show.js') }}" defer></script>
</x-app-layout>
