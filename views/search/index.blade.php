<div class="prime pages">
    <h3>Hasil Pencarian</h3>
</div>
<div class="row-fluid search-result">
    @if($jumlahCari!=0)
        @foreach($hasilpro as $myproduk)
        <article class="justify">
            <div class="span1 center">
                <a href="{{product_url($myproduk)}}">
                    <img src="{{url(product_image_url($myproduk->gambar1,'medium'))}}" alt="{{short_description($myproduk->nama,15)}}" id="{{$myproduk->nama}}" />
                </a>
            </div>
            <div id="desc">
                <a href="{{product_url($myproduk)}}"><h4 class="navi-blog pull-left">{{short_description($myproduk->nama,70)}}</h4></a><br><br>
                <span class="left">{{short_description($myproduk->deskripsi,100)}}</span>
            </div>
        </article>
        @endforeach
        @foreach($hasilhal as $myhal)
        <article class="justify">
            <div class="blog-result">
                <a href="{{url('halaman/'.$myhal->slug)}}"><h4 class="navi-blog pull-left">{{$myhal->judul}}</h4></a><br><br>
                <span class="left">{{short_description($myhal->isi,100)}}</span>
            </div>
        </article>
        @endforeach
        @foreach($hasilblog as $myblog)
        <article class="justify">
            <div class="blog-result">
                <a href="{{blog_url($myblog)}}"><h4 class="navi-blog pull-left">{{$myblog->judul}}</h4></a><br><br>
                <span class="left">{{short_description($myblog->isi,100)}}</span>
            </div>
        </article>
        @endforeach
    @else
        <article class="search-result">
            <i>Hasil pencarian tidak ditemukan</i>
        </article>
    @endif
</div>