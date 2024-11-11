<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cozinha Gourmeet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand/>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-menu-separator />

                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif

                <x-menu-item link="/bebidas">
                    <i class="fas fa-cocktail"></i> ﾠBebidas
                </x-menu-item>
                
                <x-menu-item link="/hamburguer">
                    <i class="fas fa-hamburger"></i> ﾠHambúrguer
                </x-menu-item>
                
                <x-menu-item link="/sushi">
                    <i class="fas fa-fish"></i> ﾠSushi
                </x-menu-item>

                <x-menu-item link="/acai">
                    <i class="fas fa-ice-cream"></i> ﾠ Açaí
                </x-menu-item>
                
                
                <x-menu-sub title="Adicionar Itens" icon="o-plus-circle">
                    <x-menu-item  link="/pratosCreate" >
                        <i class="fas fa-utensils"></i> ﾠPratos
                    </x-menu-item>
                    <x-menu-item  link="/bebidasCreate" >
                        <i class="fas fa-glass-martini-alt"></i> ﾠBebidas
                    </x-menu-item>
                    <x-menu-item  link="/categoriaCreate" >
                        <i class="fas fa-list"></i> ﾠCategoria
                    </x-menu-item>
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    @livewireScripts
</body>
</html>
