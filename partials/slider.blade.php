<div id="flexslider" class="flexslider">
    <ul class="slides span12">
        @foreach (slideshow() as $val)
        <li>
            @if(!empty($val->url))
            <a href="{{filter_link_url($val->url)}}" target="_blank">
            @else
            <a href="#">
            @endif
                <img src="{{url(slide_image_url($val->gambar))}}" alt="{{ $val->title }}" />
            </a>
        </li>
        @endforeach
    </ul>
</div>