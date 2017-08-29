<section class="product">
    <div class="pages">
        <h3>{{$name}}</h3>
    </div>

    <div class="row-fluid">
        <div class="span3 hidden-phone">
            <div class="sidebar">
                @if(count(list_category()) > 0)
                <section>
                    <h5>Kategori</h5>
                    <nav>
                        <ul>
                            {{ generateKategori(list_category(),'<li>;</li>','<i class="fa fa-angle-right"></i> ',';',true) }}
                        </ul>
                    </nav>
                </section>
                @endif

                @if(list_koleksi()->count() > 0)
                <section>
                    <ul class="category collection">
                        <h5>Koleksi</h5>
                        @foreach(list_koleksi() as $mykoleksi)
                        <li><a href="{{ koleksi_url($mykoleksi) }}">{{$mykoleksi->nama}}</a></li>
                        @endforeach
                    </ul>
                </section>
                @endif

                <section>{{ pluginSidePowerup() }}</section>

                @if(vertical_banner()->count() > 0)
                <section>
                    @foreach(vertical_banner() as $item)
                    <div class="banner">
                        <a href="{{url($item->url)}}">
                            <img src="{{ url(banner_image_url($item->gambar)) }}" alt="Info Promo" />
                        </a>
                    </div>
                    @endforeach
                </section>
                @endif
            </div>
        </div>

        <div class="span9">
            <div class="row-fluid">
                @foreach(horizontal_banner() as $key=>$item)
                @if($key == 0)
                <div class="hidden-phone" id="horizontal-banner">
                    <a href="{{url($item->url)}}">
                        <img src="{{ url(banner_image_url($item->gambar)) }}" alt="Info Promo" />
                    </a>
                </div>
                @endif
                @endforeach

                <div class="tab-content sideline">
                @if(count(list_product(null,@$category,@$collection)) > 0)
                    @foreach(list_product(null,@$category,@$collection) as $myproduk)
                    <article class="relate">
                        <span class="badge badge-inverse">{{price($myproduk->hargaJual)}}</span>
                        @if(is_outstok($myproduk))
                            <img src="//d3kamn3rg2loz7.cloudfront.net/assets/flawwa/assets/img/stok-badge.png" class="outstok-badge">
                        @elseif(is_produkbaru($myproduk))
                            <img src="//d3kamn3rg2loz7.cloudfront.net/assets/flawwa/assets/img/terlaris-badge.png" class="best-badge">
                        @elseif(is_terlaris($myproduk))
                            <img src="//d3kamn3rg2loz7.cloudfront.net/assets/flawwa/assets/img/new-badge.png" class="new-badge">
                        @endif

                        <div class="view thumb-prod">
                            {{HTML::image( product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array('class'=>'img1'))}}
                            <div class="mask">
                                <p>{{short_description($myproduk->deskripsi,100)}}</p>
                                <a href="{{product_url($myproduk)}}" class="tbl-lihat">Lihat</a>
                            </div>
                        </div>
                        <p><a class="navi-blog" href="{{product_url($myproduk)}}">{{ short_description($myproduk->nama,32) }}</a></p>
                    </article>
                    @endforeach
                </div>
                {{list_product(null,@$category,@$collection)->links()}}
                @else
                    <p class="notfound">Produk tidak ditemukan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>