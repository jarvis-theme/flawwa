<div class="pages">
    <h3 class="center">Member Area</h3>
</div>
<div class="row-fluid">
    <div class="span12">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active">
                <a href="#home">History Transaksi</a>
            </li>
            <li>
                <a href="#profile">Profile</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="table-responsive">
                    <br>
                    @if($pengaturan->checkoutType!=2) 
                        @if($order->count()>0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="15%">ID Order</td>
                                        <td width="15%">Tanggal Order</td>
                                        <td width="30%">Detail Order</td>
                                        <td width="20%">Total Order</td>
                                        <td width="10%">No. Resi</td>
                                        <td width="5%">Status</td>
                                        <td width="5%"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (list_order() as $item)
                                    <tr>
                                        <td>
                                            {{$pengaturan->checkoutType==3 ? prefixOrder().$item->kodePreorder : prefixOrder().$item->kodeOrder}}
                                        </td>
                                        <td>
                                            {{$pengaturan->checkoutType==3 ? waktu($item->tanggalPreorder) : waktu($item->tanggalOrder)}}
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($item->detailorder as $detail)
                                                <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku['opsi1'].($detail->opsisku['opsi2'] != '' ? ' / '.$detail->opsisku['opsi2']:'').($detail->opsisku['opsi3'] !='' ? ' / '.$detail->opsisku['opsi3']:'').')':''}} - {{$detail->qty}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ price($item->total) }}</td>
                                        <td>{{ $item->noResi }}</td>
                                        <td>
                                            @if($pengaturan->checkoutType==1)
                                                @if($item->status==0)
                                                    <span class="label label-warning">Pending</span>
                                                @elseif($item->status==1)
                                                    <span class="label label-info">Konfirmasi diterima</span>
                                                @elseif($item->status==2)
                                                    <span class="label label-success">Pembayaran diterima</span>
                                                @elseif($item->status==3)
                                                    <span class="label label-success">Terkirim</span>
                                                @elseif($item->status==4)
                                                    <span class="label label-important">Batal</span>
                                                @endif 
                                            @else
                                                @if($item->status==0)
                                                    <span class="label label-warning">Pending</span>
                                                @elseif($item->status==1)
                                                    <span class="label label-info">Konfirmasi DP diterima</span>
                                                @elseif($item->status==2)
                                                    <span class="label label-success">DP terbayar</span>
                                                @elseif($item->status==3)
                                                    <span class="label label-info">Menunggu pelunasan</span>
                                                @elseif($item->status==4)
                                                    <span class="label label-success">Pembayaran lunas</span>
                                                @elseif($item->status==5)
                                                    <span class="label label-success">Terkirim</span>
                                                @elseif($item->status==6)
                                                    <span class="label label-important">Batal</span>
                                                @elseif($item->status==7)
                                                    <span class="label label-info">Konfirmasi Pelunasan diterima</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pengaturan->checkoutType==3) 
                                                @if($item->status < 4)
                                                    <a href="{{url('konfirmasipreorder/'.$item->id)}}" class="btn btn-success">Konfirmasi Pembayaran</a>
                                                @endif 
                                            @endif
                                            @if($pengaturan->checkoutType==1) 
                                                 @if($item->status < 1)
                                                    <a href="{{url('konfirmasiorder/'.$item->id)}}" class="btn btn-success">Konfirmasi Pembayaran</a>
                                                @endif 
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <center>
                                <h4>Daftar order anda masih kosong.</h4>
                            </center>
                        @endif 
                    @else 
                        @if($inquiry->count()!=0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td width="15%">ID Order</td>
                                    <td width="15%">Tanggal Order</td>
                                    <td width="30%">Detail Order</td>
                                    <td width="5%">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inquiry as $item)
                                <tr>
                                    <td>{{ prefixOrder().$item->kodeInquiry }}</td>
                                    <td>{{ waktu($item->created_at) }}</td>
                                    <td>
                                        @foreach ($item->detailInquiry as $detail)
                                        <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku['opsi1'].($detail->opsisku['opsi2'] != '' ? ' / '.$detail->opsisku['opsi2']:'').($detail->opsisku['opsi3'] !='' ? ' / '.$detail->opsisku['opsi3']:'').')':''}} - {{$detail->qty}}</li>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($item->status==0)
                                        <span class="label label-warning">Pending</span>
                                        @elseif($item->status==1)
                                        <span class="label label-success">Inquiry diterima</span>
                                        @elseif($item->status==2)
                                        <span class="label label-info">Batal</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tr><td colspan="2">Inquiry anda masih kosong.</td></tr>
                        @endif
                        </table>
                    @endif
                </div>
                {{ list_order()->links() }} 
            </div>
            <div class="tab-pane" id="profile">
                <br>
                <div class="row-fluid">
                    {{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
                    <div class="span6">
                        <h4>Biodata</h4>
                        Nama

                        <br>
                        <input class="span10" type="text" name="nama" value="{{$user->nama}}">
                        <br>
                        <br>Email

                        <br>
                        <input type="email" class="span10" name="email" value="{{$user->email}}">
                        <br>
                        <br>Alamat

                        <br>
                        <textarea class="span10" name="alamat">{{$user->alamat}}</textarea>
                        <br>
                        <br>
                        <label>Negara</label>
                        <div>
                            {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
                        </div>
                        <br>
                        <label>Provinsi</label>
                        <div>
                            {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi'))}}
                        </div>
                        <br>
                        <label>Kota</label>
                        <div>
                            {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota'))}}
                        </div>
                        <br>
                        <label>Kode Pos</label>
                        <input class="span3" type="text" name="kodepos" value="{{$user->kodepos}}">
                        <br><br>
                        <label>Telepon / HP</label>
                        <div>
                            {{Form::input('text', 'telp', $user->telp, array('class'=>'span4'))}}
                        </div>
                        <br><br>
                    </div>
                    <div class="span5">
                        <h4>Ubah Password</h4>
                        Password Lama
                        <br>
                        <input class="span10" type="password" name="oldpassword">
                        <br>
                        <br>Password Baru
                        <br>
                        <input class="span10" type="password" name="password">
                        <br>
                        <br>Ulangi Password Baru
                        <br>
                        <input class="span10" type="password" name="password_confirmation">
                        <br><br>
                    </div>
                    <div class="span10">
                        <button type="submit" class="cart-button"><i class="fa fa-check"></i> Update</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>