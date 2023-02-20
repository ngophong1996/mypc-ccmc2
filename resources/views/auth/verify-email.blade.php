<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/img/ccmc-logo.png" alt="" class="h-20 fill-current">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('ご登録ありがとうございます。 開始する前に、メールで送信したリンクをクリックして、メール アドレスを確認していただけますか? メールを受け取っていない場合は、喜んで別のメールをお送りします。') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('登録時に指定したメールアドレスに新しい確認リンクが送信されました。') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('確認メールを再送') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('ログアウト') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
