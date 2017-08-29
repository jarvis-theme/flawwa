<div class="confirm-order">
    <h3 class="confirm-title">Konfirmasi Order</h3>
    <div class="main-page">
        <p>Silakan masukkan kode order yang mau anda cari!</p>
        {{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline confirm'))}}
            <input type="text" class="input-large inputbox" placeholder="Kode Order" name="kodeorder" required>
            <button type="submit" class="main-button"><i class="fa fa-check"></i> Cari Kode</button>
        {{Form::close()}}
        <br>
    </div>
</div>