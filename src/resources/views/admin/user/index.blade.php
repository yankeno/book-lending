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
                        <span class="text-sm">アカウント状況<br></span>
                        <select name="account" id="account" class="mr-4 text-gray-700 w-32">
                            <option value="0">
                                全て
                            </option>
                            <option value="1">
                                有効
                            </option>
                            <option value="2">
                                無効
                            </option>
                        </select>
                    </div>
                    <div>
                        <span class="text-sm">延滞状況<br></span>
                        <select name="arrears" id="arrears" class="mr-4 text-gray-700 w-32">
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
                    <div class="flex items-center pb-2 border-b">
                        <div class="font-semibold text-xl text-gray-800  border-gray-200 flex">
                            ユーザ一覧
                        </div>
                        <div class="ml-auto">
                            <button
                                class="text-white bg-emerald-400 border-0 py-1 px-4 focus:outline-none hover:bg-emerald-500 rounded">
                                再開
                            </button>
                            <button
                                class="text-white bg-rose-400 border-0 py-1 px-4 focus:outline-none hover:bg-rose-500 rounded">
                                停止
                            </button>
                        </div>
                    </div>
                    <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                        @foreach ($users as $user)
                            <li class="py-3 sm:pb-4">
                                <div class="grid grid-cols-12 gap-1 items-center">
                                    <div class="col-span-1 flex justify-center">
                                        <input type="checkbox" name="select" class="mr-5">
                                    </div>
                                    <a href=""
                                        class="grid grid-cols-12 gap-16 items-center text-base text-gray-700 truncate hover:text-orange-500 col-span-10">
                                        <div name="user_id" class="col-span-1">
                                            {{ $user->id }}
                                        </div>
                                        <div name="name" class="col-span-2">
                                            {{ $user->name }}
                                        </div>
                                        <div name="email" class="col-span-4">
                                            {{ $user->email }}
                                        </div>
                                        <div name="address" class="col-span-5">
                                            {{ $user->address }}
                                        </div>
                                    </a>
                                    <div class="ml-auto text-gray-700 items-center text-xs font-semibold col-span-1">
                                        <div>
                                            {{ $user->borrowing_count }}冊 貸出中
                                        </div>
                                        <div>
                                            {{ $user->arrears_count }}冊 延滞中
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
