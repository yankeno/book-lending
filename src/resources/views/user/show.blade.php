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
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-2 py-12 mx-auto">
                            <div class="lg:w-5/6 mx-auto flex flex-wrap justify-center">
                                <img alt="image" src="{{ asset('storage/books/sample1.jpg') }}" class="w-auto h-96">
                                <div class="lg:w-1/2 w-full h-96 lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    <span class="text-sm mb-6">文学・評論 › ミステリー・サスペンス・ハードボイルド</span>
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">The Catcher in the
                                        Rye</h1>
                                    <h2>稲盛 和夫 <span>(著)</span></h2>
                                    <div class="my-1">
                                        <x-review-star :rating="4.5" :reviewCount="123" />
                                    </div>
                                    <div class="border-t border-gray-200 py-2">
                                        <h1 class="text-gray-800 text-2xl title-font bold font-medium mb-1">登録情報</h1>
                                        <h2 class="py-1"><span class="font-semibold">出版社</span>：翔泳社</h2>
                                        <h2 class="py-1"><span class="font-semibold">発売日</span>：2020/1/25</h2>
                                        <h2 class="py-1"><span class="font-semibold">ISBN-13</span>：123-4567891011
                                        </h2>
                                    </div>
                                    <button
                                        class="text-white bg-cyan-500 border-0 py-2 px-12 focus:outline-none hover:bg-cyan-600 rounded">本を借りる</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
