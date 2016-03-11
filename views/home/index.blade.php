<section class="feat prohome">
    <div class="row-fluid">
        <div class="span12">
            <h3>PRODUK KAMI</h3>
            <div class="span12">
                @foreach(home_product() as $key=>$myproduk)
                <div class="tab-pane active" id="feat">
                    <article class="span4 article-img">
                        <span id="harga" class="badge badge-inverse">{{price($myproduk->hargaJual)}}</span>

                        @if(is_outstok($myproduk))
                            {{is_outstok($myproduk)}}
                        @elseif(is_produkbaru($myproduk))
                            {{is_produkbaru($myproduk)}}
                        @elseif(is_terlaris($myproduk))
                            {{is_terlaris($myproduk)}}
                        @endif

                        <div class="view view-thumb">
                            <img src="{{ url(product_image_url($myproduk->gambar1,'medium')) }}" alt="{{shortName($myproduk->nama,25)}}" />
                            <div class="mask">
                                <p>{{short_description($myproduk->deskripsi,100)}}</p>
                                <a href="{{product_url($myproduk)}}" class="buy">Beli</a>
                            </div>
                        </div>
                        <p>
                            <a class="navi-blog" href="{{product_url($myproduk)}}">
                                {{short_description($myproduk->nama,30)}}
                            </a>
                        </p>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>