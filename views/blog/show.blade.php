<div class="prime pages">
    <h3>{{$detailblog->judul}}</h3>
    @if(count($detailblog->kategori) > 0)
    <p><span class="date"><i class="fa fa-calendar"></i> {{date("d M Y", strtotime($detailblog->created_at))}} <i class="fa fa-tag"></i> <a href="{{blog_category_url(@$detailblog->kategori)}}" class="navi-blog">{{@$detailblog->kategori->nama}}</a></span></p>
    @else
    <p><span class="date"><i class="fa fa-calendar"></i> {{date("d M Y", strtotime($detailblog->created_at))}}</span></p>
    @endif
</div>

<div class="row-fluid post">
    <div class="span8">
        <article class="blog-content">
            <p>{{$detailblog->isi}}</p>
        </article>
        <div class="navigate comments clearfix">
            @if(prev_blog($detailblog))
                <div class="pull-left"><a href="{{blog_url(prev_blog())}}" class="navi-blog">&larr; Sebelumnya</a></div>
            @else
                <div class="pull-right"></div>
            @endif

            @if(next_blog($detailblog))
                <div class="pull-right"><a href="{{blog_url(next_blog())}}" class="navi-blog">Selanjutnya &rarr;</a></div>
            @else
                <div class="pull-right"></div>
            @endif
        </div>
        <hr>
        <div class="share">
            {{ sosialShare(blog_url($detailblog)) }}
        </div>
        <hr>
        <div>
            {{$fbscript}}
            {{fbcommentbox(url(blog_url($detailblog)), '100%', '5', 'light')}}
        </div>
    </div>
    <div class="span4 sidebar">
        @if(count(recentBlog()) > 0)
        <aside>
            <p class="title-sidebar"><i class="fa fa-rss"></i> <strong>Artikel Terbaru</strong></p>
            <ul>
                @foreach(recentBlog($detailblog) as $recent)
                <li><a href="{{ blog_url($recent) }}">{{$recent->judul}}</a><br/><small>diposting tanggal {{waktuTgl($recent->created_at)}}</small></li>
                @endforeach
            </ul>
        </aside>
        @endif
        @if(count($detailblog->tags) > 0)
        <aside class="clearfix tags">
            <p class="title-sidebar"><i class="fa fa-tag"></i> <strong>Tags</strong></p>
            {{ getTags('<span class="underline"></span>',$detailblog->tags)}}
        </aside>
        @endif
    </div>
</div>