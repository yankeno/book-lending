<div class="modal micromodal-slide" id="modal-register" aria-hidden="true">
    <!-- 背景のオーバーレイ -->
    <div class="modal__overlay drop-shadow-md" aria-label="Close modal" tabindex="-1" data-micromodal-close>
        <div class="modal__container modal__close relative bg-white rounded-lg shadow p-4" role="dialog" aria-modal="true"
            aria-labelledby="modal-register-title">
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
                <form action="{{ route('admin.author.store') }}" method="POST">
                    @csrf
                    <x-label for="name" :value="__('著者名')" class="mt-2" />
                    <x-input id="author-name" class="block w-full" type="text" name="name" required />
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
