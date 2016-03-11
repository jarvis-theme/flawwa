<div class="row standard">
    <header class="span12 prime">
        <h3>Detail Pemesanan</h3>
    </header>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="form-horizontal table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th align="center">Kode Order</th>
                    <th align="center">Tanggal Order</th>
                    <th align="center" class="hidden-phone">Order</th>
                    <th align="center" class="hidden-phone">Jumlah</th>
                    <th align="center">No Resi</th>
                    <th align="center">Status</th>
                </tr>
                <tr>
                    <td>{{ prefixOrder().$order->kodeOrder }}</td>
                    <td>{{ waktu($order->tanggalOrder) }}</td>
                    <td class="hidden-phone">
                        <ul>
                            @foreach ($order->detailorder as $detail)
                            <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="hidden-phone">{{ price($order->total) }}</td>
                    <td>{{ $order->noResi }}</td>
                    <td>
                        @if($order->status==0)
                        <span class="label label-warning">Pending</span>
                        @elseif($order->status==1)
                        <span class="label label-important">Konfirmasi diterima</span>
                        @elseif($order->status==2)
                        <span class="label label-info">Pembayaran diterima</span>
                        @elseif($order->status==3)
                        <span class="label label-success">Terkirim</span>
                        @elseif($order->status==4)
                        <span class="label label-default">Batal</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        @if($paymentinfo!=null)
        <h3><center>Paypal Payment Details</center></h3>
        <hr>
        <table class="table table-bordered">
            <tr>
                <td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td>
            </tr>
            <tr>
                <td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td>
            </tr>
            <tr>
                <td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td>
            </tr>
            <tr>
                <td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td>
            </tr>
            <tr>
                <td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td>
            </tr>
            <tr>
                <td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td>
            </tr>
            <tr>
                <td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
            </tr>
        </table>
        <p>Thanks you for your order.</p>
        @endif

        <div class="well">
            @if($order->jenisPembayaran == 1 && $order->status == 0)
                <h3><center>Konfirmasi Pembayaran</center></h3>
                <hr>
                {{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}} 
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"> Nama Pengirim</label>
                        <div class="controls">
                            <input class="span6" type="text" name="nama" value="{{Input::old('nama')}}" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"> No Rekening</label>
                        <div class="controls">
                            <input type="text" class="span6" name="noRekPengirim" value="{{Input::old('noRekPengirim')}}" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"> Rekening Tujuan</label>
                        <div class="controls">
                            <select name="bank">
                                <option value="">-- Pilih Bank Tujuan --</option>
                                @foreach (list_banks() as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"> Jumlah</label>
                        <div class="controls">
                            <input class="span6 inputbox" type="number" name="jumlah" value="{{$order->total}}" required >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                          <button type="submit" class="cart-button"><i class="fa fa-check"></i> Konfirmasi</button>
                        </div>
                    </div>
                {{Form::close()}}
            @endif
            @if($order->jenisPembayaran==2)
                <h3><center>Konfirmasi Pemabayaran Via Paypal</center></h3>
                <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
                {{$paypalbutton}}
            @elseif($order->jenisPembayaran==4) 
                @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
                <p>Jika anda belum melakukan pembayaran via iPaymu, klik tombol bayar dibawah ini</p><br/>
                <a class="cart-button" href="{{url('ipaymu/'.$order->id)}}" target="_blank">Bayar dengan iPaymu</a>
                @endif
            @elseif($order->jenisPembayaran==6)
                @if($order->status == 0)
                <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
                <p>Silahkan melakukan pembayaran dengan bitcoin Anda secara online via bitcoin payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum <b>{{$expired_bitcoin}}</b>. Klik tombol "Pay with Bitcoin" di bawah untuk melanjutkan proses pembayaran.</p>
                {{$bitcoinbutton}}
                <br>
                @else
                <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
                <p class="expired"><b>Batas waktu pembayaran bicoin anda telah habis.</b></p>
                @endif
            @endif
        </div>
    </div>
</div>