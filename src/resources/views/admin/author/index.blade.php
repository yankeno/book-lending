<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('著者検索') }}
        </h2>
        <form method="get" action="{{ route('admin.author.search') }}">
            <div class="lg:flex lg:justify-around">
                <div class="lg:flex items-center mx-auto">
                    <div class="flex space-x-2 items-center">
                        <div class="flex space-x-2 items-center">
                            <div>
                                <input name="keyword" class="border-gray-500 py-2 w-60" type="text" placeholder="著者を入力">
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
                <div class="flex">
                    <div>
                        <span class="text-sm">ステータス<br></span>
                        <select name="author_status" id="author_status" class="mr-4 text-gray-700 w-32">
                            <option value="{{ \Constant::ALL_AUTHOR }}">
                                全て
                            </option>
                            <option value="{{ \Constant::IS_ACTIVE_AUTHOR }}"
                                @if (\Request::get('author_status') === \Constant::IS_ACTIVE_AUTHOR) selected @endif>
                                有効
                            </option>
                            <option value="{{ \Constant::IS_NOT_ACTIVE_AUTHOR }}"
                                @if (\Request::get('author_status') === \Constant::IS_NOT_ACTIVE_AUTHOR) selected @endif>
                                無効
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <x-admin.account-validation-errors class="mb-4" :errors="$errors" />
        <x-flash-message status="{{ session('status') }}" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" name="account">
                        @csrf
                        <div class="lg:flex items-center pb-2 border-b">
                            <div class="font-semibold text-xl text-gray-800  border-gray-200 flex">
                                著者一覧
                            </div>
                            <div class="ml-auto">
                                <label class="mx-3 text-gray-700 relative px-6">
                                    <input type="checkbox" id="check-all"
                                        class="absolute top-0 left-0 bottom-0 m-auto" />全て選択
                                </label>
                                <button type="button" id="reactivation"
                                    class="w-16 text-white bg-emerald-400 border-0 py-1 px-4 focus:outline-none hover:bg-emerald-500 rounded">再開</button>
                                <button type="button" id="suspension"
                                    class="w-16 text-white bg-rose-400 border-0 py-1 px-4 focus:outline-none hover:bg-rose-500 rounded cursor-pointer">停止</button>
                                <button type="button" id="register"
                                    class="w-16 text-white bg-sky-400 border-0 py-1 px-4 focus:outline-none hover:bg-sky-500 rounded cursor-pointer"
                                    data-micromodal-trigger="modal-register">登録</button>
                            </div>
                        </div>
                        <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                            @if ($authors->isEmpty())
                                <li class="py-3 sm:pb-4">
                                    <span>該当する著者は存在しません。</span>
                                </li>
                            @endif
                            @foreach ($authors as $author)
                                <li
                                    @if (is_null($author->deleted_at)) class="py-3 sm:pb-3 bg-white"
                            @else
                                class="py-3 sm:pb-3 bg-gray-300" @endif>
                                    <div class="grid grid-cols-12 gap-1 items-center">
                                        <div class="col-span-1 flex justify-center">
                                            <input type="checkbox" name="authorId[{{ $author->id }}]"
                                                class="mr-5 author-check">
                                        </div>
                                        <div
                                            class="grid grid-cols-12 gap-16 items-center text-base text-gray-700 truncate col-span-10">
                                            <div name="author_id" class="col-span-1">
                                                {{ $author->id }}
                                            </div>
                                            <input name="name"
                                                @if (is_null($author->deleted_at)) class="col-span-5 bg-white px-2 py-1 outline-slate-300"
                                                @else
                                                class="col-span-5 bg-gray-300 px-2 py-1 outline-none" disabled @endif
                                                id="{{ $author->id }}" value="{{ $author->name }}" />
                                        </div>
                                        <div class="ml-auto col-span-1">
                                            <button type="button" name="{{ $author->id }}"
                                                class="author-modify w-16 mr-4 text-white bg-neutral-400 border-0 py-1 px-4 focus:outline-none hover:bg-neutral-500 rounded">変更</button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                    <div class="modal micromodal-slide" id="modal-register" aria-hidden="true">
                        <!-- 背景のオーバーレイ -->
                        <div class="modal__overlay drop-shadow-md" aria-label="Close modal" tabindex="-1"
                            data-micromodal-close>
                            <div class="modal__container modal__close relative bg-white rounded-lg shadow p-4"
                                role="dialog" aria-modal="true" aria-labelledby="modal-register-title">
                                <button type="button"
                                    class="modal__close absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                    data-micromodal-close>
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <header class="modal-header">
                                    <h2 class="modal-title text-xl bold" id="modal-register-title">著者登録</h2>
                                </header>
                                <!-- モーダルのコンテンツ -->
                                <div class="modal-content w-96 max-w-lg" id="modal-register-content">
                                    <form action="">
                                        <x-label for="name" :value="__('著者名')" class="mt-2" />

                                        <x-input id="author-name" class="block w-full" type="text" name="name"
                                            required />
                                        <div class="mt-4 ml-auto flex justify-end">
                                            <x-button class="ml-4" id="submit-author">
                                                {{ __('登録') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto sm:px-6 lg:px-8 mt-6">
                    {{ $authors->appends([
                            'pagination' => \Request::get('pagination'),
                            'author_status' => \Request::get('author_status'),
                        ])->links() }}
                </div>
            </div>
            <script>
                // 別ファイルの javascript で使用する変数
                const appUrl = "{{ config('app.APP_URL') }}"
                const csrfToken = "{{ csrf_token() }}";
            </script>
            <script src="{{ asset('/js/admin/author/search.js') }}"></script>
</x-app-layout>
