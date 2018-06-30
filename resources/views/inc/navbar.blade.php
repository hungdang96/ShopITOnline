<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="{{route('welcome')}}">ShopITOnline</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tech News</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Smartphone</a></li>
                    <li><a class="dropdown-item line-dropdown" href="#">Laptop</a></li>
                    <li><a class="dropdown-item line-dropdown" href="#">PC Build</a></li>
                    <li><a class="dropdown-item dropdown-toggle-fix line-dropdown" href="#">PC items</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item line-dropdown" href="#">Case</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">PSU</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">Motherboard</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">CPU</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">Memory</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">Storage</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">Fans</a></li>
                            <li><a class="dropdown-item line-dropdown" href="#">Graphic cards</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item line-dropdown" href="#">Other items</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>
</nav>
