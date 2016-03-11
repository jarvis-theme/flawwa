<div class="row-fluid">
    <div class="span12 pages">
        <h3>Kontak Kami</h3>
    </div>
    <div class="row-fluid">
        <div class="span6">
        @if($kontak->alamat!='')
            <address>
                <b>{{$kontak->nama}}</b><br/>
                <i class="fa fa-map-marker"></i> {{$kontak->alamat}}<br/>
                <i class="fa fa-phone-square"></i> {{$kontak->telepon}}<br/>
            </address>
        @else
            <div></div>
        @endif

            <div class="block">
                <form id="contact-us" action="{{url('kontak')}}" method="post">
                    <p class="title-result"><strong>Hubungi Kami</strong></p>
                    <ul id="contact_form">
                        <li>
                            <input type="text" name="namaKontak" id="contactName" value="" class="txt requiredField" placeholder="Name" required />
                        </li>
                        <li>
                            <input type="text" name="emailKontak" id="email" value="" class="txt requiredField email" placeholder="Email" required />
                        </li>
                        <li>
                            <textarea name="messageKontak" id="commentsText" class="txtarea requiredField" placeholder="Pesan" required></textarea>
                        </li>
                        <li>
                            <button name="submit" type="submit" class="cart-button">Kirim</button>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="span6">
            @if($kontak->lat!='0' || $kontak->lng!='0')
                <iframe class="pull-right" width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
            @else
                <iframe class="pull-right" width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{str_replace(' ','+',$kontak->alamat)}}&amp;aq=0&amp;oq={{str_replace(' ','+',$kontak->alamat)}}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{str_replace(' ','+',$kontak->alamat)}}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
            @endif
        </div>
    </div>
</div>