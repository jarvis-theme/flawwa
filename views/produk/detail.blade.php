<div class="row-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="option-mobile">
                <p class="product-title">{{$produk->nama}}</p>
                <p class="price">
                    <big>{{ price($produk->hargaJual) }}</big>
                    @if($produk->hargaCoret != 0)
                    &nbsp;<big class="discount">{{ price($produk->hargaCoret) }}</big>
                    @endif
                </p>
                <div class="sosmed">
                    {{ sosialShare(url(product_url($produk))) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
            <div id="slider" class="flexslider-produk">
                <ul class="slides">
                    @if($produk->gambar1!='')
                    <li data-thumb="{{ product_image_url($produk->gambar1,'thumb') }}">
                        <a class="fancybox" href="{{product_image_url($produk->gambar1, 'large')}}" title="{{$produk->nama}}">
                            {{HTML::image(product_image_url($produk->gambar1,'large'), $produk->nama)}}
                        </a>
                    </li>
                    @endif

                    @if($produk->gambar2!='')
                    <li data-thumb="{{ product_image_url($produk->gambar2,'thumb') }}">
                        <a class="fancybox" href="{{product_image_url($produk->gambar2, 'large')}}" title="{{$produk->nama}}">
                            {{HTML::image(product_image_url($produk->gambar2, 'large'), $produk->nama)}}
                        </a>
                    </li>
                    @endif

                    @if($produk->gambar3!='')
                    <li data-thumb="{{ product_image_url($produk->gambar3,'thumb') }}">
                        <a class="fancybox" href="{{product_image_url($produk->gambar3, 'large')}}" title="{{$produk->nama}}">
                            {{HTML::image(product_image_url($produk->gambar3,'large'), $produk->nama)}}
                        </a>
                    </li>
                    @endif

                    @if($produk->gambar4!='')
                    <li data-thumb="{{product_image_url($produk->gambar4,'thumb')}}">
                        <a class="fancybox" href="{{product_image_url($produk->gambar4, 'large')}}" title="{{$produk->nama}}">
                            {{HTML::image(product_image_url($produk->gambar4,'large'), $produk->nama)}}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="span7 detailpro">
            <div class="option-title">
                <p class="product-title titlepro">{{$produk->nama}}</p>
                <p class="price">
                    <big class="price">{{ price($produk->hargaJual) }}</big>
                    @if($produk->hargaCoret != 0)
                    &nbsp;<big class="disc-title">{{ price($produk->hargaCoret) }}</big>
                    @endif
                </p>
                <div class="hidden-phone sosmed">
                    {{ sosialShare(url(product_url($produk))) }}
                </div>
            </div>
            <form action="#" id="addorder">
                <div class="option-cart">
                    @if($opsiproduk->count() > 0)
                    <label>Opsi :</label>
                    <select>
                        <option value=""> Pilih Opsi </option>
                        @foreach ($opsiproduk as $key => $opsi)
                        <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                            {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                        </option>
                        @endforeach
                    </select>
                    @endif
                    <div class="opsi">
                        <label id="qty-label">Jumlah</label>
                        <input type="text" value="1" name="qty" class="qty">
                    </div>
                    <button type="submit" class="cart-button">Beli</button>
                </div>
            </form>
        
            <div class="description">
                <h3 class="desc-title">DESKRIPSI PRODUK</h3>
                <p>{{$produk->deskripsi}}</p>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 review">
        {{pluginTrustklik()}}
    </div>
</div>
@if(count(other_product($produk))>0)
<div class="row-fluid">
    <div class="span12 otherpro">
        <div class="cross-wrapper">
            <hr />
            <h3 class="desc-title">Produk Lainnya</h3>
            <hr />
            <section class="row-fluid cross-product">
                @foreach(other_product($produk) as $myproduk)
                <article class="span3 relate">
                    <span class="badge badge-inverse">{{price($myproduk->hargaJual)}}</span>
                    <div class="view thumb-prod">
                        {{HTML::image(product_image_url($myproduk->gambar1), $myproduk->nama, array('class'=>'img1'))}}
                        <div class="mask">
                            <p>{{short_description($myproduk->deskripsi,50)}}</p>
                            <a href="{{product_url($myproduk)}}" class="tbl-lihat">Lihat</a>
                        </div>
                    </div>
                    <p class="center"><a class="navi-blog" href="{{product_url($myproduk)}}">{{ short_description($myproduk->nama,20) }}</a></p>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif