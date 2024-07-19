<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
                <a href="/">Home</a>
            </li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            <li>
                <a href="{{ route('about') }}">About</a>
            </li>
            <li class="has-children">
                <a href="#">News</a>
                <ul class="dropdown">
                    @foreach ($collections as $collection)
                        <li><a
                                href="{{ route('client.category', ['id' => $collection->id]) }}">{{ $collection->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="/">Contact</a></li>
        </ul>
    </div>
</nav>
