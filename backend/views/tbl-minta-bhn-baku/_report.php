<style type="text/css">
<!--
.style1 {
	font-size: large;
	font-weight: bold;
}
.style3 {font-size: small}
.style5 {font-size: 18px; text-align: center}
.style7 {font-size: 18px; text-align: left}
.style12 {font-size: 22px; color: #000000; text-align: center}
.style13 {font-size: 12px; }
.style14 {font-size: 20px; text-align: center}
-->
</style>
<br>
<br>
<br>
<br>
<br>
<p align="center" class="style1"><u>TANDA BUKTI PENGELUARAN</u></p>

<p class="style13"><font face="Arial, Helvetica, sans-serif">Telah terima dari</font></p>
<p class="style13"><font face="Arial, Helvetica, sans-serif">Untuk keperluan</font></p>

<table class="table table-striped table-bordered" width="1321">
    <thead>
        <tr>
            <th width="56" bgcolor="#CCCCCC" scope="col"><span class="style12">No</span></th>
            <th width="665" bgcolor="#CCCCCC" scope="col"><span class="style12">Nama Barang</span></th>
            <th width="148" bgcolor="#CCCCCC" scope="col"><span class="style12">Satuan</span></th>
            <th width="156" bgcolor="#CCCCCC" scope="col"><span class="style12">Banyaknya</span></th>
            <th width="259" bgcolor="#CCCCCC" scope="col"><span class="style12">Keterangan</span></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detailminta as $minta) :?>
        <tr>
            <th style="text-align: center; font-size: 18px"><font face="Arial, Helvetica, sans-serif"><?php echo $n++ ?></font></th>
            <th class="style7"><font face="Arial, Helvetica, sans-serif"><?php echo $minta->idBarang->nm_brg; ?></font></th>
            <th class="style5"><font face="Arial, Helvetica, sans-serif"><?php echo $minta->idBarang->idJnsBrg->satuan; ?></font></th>
            <th class="style5"><font face="Arial, Helvetica, sans-serif"><?php echo $minta->banyak_minta; ?></font></th>
            <th class="style5"><font face="Arial, Helvetica, sans-serif"><?php echo $minta->keterangan; ?></font></th>
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
            <th style="text-align: center; font-size: 22px">Jakarta, </th>
        </tr>
        <tr>
            <th width="400" style="text-align: center; font-size: 18px"><font face="Arial, Helvetica, sans-serif">Mengetahui</font></th>
            <th width="300" style="text-align: center; font-size: 18px"><font face="Arial, Helvetica, sans-serif">Yang Menyerahkan</font></th>
            <th width="300" style="text-align: center; font-size: 18px"><font face="Arial, Helvetica, sans-serif">Yang Menerima</font></th>
        </tr>
        <tr>
           
            <th>&nbsp;</th>
            <th style="text-align: left; font-size: 16px"><font face="Arial, Helvetica, sans-serif">Nama     :</font></th>
            <th style="text-align: left; font-size: 16px"><font face="Arial, Helvetica, sans-serif">Nama     :</font></th>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <th style="text-align: left; font-size: 16px"><font face="Arial, Helvetica, sans-serif">Pkt/Gol. :</font></th>
            <th style="text-align: left; font-size: 16px"><font face="Arial, Helvetica, sans-serif">Pkt/Gol. : </font></th>     
        </tr>
        <tr>
           <th>&nbsp;</th>
           <th style="text-align: left; font-size: 16px"><font face="Arial, Helvetica, sans-serif">Jabatan   :</font></th>
           <th style="text-align: left; font-size: 16px"><font face="Arial, Helvetica, sans-serif">Jabatan   :</font></th>  
        </tr>
         
        <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
        <tr>
           <th>&nbsp;</th>
           <th width="400" style="text-align: center; font-size: 18px"><font face="Arial, Helvetica, sans-serif">Tanda Tangan</font></th>
            <th width="400" style="text-align: center; font-size: 18px"><font face="Arial, Helvetica, sans-serif">Tanda Tangan</font></th>       
        </tr>
         <tr>
           <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>            
        </tr>
        <tr>
            <th style="text-align: center; font-size: 22px"></th>
            <th style="text-align: center; font-size: 22px"></th>
            <th style="text-align: center; font-size: 22px"></th>            
        </tr>
    </tbody>
</table>