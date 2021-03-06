<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-peminjaman | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="file:///C|/xampp/htdocs/e-peminjaman/vendor/almasaeed2010/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="file:///C|/xampp/htdocs/e-peminjaman/vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
-->
    </style>
</head>
  <body onLoad="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
          	<h2 class="page-header">
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
            </h2>
          </div>
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> <p align="center" class="style1" >DAFTAR PERALATAN YANG DIPERGUNAKAN</p>
              <p align="center" class="style2">UNTUK ACARA HARIAN PRESIDEN JOKOWI</p>
              <small class="pull-right"></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <strong>Acara</strong>
            <address>
              <?php foreach ($modelacara as $acara) :
              		echo $acara->namaAcara ."<br>";
              
              ?>
              
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <strong>Tempat</strong>
            <address>
              <?php foreach ($modelacara as acara2) :
              		echo $acara2->tempat "<br>";
               ?>
              
            </address>
          </div><!-- /.col -->
         <div class="col-sm-4 invoice-col">
            <strong>Pukul</strong>
            <address>
              <?php foreach ($modelacara as $acara2) :
              		echo $acara2->pukul "<br>" ;
              ?>
            </address>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>                
                  <th>No</th>
                  <th>NAMA BARANG</th>
                  <th>TYPE</th>
                  <th>NO. SERIE</th>
                  <th>JUMLAH</th>
                  <th>KETERANGAN</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach ($modelpinjam as $pinjam ?>
                  <td>1</td>
                  <td><?= $pinjam->namaAlat; ?></td>
                  <td><?= $pinjam->namaModel; ?></td>
                  <td><?= $pinjam->noSeri; ?></td>
                  <td><?= $pinjam->banyak_alat ;?></td>
                  <td><?= $pinjam->kondisi; ?></td>
                  <?php endforeach; ?>
                </tr>
                
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col" align="left">
            <br>  
            <address>
            <strong>Mengetahui, </strong><br>
              <?php foreach ($modelacara as $acara) :
              		echo $acara->namaAcara "<br>";
              
              ?>
              
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col" align="center">
             <br> 
            <address>
            <strong>Yang Menyerahkan,</strong><br>
              <?php foreach ($modelacara as acara2) :
              		echo $acara2->tempat "<br>";
               ?>
              
            </address>
          </div><!-- /.col -->
         <div class="col-sm-4 invoice-col" align="center">
            Jakarta
            <address>
            <strong>Yang Menerima,</strong><br>
              <?php foreach ($modelacara as $acara2) :
              		echo $acara2->pukul "<br>" ;
              ?>
            </address>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="file:///C|/xampp/htdocs/e-peminjaman/vendor/almasaeed2010/adminlte/dist/js/app.min.js"></script>
  </body>
</html>
