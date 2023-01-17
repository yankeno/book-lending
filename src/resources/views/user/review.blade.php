<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            レビュー投稿
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center mx-auto">
                        <x-review-validation-errors :errors="$errors" />
                    </div>
                    <div class="flex pb-4 mb-4 items-center border-b border-gray-200">
                        <img class="w-auto h-16" src="{{ asset('storage/books/' . $book->image) }}">
                        <p class="text-base font-medium text-gray-800 truncate mx-4">
                            {{ $book->title }} のレビューを投稿する
                        </p>
                    </div>
                    <form method="POST" action="{{ route('user.review.store') }}">
                        @csrf
                        <div>
                            <x-label for="rating" :value="__('評価')" />

                            <x-review-star-input id="rating" />
                        </div>
                        <div class="mt-4">
                            <x-label for="reviewText" :value="__('レビューを追加')" />

                            <x-textarea id="reviewText" class="mt-1 w-full h-64" type="text" name="reviewText"
                                :value="old('reviewText')" required />
                        </div>
                        <input type="hidden" value="{{ $book->id }}" name="bookId" />
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('投稿') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
