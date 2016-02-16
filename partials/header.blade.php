<header class="wrap-header">
    <section class="data-content">
        <div class="row">
            <div class="info">
                @if ( ! is_login() )
                    <span>Selamat berbelanja</span><span class="divide"></span>
                    <span>{{ HTML::link('member', 'Login') }}</span><span class="divide"></span>
                    <span>{{ HTML::link('member/create', 'Register') }}</span>
                @else
                    <span>Hai, {{ HTML::link('member', user()->nama) }}<span class="divide"></span><span>{{HTML::link('logout', 'Logout')}}</span>
                @endif
            </div>
            <div class="search-column">
                <form method="post" action="{{ url('search') }}">
                    <input class="input-large search-query" type="search" name="search" placeholder="Search" id="target"></input>
                    <span class="fa fa-search" id="search-pos"></span>
                </form>
            </div>
            <div class="span5">
                <h1 class="brand-title">
                    @if(logo_image_url())
                    <a href="{{ url('home') }}">
                        <img src="{{ url(logo_image_url()) }}" class="logo" alt="{{Theme::place('title')}}">
                    </a>
                    @else
                    <a href="{{url('home')}}">{{ shortText(Theme::place('title'),26) }}</a>
                    @endif
                </h1>
            </div>
            <div class="span3 offset2 tools">
                <a href="#" class="search"><i class="fa fa-search"></i> Search</a>
                <a href="{{ url('checkout') }}" class="cart" id="shoppingcartplace">
                    <i class="fa fa-shopping-cart"></i> {{ $items = Shpcart::cart()->total_items() }} Items
                    <p class="total">Total: {{ price(Shpcart::cart()->total() )}}</p>
                </a>
            </div>
        </div>

        <div class="navbar navbar-fixed">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li class="navi-item btn-nav" data-toggle="collapse" data-target=".bs-nav-collapse">
                            <a href="#">
                                <span class="fa fa-bars icontop"></span>
                            </a>
                        </li>
                        <li class="navi-item btn-cart">
                            <a href="{{ url('checkout') }}"><span class="fa fa-shopping-cart icontop"></span></a>
                        </li>
                        <li class="navi-item btn-search">
                            <a href="#"><span class="fa fa-search icontop"></span></a>
                        </li>
                        <li class="mobilenav-search mobilesearch">
                            <div class="mobile-search">
                            <form method="post" action="{{ url('search') }}">
                                <input class="search-query" type="search" placeholder="Search" id="target-mobile" name="search"></input>
                                <span class="fa fa-search" id="search-icon"></span>
                            </form>
                            </div>
                        </li>
                    </ul>
                    <div class="nav-collapse bs-nav-collapse collapse">
                        <ul class="nav">
                            @foreach(main_menu()->link as $link)
                            <li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>