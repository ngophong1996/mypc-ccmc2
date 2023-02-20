<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/img/ccmc-logo.png" alt="" class="h-20 fill-current">
                
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('氏名')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('メール')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!--------Class------>
            <div class="mt-4">
                <x-input-label for="class" :value="__('クラス')" />

                <select id="class" name="class" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="1U">1U</option>
                    <option value="1J">1J</option>
                    <option value="1K">1K</option>
                    <option value="1N">1N</option>
                    <option value="1A">1A</option>
                    <option value="1B">1B</option>
                    <option value="1L">1L</option>
                    <option value="1D">1D</option>
                    <option value="2U">2U</option>
                    <option value="2J">2J</option>
                    <option value="2K">2K</option>
                    <option value="2N">2N</option>
                    <option value="2A">2A</option>
                    <option value="2B">2B</option>
                    <option value="2L">2L</option>
                </select>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('パスワード認証')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    すでに登録?
                </a>

                <x-primary-button class="ml-4">
                    登録
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
