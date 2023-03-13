<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザ検索') }}
        </h2>
        <form method="get" action="{{ route('admin.user.search') }}">
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
                            <option value="{{ \Constant::ALL_ACCOUNT }}">
                                全て
                            </option>
                            <option value="{{ \Constant::IS_ACTIVE }}"
                                @if (\Request::get('account') === \Constant::IS_ACTIVE) selected @endif>
                                有効
                            </option>
                            <option value="{{ \Constant::IS_NOT_ACTIVE }}"
                                @if (\Request::get('account') === \Constant::IS_NOT_ACTIVE) selected @endif>
                                無効
                            </option>
                        </select>
                    </div>
                    <div>
                        <span class="text-sm">延滞状況<br></span>
                        <select name="arrears" id="arrears" class="mr-4 text-gray-700 w-32">
                            <option value="{{ \Constant::ALL_LENDING }}">
                                全て
                            </option>
                            <option value="{{ \Constant::HAS_OVERDUE }}"
                                @if (\Request::get('arrears') === \Constant::HAS_OVERDUE) selected @endif>
                                延滞あり
                            </option>
                            <option value="{{ \Constant::NOT_HAS_OVERDUE }}"
                                @if (\Request::get('arrears') === \Constant::NOT_HAS_OVERDUE) selected @endif>
                                延滞なし
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
                                ユーザ一覧
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
                            </div>
                        </div>
                        <ul class="max-w-full divide-y divide-gray-100 dark:divide-gray-200 border-b border-gray-200">
                            @if ($users->isEmpty())
                                <li class="py-3 sm:pb-4">
                                    <span>該当するユーザは存在しません。</span>
                                </li>
                            @endif
                            @foreach ($users as $user)
                                <li
                                    @if (is_null($user->deleted_at)) class="py-3 sm:pb-4 bg-white"
                            @else
                                class="py-3 sm:pb-4 bg-gray-300" @endif>
                                    <div class="grid grid-cols-12 gap-1 items-center">
                                        <div class="col-span-1 flex justify-center">
                                            <input type="checkbox" name="userId[{{ $user->id }}]"
                                                class="mr-5 user-check">
                                        </div>
                                        <a href="{{ route('admin.user.edit', ['userId' => $user->id]) }}"
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
                                        <div
                                            class="ml-auto mr-5 text-gray-700 items-center text-xs font-semibold col-span-1">
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
                    </form>

                </div>
            </div>
        </div>
        <div class="mx-auto sm:px-6 lg:px-8 mt-6">
            {{ $users->appends([
                    'pagination' => \Request::get('pagination'),
                    'account' => \Request::get('account'),
                    'arrears' => \Request::get('arrears'),
                ])->links() }}
        </div>
    </div>
    <script src="{{ asset('/js/admin/user/search.js') }}" defer></script>
</x-app-layout>
