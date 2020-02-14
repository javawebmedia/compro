<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/print.css') ?>" media="print">
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/print.css') ?>" media="screen"> -->
</head>
<body>
	<div class="cetak">
		<h1>DATA PROFIL <?php echo $client->nama ?></h1>
		<table class="table">
			<tbody>
				<tr>
					<td rowspan="14" width="200" style="border-right: solid thin #EEE;">
						<?php if($client->gambar != "") { ?>
							<img src="<?php echo base_url('assets/upload/client/'.$client->gambar) ?>" alt="<?php echo $client->nama ?>" class="foto" width="190">
						<?php }else{ ?>
							<img src="<?php echo base_url('assets/admin/dist/img/boxed-bg.jpg') ?>" alt="<?php echo $client->nama ?>" class="foto" width="190">
						<?php } ?>
					</td>
					<td width="25%">Nama</td>
					<td width="1%">:</td>
					<td><?php echo $client->nama ?></td>
				</tr>
				<tr>
            			<td>Username</td>
            			<td>:</td>
            			<td><?php echo $client->email ?></td>
            		</tr>
            		<tr>
            			<td>Password</td>
            			<td>:</td>
            			<td><?php echo $client->password_hint ?></td>
            		</tr>
				<tr>
					<td width="25%">Tempat, tanggal lahir</td>
					<td width="1%">:</td>
					<td><?php echo $client->tempat_lahir.', '.date('d-m-Y',strtotime($client->tanggal_lahir)) ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $client->email ?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $client->telepon ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $client->alamat ?></td>
				</tr>
				<tr>
					<td>Jenis client</td>
					<td>:</td>
					<td><?php echo $client->jenis_client ?></td>
				</tr>
				<tr>
					<td>Client Ditampilkan?</td>
					<td>:</td>
					<td><?php echo $client->status_client ?></td>
				</tr>
				<tr>
					<td>Testimoni ditampilkan?</td>
					<td>:</td>
					<td><?php echo $client->status_testimoni ?></td>
				</tr>
				
				<tr>
					<td>Isi Testimoni</td>
					<td>:</td>
					<td><?php echo $client->isi_testimoni ?></td>
				</tr>
				<tr>
					<td>Keywords di Google</td>
					<td>:</td>
					<td><?php echo $client->keywords ?></td>
				</tr>
				<tr>
					<td>IP Address</td>
					<td>:</td>
					<td><?php echo $client->ip_address ?></td>
				</tr>
				<tr>
					<td>Tanggal update</td>
					<td>:</td>
					<td><?php echo $client->tanggal ?></td>
				</tr>
			</tbody>
		</table>
		<small>Tanggal cetak: <?php echo date('d-M-Y H:i:s') ?> - <?php echo $site->namaweb ?></small>
		<pagebreak>
		<h1>DATA KURSUS <?php echo strtoupper($client->nama.' DI '.$site->namaweb) ?></h1>	
		<pagebreak>
		<h1>DATA PEMBAYARAN <?php echo strtoupper($client->nama.' DI '.$site->namaweb) ?></h1>
		<pagebreak>
		<h1>DATA KEHADIRAN <?php echo strtoupper($client->nama.' DI '.$site->namaweb) ?></h1>
	</div>
</body>
</html>