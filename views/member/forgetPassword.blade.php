<section class="login">
    <div class="row-fluid">
        <header class="span12 pages">
            <h3>Akun</h3>
        </header>
    </div>

    <div class="wrap forget">
        <div class="row-fluid">
            <div class="span6">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#forgot"><i class="fa fa-question"></i> Lupa Password</a></li>
                </ul>

                <div class="tab-content">
                    <!-- Forget Password -->
                    <div class="tab-pane active" id="forgot">
                        <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> Email</label>
                                <div class="controls">
                                    <input class="inputbox" type="email" id="inputEmail" placeholder="Email" name="recoveryEmail" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="cart-button">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="span6">
                <p class="title-register">Pelanggan Baru</p>
                <hr>
                <p>Daftar untuk mendapatkan keuntungan:
                    <ul class="ul">
                        <li>Cepat dan mudah dalam bertransaksi.</li>
                        <li>Mudah untuk mengetahui Riwayat dan Status Pemesanan.</li>
                    </ul>
                    <a href="{{url('member/create')}}" class="theme">Daftar Sekarang →</a>
                </p>
            </div>
        </div>
    </div>
</section>