    <footer class="data-content">
        <div class="row-fluid main-footer">
            <div class="span3 autoheight">
                <div class="footer-menu">
                    <h2 class="title">GET IN TOUCH</h2>
                    <p class="item-kontak"><i class="fa fa-map-marker icon-kontak"></i><span class="divide"></span>{{ $kontak->alamat }}</p>
                    <p class="item-kontak"><i class="fa fa-phone-square icon-kontak"></i><span class="divide"></span>{{ $kontak->telepon }}</p>
                    <p class="email item-kontak"><i class="fa fa-envelope icon-kontak"></i><span class="divide"></span><a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a></p>
                </div>
            </div>
            <div class="span3 autoheight">
                <div class="footer-menu">
                    <h2 class="title">FOLLOW US</h2>
                    <ul>
                        <li class="sosmed">
                            <a href="{{ url($kontak->fb) }}" target="_blank" title="Facebook"><i class="fa fa-facebook-square"></i></a>
                        </li>
                        <li class="sosmed">
                            <a href="{{ url($kontak->tw) }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        @if(!empty($kontak->gp))
                        <li class="sosmed">
                            <a href="{{ url($kontak->gp) }}" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a>
                        </li>
                        @endif
                        @if(!empty($kontak->pt))
                        <li class="sosmed">
                            <a href="{{ url($kontak->pt) }}" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </li>
                        @endif
                        @if(!empty($kontak->ig))
                        <li class="sosmed">
                            <a href="{{ url($kontak->ig) }}" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                        </li>
                        @endif
                        @if(!empty($kontak->tl))
                        <li class="sosmed">
                            <a href="{{ url($kontak->tl) }}" target="_blank" title="Tumblr"><i class="fa fa-tumblr"></i></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            @foreach(other_menu() as $key=>$group)
            <div class="span3 btm-menu">
                <div class="footer-menu">
                    <h2 class="title">{{ strtoupper($group->nama) }}</h2>
                    <ul>
                    @foreach($group->link as $link)
                        @if($group->id == $link->tautanId)
                        <li>
                            <a href="{{menu_url($link)}}">{{$link->nama}}</a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row-fluid">
            <div class="span6">
                <p class="copyright">Copyright &copy; {{date('Y')}} {{ Theme::place('title') }}. All Rights Reserved. Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a></p>
            </div>
            <div class="span6">
                <p class="bank">
                @foreach(list_banks() as $value)  
                    <img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}" />
                @endforeach  
                @foreach(list_payments() as $pay)
                    @if($pay->nama == 'paypal' && $pay->aktif == 1)
                    <img src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Paypal" />
                    @endif
                    @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                    <img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
                    @endif
                    @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                    <img src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Bitcoin" />
                    @endif
                @endforeach
                @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                    <img src="{{url('img/bank/doku.jpg')}}" alt="doku" title="Doku Myshortcart" />
                @endif
                </p>
            </div>
        </div>
    </footer>
    {{pluginPowerup()}}