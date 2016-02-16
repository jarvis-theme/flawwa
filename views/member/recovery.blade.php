<section class="login">
    <div class="row-fluid">
        <header class="span12 pages">
            <h3>Forget Password</h3>
        </header>
    </div>

    <div class="wrap forget">
        <div class="row-fluid">
            <div class="span7">
                {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Password Baru</label>
                        <div class="controls">
                            <input class="form-control inputbox" type="password" name="password" placeholder="Password Baru"  required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Ulangi Password Baru</label>
                        <div class="controls">
                            <input class="form-control inputbox" type="password" name="password_confirmation" placeholder="Ulangi Password Baru" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="cart-button">Update Password</button>
                        </div>
                    </div>
                {{Form::close()}}
            </div>

            <div class="span5">
                @foreach(vertical_banner() as $item)
                <a href="{{url($item->url)}}">
                    <img src="{{url(banner_image_url($item->gambar))}}" class="pull-right" alt="Info Promo" />
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>