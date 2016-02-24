<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= (Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : 'none';?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Data Utama', 'options' => ['class' => 'header']],
                   
                    ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 'url' => Yii::$app->homeUrl],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Data Master',
                        'icon' => 'fa fa-bank',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Data Alat', 'icon' => 'fa fa-video-camera', 'url' => ['/tbl-alat'],],
                            ['label' => 'Data Bahan Baku', 'icon' => 'fa fa-cutlery', 'url' => ['/tbl-barang'],],
                            ['label'=>'Acara','icon'=>'fa fa-calendar','url'=>['/tbl-acara'],],
                            ['label'=>'Pejabat','icon'=>'fa fa-user','url'=>['/tbl-pejabat'],],
                            ['label'=>'Kameramen','icon'=>'fa fa-street-view','url'=>['/tbl-pengguna'],],
                            
                            [
                                'label' => 'Lain-lain',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Jenis Barang', 'icon' => 'fa fa-circle-o', 'url' =>['/tbl-jnst-brg'] ,],
                                    ['label'=>'Kategori Barang','icon'=>'fa fa-circle-o','url'=>['/tbl-kat-brg'],],
                                    ['label'=>'Rak','icon'=>'fa fa-briefcase','url'=>['/tabel-rak'],],
                                    ['label'=>'Folder','icon'=>'fa fa-archive','url'=>['/tbl-arsip'],],
                                   
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label'=>'Transaksi',
                        'icon'=>'fa fa-cart-plus',
                        'url'=>'#',
                        'items'=>[
                            ['label'=>'Peminjaman Alat','icon'=>'fa fa-dot-circle-o','url'=>['/tbl-pinjam-alat'],],
                            ['label'=>'Pengembalian Alat','icon'=>'fa fa-dot-circle-o','url'=>['/tbl-kembali-alat'],],
                            ['label'=>'Barang Masuk','icon'=>'fa fa-dot-circle-o','url'=>['/tbl-msk-brg'],],
                            ['label'=>'Permintaan Bahan Baku','icon'=>'fa fa-dot-circle-o','url'=>['/tbl-minta-bhn-baku'],],
                            ['label'=>'Retur','icon'=>'fa fa-dot-circle-o','url'=>['/tbl-retur'],],
                             ['label'=>'Pengarsipan','icon'=>'fa fa-folder','url'=>['/tbl-folder'],],
                            ['label'=>'Penerimaan Kaset Liputan','icon'=>'fa fa-newspaper-o','url'=>['/tbl-kaset-liputan'],],
                        ]
                    ],
                    //['label'=>'Tambah Pengguna','icon'=>'fa fa-user-plus','url'=>['/user'],],
                    [
                        'label'=>'User',
                        'icon'=>'fa fa-user-plus',
                        'url'=>'#',
                        'items'=>[
                            ['label'=>'Tambah Pengguna','icon'=>'fa fa-dot-circle-o','url'=>['/user'],],
                            ['label'=>'Grant Acces','icon'=>'fa fa-dot-circle-o','url'=>['/admin'],],
                            ['label'=>'Roles','icon'=>'fa fa-dot-circle-o','url'=>['/admin/role'],],
                            
                        ]
                    ],
                    [
                        'label'=>'Cetak',
                        'icon'=>'fa fa-print',
                        'url'=>'#',
                        'items'=>[
                            ['label'=>'Evidence SKP','icon'=>'fa fa-dot-circle-o','url'=>['/'],],
                            
                            ['label'=>'Peminjaman Alat','icon'=>'fa fa-dot-circle-o','url'=>['/peminjaman'],],
                            ['label'=>'Pengembalian Alat','icon'=>'fa fa-dot-circle-o','url'=>['/pengembalian'],],
                            ['label'=>'Permintaan Bahan Baku','icon'=>'fa fa-dot-circle-o','url'=>['/permintaan'],],
                            ['label'=>'Retur Bahan Baku','icon'=>'fa fa-dot-circle-o','url'=>['/'],],
                            ['label'=>'Pemakaian Bahan Baku','icon'=>'fa fa-dot-circle-o','url'=>['/'],],
                        ]
                    ]
                ],
            ]
        ) ?>

    </section>

</aside>
