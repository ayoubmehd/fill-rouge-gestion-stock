<nav class="navbar">
    <div class="container">
        <a href="/" class="btn">
            <i class="mdi mdi-mustache h3 mb-0"></i>
            {{ $title }}
        </a>
        <ul class="navbar__nav mx-auto w-75">
            @foreach($menuItems as $item)
            <li class="navbar__item">
                <a class="navbar__link navbar__link-main" href="{{ $item['to'] }}">
                    <i class="mdi {{ $item['icon'] }} h3 mb-0"></i>
                    <span class="navbar__link-text">
                        {{ $item['text'] }}
                    </span>
                </a>
            </li>
            @endforeach
        </ul>

        <ul class="navbar__nav w-35">
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
