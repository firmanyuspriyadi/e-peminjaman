<?php
use yii\helpers\Html;
use backend\assets\AppAsset;
use dmstr\web\AdminLteAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
AdminLteAsset::register($this);


?>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
}
.style2 {
	font-size: large;
	font-weight: bold;
}
.style3 {
        font-size:12px;
}
.style4{
    font-size: 14;
}
--!>
</style>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            
            <meta charset="<?= Yii::$app->charset ?>"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body onLoad="window.print();">
            <?php $this->beginBody() ?>
                <div class="wrapper">
                  <!-- Main content -->
                  <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12">
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        </h2>
                      </div>
                      <div class="col-xs-12">

                              <i class="fa fa-globe"></i><p align="center" class="style1"> DAFTAR PERALATAN YANG DIPERGUNAKAN</p>
                          <p align="center" class="style2">UNTUK ACARA HARIAN PRESIDEN JOKOWI</p>
                          <small class="pull-right"></small>
                        </h2>
                      </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <br>
                    <br>
                    <div class="row invoice-info">
                        <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead >
                            <tr>                
                                <th><p class="style3">Acara</p></th>
                        <th><p class="style3">Tempat</p></th>
                        <th><p class="style3">Pukul</p></th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                             
                              <td> <p class="style3">
                                    <?php foreach ($modelacara as $acara) :
                                      echo $acara->namaAcara ."<br>";
                                      endforeach;
                                      ?></p>
                              </td>
                              <td><p class="style3">
                                        <?php foreach ($modelacara as $acara2) :
                                                  echo $acara2->tempat ."<br>";
                                                  endforeach;;
                                        ?>
                                  </p>
                              </td>
                              <td>
                                  <p class="style3">
                                    <?php foreach ($modelacara as $acara3) :
                                    echo $acara3->pukul ."<br>" ;
                                    endforeach;;
                                    ?>
                                  </p>
                              </td>
                             
                              
                            </tr>
                            
                          </tbody>
                        
                        </table>
                        
                     
                      </div>
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>                
                                <th><p class="style3" align="center">No</p></th>
                        <th><p class="style3" align="center">NAMA BARANG</p></th>
                        <th><p class="style3" align="center">TYPE</p></th>
                        <th><p class="style3" align="center">NO. SERIE</p></th>
                        <th><p class="style3" align="center">JUMLAH</p></th>
                        <th><p class="style3" align="center">KETERANGAN</p></th>
                            </tr>
                          </thead>
                          <tbody>
                               <?php foreach ($modelpinjam as $pinjam): $n==1 ?>
                            <tr>
                             
                                <td><p class="style3"><?= $n++;?></p></td>
                                <td><p class="style3"><?= $pinjam->namaAlat; ?></p></td>
                                <td><p class="style3"><?= $pinjam->namaModel; ?></p></td>
                                <td><p class="style3"><?= $pinjam->noSeri; ?></p></td>
                                <td><p class="style3"><?= $pinjam->banyak_alat ;?></p></td>
                              <td><p class="style3"><?= $pinjam->kondisi; ?></p></td>
                              
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row invoice-info">
                      <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th><p class="style3">Jakarta, </p></th>
                                </tr>
                                <tr>                
                                    <th><p class="style3">Mengetahui,</p></th>
                                    <th><p class="style3">Yang Menyerahkan</p></th>
                                    <th><p class="style3">Yang Menerima</p></th>

                                </tr>
                            </thead>
                          <tbody>
                            <tr>
                             
                              <td> 
                                  <?= $modeljabatan;?>
                              </td>
                              <td>
                              </td>
                              <td>
                                  
                              </td>
                             
                              
                            </tr>
                            
                            <tr>
                             
                              <td> <p class="style3">
                                       
                                   </p>
                              </td>
                              <td><p class="style3">
                                    
                                  </p>
                              </td>
                              <td>
                                  <p class="style3">
                                     
                                  </p>
                              </td>
                             
                              
                            </tr>
                            
                          </tbody>
                        
                        </table>
                        
                     
                      </div>
                    </div><!-- /.row -->
                  </section><!-- /.content -->
                </div><!-- ./wrapper -->

            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage() ?>

