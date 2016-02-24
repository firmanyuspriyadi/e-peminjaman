<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
}
.style3 {font-size: small}
.style5 {font-size: large;}
.style7 {font-size: 18px; text-align: left}
.style12 {font-size: 22px; color: #000000; text-align: center}
.style13 {font-size: 9px; }
.style14 {font-size: 20px; text-align: center}
-->
</style>
<br>
<br>
<br>
<br>
<br>

<p align="center" class="style1">DAFTAR PERALATAN YANG DIKEMBALIKAN</p>
<div align="center" class="style5">UNTUK ACARA HARIAN PRESIDEN JOKOWI</div>
<label></label>
<br></br>
<br></br>

<table class="table table-striped table-bordered" width="1321" border="0">
    <tbody>
        <tr>
            <th width="122" style="text-align: left; font-size: 22px">Acara</th>
            <th style="text-align: left; font-size: 22px">: <?php foreach($modelacara as $acara) :
                                echo $acara->namaAcara . ', '; 
                                endforeach; ?></th>           
        </tr>
        <tr>
            <th width="122" style="text-align: left; font-size: 22px">Tempat</th>
            <th style="text-align: left; font-size: 22px">: <?php foreach ($modelacara as $acara1) :
                            echo $acara1->tempat .', ';
                            endforeach; ?></th>
        </tr>
        <tr>
            <th width="122" style="text-align: left; font-size: 22px">Tanggal</th>
            <th style="text-align: left; font-size: 22px">: <?php  foreach($modelacara as $acara2) :
                                                echo $acara2->pukul .', '; 
                                                endforeach; ?></th>
        </tr>
    </tbody>
</table>
<br></br>    
<br></br>
<table class="table table-striped table-bordered" width="1321" border="0">
    <thead>
        <tr>
            <th width="56" bgcolor="#CCCCCC" scope="col"><span class="style12">NO</span></th>
            <th width="554" bgcolor="#CCCCCC" scope="col"><span class="style12">NAMA BARANG</span></th>
            <th width="180" bgcolor="#CCCCCC" scope="col"><span class="style12">TYPE</span></th>
            <th width="161" bgcolor="#CCCCCC" scope="col"><span class="style12">NO. SERIE</span></th>
            <th width="122" bgcolor="#CCCCCC" scope="col"><span class="style12">JUMLAH</span></th>
            <th width="208" bgcolor="#CCCCCC" scope="col"><span class="style12">KETERANGAN</span></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($modelpinjam as $models) :?>
        <tr>
            <th style="text-align: center; font-size: 22px"><?php echo $n++; ?></th>
            <th style="text-align: left; font-size: 22px"><?php echo $models->namaAlat; ?></th>
            <th style="text-align: center; font-size: 22px"><?php echo $models->namaModel; ?></th>
            <th style="text-align: center; font-size: 22px"><?php echo $models->noSeri; ?></th>
            <th style="text-align: center; font-size: 22px"><?php echo $models->banyak_alat;?></th>
            <th style="text-align: center; font-size: 22px"><?php echo $models->kondisi; ?></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br></br>
<table class="table table-striped table-bordered" width="1321" border="0">
    <tbody>
        <tr>
            <th></th>
            <th></th>
            <th style="text-align: center; font-size: 22px">Jakarta, <?php echo $model->tgl_pinjam; ?></th>
        </tr>
        <tr>
            <th width="400" style="text-align: center; font-size: 22px">Mengetahui</th>
            <th width="300" style="text-align: center; font-size: 22px">Yang Menyerahkan</th>
            <th width="300" style="text-align: center; font-size: 22px">Yang Menerima</th>
        </tr>
        <tr>
            <th style="text-align: center; font-size: 22px"><?php echo $modelpejabat->jabatan; ?></th>
            <th>&nbsp;</th>
            <th>&nbsp; </th>
        </tr>
        <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
        <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
         <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
        <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
         <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
        <tr>
            <th style="text-align: center; font-size: 22px"><?php echo $modelpejabat->nama; ?></th>
            <th style="text-align: center; font-size: 22px"><?php echo $modeluser->username;?></th>
            <th style="text-align: center; font-size: 22px"><?php echo $modelpengguna->nama ;?></th>            
        </tr>
    </tbody>
</table>
