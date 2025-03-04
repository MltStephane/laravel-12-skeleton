<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="{{ route('app.homepage') }}" class="ml-2 mr-5 flex items-center space-x-2 lg:ml-0" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item
                    icon="layout-grid"
                    :href="route('app.homepage')"
                    :current="request()->routeIs('app.homepage')"
                    wire:navigate
                >
                    {{ __('Dashboard') }}
                </flux:navbar.item>
            </flux:navbar>

            <flux:spacer />

            <flux:navbar class="mr-1.5 space-x-0.5 py-0!">
                @guest()
                    <div class="hidden md:flex items-center gap-2">
                        <flux:navbar.item href="{{ route('login') }}" wire:navigate.hover>
                            Connexion
                        </flux:navbar.item>
                        <flux:navbar.item href="{{ route('register') }}" wire:navigate.hover>
                            Inscription
                        </flux:navbar.item>
                    </div>
                    <div md:hidden>
                        <flux:navbar.item href="{{ route('login') }}" icon="user" wire:navigate.hover />
                    </div>
                @else
                    <flux:navbar.item href="{{ route('app.homepage') }}" wire:navigate.hover>
                        Tableau de bord
                    </flux:navbar.item>
                @endguest
            </flux:navbar>
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar
            stashable
            sticky
            class="lg:hidden border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
        >
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('app.homepage') }}" class="ml-1 flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.item
                    icon="layout-grid"
                    :href="route('app.homepage')"
                    :current="request()->routeIs('app.homepage')"
                    wire:navigate
                >
                    {{ __('Dashboard') }}
                </flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item href="{{ route('login') }}" wire:navigate.hover>Connexion</flux:navlist.item>
                <flux:navlist.item href="{{ route('register') }}" wire:navigate.hover>Inscription</flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        <flux:main container>
            <div>
                {!! $slot !!}
            </div>
        </flux:main>

        @fluxScripts
    </body>
</html>
