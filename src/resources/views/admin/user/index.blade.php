<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザ検索') }}
        </h2>
        <form method="get" action="{{ route('admin.book.search') }}">
            <div class="lg:flex lg:justify-around">
                <div class="lg:flex items-center mx-auto">
                    <div class="flex space-x-2 items-center">
                        <div class="flex space-x-2 items-center">
                            <div>
                                <input name="keyword" class="border-gray-500 py-2 w-60" type="text"
                                    placeholder="ユーザ名を入力">
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
                        <span class="text-sm">絞り込み<br></span>
                        <select name="filter" id="filter" class="mr-4 text-gray-700">
                            <option value="0">
                                全て
                            </option>
                            <option value="1">
                                延滞あり
                            </option>
                            <option value="2">
                                延滞なし
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
                    <div class="font-semibold text-xl text-gray-800 pb-2 border-b border-gray-200 flex">
                        ユーザ一覧
                    </div>
                    <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                        {{-- @if ($books->isEmpty())
                            <li class="py-3 sm:pb-4">
                                <span>該当する図書はありません。</span>
                            </li>
                        @endif --}}
                        <li class="py-3 sm:pb-4">
                            <div class="grid-cols-3 gap-6 flex items-center">
                                <input type="checkbox" value="1">
                                <a href=""
                                    class="grid-cols-4 gap-16 flex items-center text-base text-gray-700 truncate hover:text-orange-500">
                                    <div id="user_id">
                                        123
                                    </div>
                                    <div>
                                        松本 人志
                                    </div>
                                    <div>
                                        test@test.com
                                    </div>
                                    <div>
                                        東京都千代田区飯田橋1-2-3
                                    </div>
                                </a>
                                <div class="ml-auto text-gray-700 items-center text-xs font-semibold">
                                    <div>
                                        3冊 貸出中
                                    </div>
                                    <div>
                                        1冊 延滞中
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
