@extends('layouts.backend.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('dashboard.profile') }}
            <small>{{ __('dashboard.my-details') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{mob_route('dashboard')}}"><i class="fa fa-dashboard"></i> {{ __('auth.home') }}</a></li>
            <li class="active">{{ __('dashboard.profile') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('dashboard.profile') }}
                </h2>
            </x-slot>

            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    @livewire('profile.update-profile-information-form')

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <x-jet-section-border />

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif

                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <x-jet-section-border />

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    @endif

                    <x-jet-section-border />

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>

                    <x-jet-section-border />

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            </div>
        </x-app-layout>
    </section>
    <!-- /.content -->
</div>
@endsection