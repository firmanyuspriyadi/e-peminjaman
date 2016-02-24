<?php
/* @var $this yii\web\View */
use yii\web\Session;

$session = Yii::$app->session;
$session->open();

$this->title = 'Sistem Peminjaman Alat Liputan';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>beranda</h1>

        <p class="lead">Selamat Datang <?= $session['username'];?></p>

      
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Peminjaman Alat</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Peminjaman Alat</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Pengembalian Alat</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Pengembalian Alat</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Cetak</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Cetak</a></p>
            </div>
        </div>

    </div>
</div>
