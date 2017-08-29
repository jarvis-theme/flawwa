<div class="pages">
    <h3>{{$nama}}</h3>
</div>
<div class="row-fluid">
    <div class="span8 list">
        @foreach(list_testimonial() as $key=>$value)
        <article class="testimonial">
            <h5>{{$value->nama}}</h5>
            <p>{{substr($value->isi,0,250)}}</p>
        </article>
        @endforeach
        {{list_testimonial()->links()}}
    </div>
    <aside class="span4 testi">
        <p class="title-testi"><strong>Kirim Testimonial</strong></p>
        <form action="{{url('testimoni')}}" method="post">
            <label>Nama</label>
            <input type="text" name="nama" class="input-text inputname" required>
            <br><br>
            <label>Testimonial</label>
            <textarea name="testimonial" class="textarea" required></textarea>
            <br><br>
            <input type="submit" class="cart-button pull-right" value="Kirim">
            <br><br>
        </form>
    </aside>
</div>