<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Mot de passe') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirmez le mot de passe') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Réinitialiser le mot de passe') }}
                </x-jet-button>
            </div>
        </form>
        <div class="row end-xs middle-xs">
            <a href="{{mob_route('password.request')}}" class="mdc-button normal">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">{{__('auth.forget-password')}}</span>
            </a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
