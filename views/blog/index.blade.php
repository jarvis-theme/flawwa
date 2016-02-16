<div class="prime pages">
    <h3>{{$title}}</h3>
</div>

<section class="blog row-fluid">
    <div class="span8 list">
    @if(count(list_blog(null,@$blog_category)) > 0)
        @foreach(list_blog(null,@$blog_category) as $value)
        <article>
            <a href="{{ blog_url($value) }}" class="navi-blog"><h4>{{$value->judul}}</h4></a>
            <p><small class="date"><i class="fa fa-calendar"></i> {{waktuTgl($value->created_at)}}</small></p>
            {{short_description($value->isi,300)}}
            <p><a href="{{ blog_url($value) }}" class="theme">Baca Selengkapnya →</a></p>
        </article>
        @endforeach
        
        <div class="pagination pagination-centered">
            {{list_blog(null,@$blog_category)->links()}}
        </div>
    @else
        <article class="notfound">Blog tidak ditemukan.</article>
    @endif
    </div>

    <div class="span4 sidebar">
        @if(count(recentBlog()) > 0)
        <aside>
            <p class="title-sidebar"><i class="fa fa-rss"></i> Artikel Baru</p>
            <ul>
                @foreach(recentBlog() as $recent)
                <li>
                    <a href="{{ blog_url($recent) }}">{{$recent->judul}}</a><br />
                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;<small>{{waktuTgl($recent->created_at)}}</small>
                </li>
                @endforeach
            </ul>
        </aside>
        @endif
        @if(count(list_blog_category()) > 0)
        <aside class="clearfix tags">
            <p class="title-sidebar"><i class="fa fa-tag"></i> Kategori</p>
            @foreach(list_blog_category() as $value)
            <span><a href="{{ blog_category_url($value) }}">{{$value->nama}}</a></span>
            @endforeach
        </aside>
        @endif
    </div>
</section>