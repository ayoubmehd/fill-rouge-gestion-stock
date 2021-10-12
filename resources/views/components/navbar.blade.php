<nav class="navbar">
    <div class="container">
        <router-link to="/" tag="span" style="cursor: pointer">
            <i class="mdi mdi-mustache h3 mb-0"></i>
            {{ $title }}
        </router-link>
        <ul class="navbar__nav">
            @foreach($menuItems as $item)
            <li class="navbar__item">
                <a class="navbar__link navbar__link-main" href="{{ $item['to'] }}">
                    <i class="mdi {{ $item['icon'] }} h3 mb-0"></i>
                    {{ $item['text'] }}
                </a>
            </li>
            @endforeach
        </ul>

        <ul class="navbar__nav">
            @foreach($rightMenuItems as $item)
            <li class="navbar__item">
                <form action="{{ $item['to'] }}" method="post">
                    @csrf
                    <button class="btn">
                        <i class="mdi {{ $item['icon'] }} h3 mb-0"></i>
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
