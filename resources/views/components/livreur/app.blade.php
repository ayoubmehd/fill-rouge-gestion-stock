<div id="app">

    <x-navbar title="Livruer" :menu-items="$menuItems" :right-menu-items="$rightMenuItems" />

    <main class="py-4">
        @yield('content')
    </main>
</div>
