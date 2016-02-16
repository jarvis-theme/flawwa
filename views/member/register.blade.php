<div class="row-fluid standard">
    <div class="span12 pages">
        <h1 id="reg">Registrasi</h1>
    </div>
</div>

<div class="row-fluid cart">
    <div class="span12">
        {{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
            <div class="control-group">
                <label class="control-label" for="inputEmail"> Nama*</label>
                <div class="controls">
                  <input class="span6 txt" type="text" name="nama" value="{{Input::old('nama')}}" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Email*</label>
                <div class="controls">
                    <input type="email" class="span6 txt" name="email" value="{{Input::old('email')}}" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Password*</label>
                <div class="controls">
                    <input class="span6 txt" type="password" name="password" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Ulangi Password*</label>
                <div class="controls">
                    <input class="span6 txt" type="password" name="password_confirmation" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Alamat*</label>
                <div class="controls">
                    <textarea class="span6" name="alamat">{{Input::old("alamat")}}</textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Negara*</label>
                <div class="controls" >
                    {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old(''),array('required', "id"=>"negara", "data-rel"=>"chosen"))}}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Provinsi*</label>
                <div class="controls" id="provinsiPlace">
                    {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required', "id"=>"provinsi", "data-rel"=>"chosen"))}}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Kota*</label>
                <div class="controls" id="kotaPlace">
                    {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required'=>'','id'=>'kota'))}}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Kode Pos*</label>
                <div class="controls">
                  <input class="span3 txt" type="text" name="kodepos" value="{{Input::old('kodepos')}}" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Telepon / HP*</label>
                <div class="controls">
                    <input class="span4 text" type="text" name="telp" value="{{Input::old('telp')}}" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"> Kode Captcha*</label>
                <div class="controls">
                    {{ HTML::image(Captcha::img(), 'Captcha image') }}<br><br>
                    {{Form::text('captcha', '', array('class'=>'inputbox','placeholder'=>'Masukkan kode diatas'))}}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputEmail"></label>
                <div class="controls">
                    <input type="checkbox" name="readme" value="1" required checked> Saya telah membaca dan menyetujui <a href="{{url('service')}}" target="_blank" class="rules"><b>Syarat dan Ketentuan</b></a> di {{Theme::place('title')}}
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="cart-button"><i class="fa fa-check"></i> Daftar</button>
                </div>
            </div>
        {{Form::close()}}
    </div>
</div>