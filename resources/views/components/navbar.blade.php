<nav class="navbar">
    <div class="container">
        <router-link to="/" tag="span" style="cursor: pointer">
            <v-icon size="45">mdi-mustache</v-icon>
            {{ $title }}
        </router-link>
        <ul class="navbar__nav">
            @foreach($menuItems as $item)
            <li class="navbar__item">
                <a class="navbar__link navbar__link-main" href="{{ $item['to'] }}">
                    <v-icon class="navbar__link-icon" size="30">
                        {{ $item['icon'] }}
                    </v-icon>
                    {{ $item['text'] }}
                </a>
            </li>
            @endforeach
        </ul>

        <ul class="navbar__nav">
            @foreach($rightMenuItems as $item)
            <li class="navbar__item">
                <a class="navbar__link">
                    <v-icon size="30">{{ $item['icon'] }}</v-icon>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
