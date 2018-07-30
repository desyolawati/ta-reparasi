  <?php
  session_start();
if(!isset($_SESSION['admin'])){
    echo"<script language='JavaScript'>document.location='login.php'</script>";
      exit();
}

/*require '../act/viewdata.php';*/
include ('act/viewdata.php');

  ?>
  					 <input type="text" class="form-control hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
		 			
                  <div class="col-lg-12">
					<div class="row content-panel">
						<div class="col-md-4 profile-text mt mb centered">
							<div class="right-divider hidden-sm hidden-xs">
								<img src="../foto/<?php echo "$foto"; ?>" style="width:50%;;">
							</div>
						</div>
						
						<div class="col-md-4 profile-text">
							<h3><b> <?php echo  $nama_toko_repair?></b></h3>
							<p><?php echo $alamat ?></p>
							<br>
						</div>
						
						<div class="col-md-4 centered">
							<div class="profile-pic">
								<p><img src="../assets/img/3.png"></p>
							</div>
						</div>
					</div><!-- /row -->	   
          		</div>

          		<div class="col-lg-12 mt">
          		<div class="row content-panel">
          		<div class="col-lg-7 col-lg-offset-2 detailed">
                  <h4>INFORMATION</h4>
					<table>
					<tbody  style='vertical-align:top;'>
						<tr><center><h2><b><?php echo $nama_toko_repair ?></b></h2></center></tr>
						
						<tr><td><b>Alamat</b></td><td>:</td><td style='text-transform:capitalize;'>&nbsp<?php echo $alamat ?></td></tr>		
						<tr><td><b>Deskripsi</b></td><td>:</td><td style='text-transform:capitalize;'>&nbsp<?php echo $deskripsi ?></td></tr>	
						<tr><td><b>No Hp</b></td><td>:</td><td style='text-transform:capitalize;'>&nbsp<?php echo $no_telepon ?></td></tr>	
						<tr onclick='togglejad()' style="cursor:pointer;"><td><b>Jadwal Operasional</b>&nbsp;</td><td>:</td><td>
							<span id="jadwal1"><?php echo '<b>'.$hari.'</b> '.$b.' - '.$t.' ' ?><span style='color:<?php echo $warna ?>;'>(<?php echo $stat ?>) </span><i class="fa fa-chevron-down"></i></span>
							<span id="jadwal2" style="display:none;"><?php
								$q="select * from jam_kerja join hari on hari.hari_id=jam_kerja.hari_id where gid=$toko_id order by hari.hari_id";
								$res=pg_query($q);
								echo '<ul style="padding-left:20px;">';
								while($rowj = pg_fetch_array($res)){
									$hrid = $rowj['hari_id'];
									$hr = $rowj['hari'];
									$jb = substr($rowj['jam_buka'],0,-3);
									$jt = substr($rowj['jam_tutup'],0,-3);
									if ($day==$hrid){
										echo '<li><span style="display:inline-block;width:55px;font-weight:bold;">'.$hr.'</span>'.$jb.' - '.$jt.' <span style="color:'.$warna.'">('.$stat.')</span></li>';
									}else{
										echo '<li><span style="display:inline-block;width:55px;font-weight:bold;">'.$hr.'</span>'.$jb.' - '.$jt.'</li>';
									}
								}
								echo '</ul>'
							?></span><div>
						
							
						<tr><td><b>Jenis Elektronik<b> </td><td>:&nbsp </td><td>
						<table class="table table-hover table-bordered table-striped">
						<tbody>
						<?php 
							$sql3 = "SELECT distinct nama_elektronik FROM det_toko_produk join produk on produk.jenis_elektronik_id=det_toko_produk.jenis_elektronik_id where det_toko_produk.toko_id=$toko_id";
							$hasil3=pg_query($sql3);
							while($row3 = pg_fetch_array($hasil3)){
								$nama_elektronik = $row3['nama_elektronik'];
								//$nama_merek = $row3['nama_merek'];
								?>
						<tr>
						<td>&nbsp<?php echo "$nama_elektronik";?></td>
						</tr>
						<?php } ?>
						<tbody>
						</table>
						<div>
						<!-- <a href="?page=forml&toko_id=<?php echo $toko_id ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Set Elektronik </a></div><br> -->
						</td></tr>

						<tr><td><b>Merek<b> </td><td>:&nbsp </td><td>
						<table class="table table-hover table-bordered table-striped">
						<tbody>
						<?php 
							$sql2 = "SELECT distinct nama_merek FROM det_toko_produk join merek on merek.merek_id=det_toko_produk.merek_id where det_toko_produk.toko_id=$toko_id ";
							$hasil2=pg_query($sql2);
							while($row2 = pg_fetch_array($hasil2)){
								$nama_merek = $row2['nama_merek'];

						?>
						<tr>
						<td>&nbsp<?php echo "$nama_merek"; ?></td>
						</tr>
						<?php } ?>
						<tbody>
						</table></td></tr>
						<tr><td><b>Layanan<b> </td><td>:&nbsp </td><td>
						<table class="table table-hover table-bordered table-striped">
						<tbody>
						<?php 
							$sql2 = "select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
    st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,ly.nama_layananan from layanan as ly left join layanan_toko_reparasi as dln on dln.layanan_id=ly.layanan_id left join toko_reparasi as tr on tr.toko_id=dln.toko_id  where tr.toko_id=$toko_id";
							$hasil2=pg_query($sql2);
							while($row2 = pg_fetch_array($hasil2)){
								$nama_layananan = $row2['nama_layananan'];

						?>
						<tr>
						<td>&nbsp<?php echo "$nama_layananan"; ?></td>
						</tr>
						<?php } ?>
						<tbody>
						</table></td></tr>

			

						<tr><td><b>Lokasi (latitude, longitude)<b> </td><td>: </td><td><?php echo $latitude ?> <b>, </b><?php echo $longitude ?></td></tr>
					</tbody>
				</table>
                      </div>
                      </div>
                      </div>

			  
			

         