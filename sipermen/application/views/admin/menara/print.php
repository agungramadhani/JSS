<!DOCTYPE html>
<html>

<head>
	<title>Berita Acara</title>
	<link rel="shortcut icon" href="../dashboard/images/ico/ico.png">
	<link rel="stylesheet" type="text/css" href="https://sipermen.jogjakota.go.id/assets/admin/view/style.css">
	<script src="https://sipermen.jogjakota.go.id/assets/admin/view/js/jquery.js"></script>
	<link href="https://sipermen.jogjakota.go.id/assets/admin/boostrap/vendor/fontawesome-free/css/all.min.css"
		rel="stylesheet" type="text/css">
	<script src="https://sipermen.jogjakota.go.id/assets/admin/view/js/bootstrap-editable.min.js"></script>
	<script src="https://sipermen.jogjakota.go.id/assets/admin/view/js/bootstrap.min.js"></script>
	<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
.btn {
	display:none;
}
input {
  border: none;
  display: inline;
  font-family: inherit;
  font-size: inherit;
  padding: none;
  width: auto;
}
</style>


</head>

<body>
	<div id="contoh">
		<div class="kopsurat">
			<img src="https://sipermen.jogjakota.go.id/assets/admin/view/logo.png">
			<p style="font-size: 22px;">PEMERINTAH KOTA YOGYAKARTA</p>
			<b>
				<h2>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</h2>
			</b>
			<p>Jl. Kenari No. 56 Yogyakarta Kode Pos 55165 Telp.(0274)551230, 515865, 562682 Fax. (0274)520332</p>
			<p>EMAIL : <u>kominfosandi@jogjakota.go.id:</u></p>
			<p>HOTLINE SMS: 081 2278 0001; HOTLINE EMAIL : <u>upik@jogjakota.go.id</u></p>
			<p>WEBSITE: www.jogjakota.go.id</p>
			<hr style="border-width: 3px;"> 
			<hr>
		</div>
        <?php // $user = $query->row_array(); ?>
		<div class="bodysurat">
			<h3>BERITA ACARA PENINJAUAN</h3>
			<h3><u>TITIK LOKASI PENEMPATAN MENARA TELEKOMUNIKASI</u></h3>
			<center>
				<p>Nomor 490 / <input type="text" id='nomorberita' onchange="update_nomor()" value="<?= $query['no_surat'] ?>"></p>
			</center></br></br>

			<div class="justify">
				<p>Yang bertanda-tangan dibawah ini bertindak selaku Tim Pengawasan dan Pengendalian Penyelenggaraan
					Komunikasi dan Informatika
					Kota Yogyakarta Tahun 2019.</p></br>
				<p>Berdasarkan Pada : </p></br><input type="hidden" name="id_form" value="<?= $page ?>" id="form">
				<p>1. Surat dari PT. <?= $query['nama_perusahaan']?> <?= $query['no_surat']?> tanggal <?= tanggal($query['tgl_pengajuan'])?> tentang Permohonan
					Rekomendasi Dinas Komunikasi Informatika dan Persandian.</p>
				<p>2. Laporan hasil peninjauan bersama (survey) titik lokasi penempatan menara telekomunikasi yang
					dilaksanakan oleh Tim Pengawasan dan Pengendalian Penyelanggaraan Komunikasi dan Informatika Kota
					Yogyakarta Tahun <input type="text" style="width:30px" name="tahun" id="tahun" onchange="updatethn()" value="<?= date('Y') ?>">
					pada tanggal <input type="date" name="tgl_survey" id="tgl" onchange="updatetgl()"
						value="<?= $query['tgl_pengajuan']?>"> sejumlah <?= $jumlah ?> titik lokasi.</p></br>

				<p>Dari hasil peninjauan bersama (survey), didapatkan hasil sebagai berikut : </p></br>
				<p>1. Titik lokasi penempatan menara telekomunikasi yang menggunakan <b><u>aset Pemkot Yogyakarta :</u></b></p>
				<?php if($aset->num_rows() > 0){ ?>
				<table class="table">
					<thead>
						<tr>
							<td>No.</td>
							<td>Nama Site</td>
							<td>Koordinat Pengajuan</td>
							<td>Koordinat Hasil Survey</td>
							<td>Kec-Kelurahan</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$no=1; foreach ($aset->result() as $a){ ?>
						<tr id="<?= $no ?>" class="edit_tr">
							<td></td>
							<td><?= $a->site_id ?></td>
							<td><?= $a->lat ?>, <?= $a->lng?></td>

							<td class="edit_td">
								<span id="lat_<?= $no ?>" class="text"><?= $a->lat_hasil ?></span><input type="text" name="lat" class="editbox"
									id="lat_input_<?= $no ?>" value="0">, <span id="lng_<?= $no ?>" class="text"><?= $a->lng_hasil ?></span><input
									type="text" name="lat" class="editbox" id="lng_input_<?= $no ?>" value="0">
							</td>

							</td>

							<td class="edit_td">
								<span id="kecamatan_<?= $no ?>" class="text">Umbulraharjo</span> -
								<select class="editbox" id="kecamatan_input_<?= $no ?>" onchange="pilih_kelurahan()">
									<option value="DANUREJAN">DANUREJAN</option>
									<option value="GEDONGTENGEN">GEDONGTENGEN</option>
									<option value="GONDOKUSUMAN">GONDOKUSUMAN</option>
									<option value="GONDOMANAN">GONDOMANAN</option>
									<option value="JETIS">JETIS</option>
									<option value="KOTAGEDE">KOTAGEDE</option>
									<option value="KRATON">KRATON</option>
									<option value="MANTRIJERON">MANTRIJERON</option>
									<option value="MERGANGSAN">MERGANGSAN</option>
									<option value="NGAMPILAN">NGAMPILAN</option>
									<option value="PAKUALAMAN">PAKUALAMAN</option>
									<option value="TEGALREJO">TEGALREJO</option>
									<option value="UMBULHARJO">UMBULHARJO</option>
									<option value="WIROBRAJAN">WIROBRAJAN</option>
								</select>
								<span id="kelurahan_<?= $no ?>" class="text">Sorosutan</span>
								<select class="editbox" id="kelurahan_input_<?= $no ?>"></select>
							</td>

							<td class="edit_td">
								<span id="first_<?= $no ?>" class="text"></span> <a
									href="https://sipermen.jogjakota.go.id/cetak/update_asset/15/12"
									class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
								<textarea class="editbox" id="first_input_<?= $no ?>"></textarea>
							</td>

						</tr>
						<?php $no++; } }else{
							echo '<p style="margin-left: 10px;">Tidak ada</p>';
							} ?>
					</tbody>
				</table>

				<p>3. Titik lokasi penempatan menara yang <b><u>tidak dapat </u></b> dilanjutkan untuk proses permohonan
					rekomendasi : </p>
					<?php if($asetolak->num_rows() > 0){ ?>
					<table class="table">
					<thead>
						<tr>
							<td>No.</td>
							<td>Nama Site</td>
							<td>Koordinat Pengajuan</td>
							<td>Koordinat Hasil Survey</td>
							<td>Kec-Kelurahan</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$no=1; foreach ($asetolak->result() as $at){ ?>
						<tr id="<?= $no ?>" class="edit_tr">
							<td></td>
							<td><?= $at->site_id ?></td>
							<td><?= $at->lat ?>, <?= $at->lng?></td>

							<td class="edit_td">
								<span id="lat_<?= $no ?>" class="text"><?= $at->lat_hasil ?></span><input type="text" name="lat" class="editbox"
									id="lat_input_<?= $no ?>" value="0">, <span id="lng_<?= $no ?>" class="text"><?= $at->lng_hasil ?></span><input
									type="text" name="lat" class="editbox" id="lng_input_<?= $no ?>" value="0">
							</td>

							</td>

							<td class="edit_td">
								<span id="kecamatan_<?= $no ?>" class="text">Umbulraharjo</span> -
								<select class="editbox" id="kecamatan_input_<?= $no ?>" onchange="pilih_kelurahan()">
									<option value="DANUREJAN">DANUREJAN</option>
									<option value="GEDONGTENGEN">GEDONGTENGEN</option>
									<option value="GONDOKUSUMAN">GONDOKUSUMAN</option>
									<option value="GONDOMANAN">GONDOMANAN</option>
									<option value="JETIS">JETIS</option>
									<option value="KOTAGEDE">KOTAGEDE</option>
									<option value="KRATON">KRATON</option>
									<option value="MANTRIJERON">MANTRIJERON</option>
									<option value="MERGANGSAN">MERGANGSAN</option>
									<option value="NGAMPILAN">NGAMPILAN</option>
									<option value="PAKUALAMAN">PAKUALAMAN</option>
									<option value="TEGALREJO">TEGALREJO</option>
									<option value="UMBULHARJO">UMBULHARJO</option>
									<option value="WIROBRAJAN">WIROBRAJAN</option>
								</select>
								<span id="kelurahan_<?= $no ?>" class="text">Sorosutan</span>
								<select class="editbox" id="kelurahan_input_<?= $no ?>"></select>
							</td>

							<td class="edit_td">
								<span id="first_<?= $no ?>" class="text"></span> <a
									href="https://sipermen.jogjakota.go.id/cetak/update_asset/15/12"
									class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
								<textarea class="editbox" id="first_input_<?= $no ?>"></textarea>
							</td>

						</tr>
						<?php $no++; } }else{
							echo '<p style="margin-left: 10px;">Tidak ada</p>';
							} ?>
					</tbody>
				</table>

				<p>2. Titik lokasi penempatan menara telekomunikasi yang menggunakan <b><u>Persil Warga : </u></b></p>
				<?php if($persil->num_rows() > 0){ ?>
				<table class="table">
					<thead>
						<tr>
							<td>No.</td>
							<td>Nama Site</td>
							<td>Koordinat Pengajuan</td>
							<td>Koordinat Hasil Survey</td>
							<td>Kec-Kelurahan</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$no=1; foreach ($persil->result() as $m){ ?>
						<tr id="<?= $no ?>" class="edit_tr">
							<td></td>
							<td><?= $m->site_id ?></td>
							<td><?= $m->lat ?>, <?= $m->lng?></td>

							<td class="edit_td">
								<span id="lat_<?= $no ?>" class="text"><?= $m->lat_hasil ?></span><input type="text" name="lat" class="editbox"
									id="lat_input_<?= $no ?>" value="0">, <span id="lng_<?= $no ?>" class="text"><?= $m->lng_hasil ?></span><input
									type="text" name="lat" class="editbox" id="lng_input_<?= $no ?>" value="0">
							</td>

							</td>

							<td class="edit_td">
								<span id="kecamatan_<?= $no ?>" class="text">Umbulraharjo</span> -
								<select class="editbox" id="kecamatan_input_<?= $no ?>" onchange="pilih_kelurahan()">
									<option value="DANUREJAN">DANUREJAN</option>
									<option value="GEDONGTENGEN">GEDONGTENGEN</option>
									<option value="GONDOKUSUMAN">GONDOKUSUMAN</option>
									<option value="GONDOMANAN">GONDOMANAN</option>
									<option value="JETIS">JETIS</option>
									<option value="KOTAGEDE">KOTAGEDE</option>
									<option value="KRATON">KRATON</option>
									<option value="MANTRIJERON">MANTRIJERON</option>
									<option value="MERGANGSAN">MERGANGSAN</option>
									<option value="NGAMPILAN">NGAMPILAN</option>
									<option value="PAKUALAMAN">PAKUALAMAN</option>
									<option value="TEGALREJO">TEGALREJO</option>
									<option value="UMBULHARJO">UMBULHARJO</option>
									<option value="WIROBRAJAN">WIROBRAJAN</option>
								</select>
								<span id="kelurahan_<?= $no ?>" class="text">Sorosutan</span>
								<select class="editbox" id="kelurahan_input_<?= $no ?>"></select>
							</td>

							<td class="edit_td">
								<span id="first_<?= $no ?>" class="text"></span> <a
									href="https://sipermen.jogjakota.go.id/cetak/update_asset/15/12"
									class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
								<textarea class="editbox" id="first_input_<?= $no ?>"></textarea>
							</td>

						</tr>
						<?php $no++; } }else{
							echo '<p style="margin-left: 10px;">Tidak ada</p>';
							} ?>
					</tbody>
				</table>

				<p>3. Titik lokasi penempatan menara yang <b><u>tidak dapat </u></b> dilanjutkan untuk proses permohonan
					rekomendasi : </p>
					<?php if($persiltolak->num_rows() > 0){ ?>
					<table class="table">
					<thead>
						<tr>
							<td>No.</td>
							<td>Nama Site</td>
							<td>Koordinat Pengajuan</td>
							<td>Koordinat Hasil Survey</td>
							<td>Kec-Kelurahan</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$no=1; foreach ($persiltolak->result() as $pt){ ?>
						<tr id="<?= $no ?>" class="edit_tr">
							<td></td>
							<td><?= $pt->site_id ?></td>
							<td><?= $pt->lat ?>, <?= $pt->lng?></td>

							<td class="edit_td">
								<span id="lat_<?= $no ?>" class="text"><?= $pt->lat_hasil ?></span><input type="text" name="lat" class="editbox"
									id="lat_input_<?= $no ?>" value="0">, <span id="lng_<?= $no ?>" class="text"><?= $pt->lng_hasil ?></span><input
									type="text" name="lat" class="editbox" id="lng_input_<?= $no ?>" value="0">
							</td>

							</td>

							<td class="edit_td">
								<span id="kecamatan_<?= $no ?>" class="text">Umbulraharjo</span> -
								<select class="editbox" id="kecamatan_input_<?= $no ?>" onchange="pilih_kelurahan()">
									<option value="DANUREJAN">DANUREJAN</option>
									<option value="GEDONGTENGEN">GEDONGTENGEN</option>
									<option value="GONDOKUSUMAN">GONDOKUSUMAN</option>
									<option value="GONDOMANAN">GONDOMANAN</option>
									<option value="JETIS">JETIS</option>
									<option value="KOTAGEDE">KOTAGEDE</option>
									<option value="KRATON">KRATON</option>
									<option value="MANTRIJERON">MANTRIJERON</option>
									<option value="MERGANGSAN">MERGANGSAN</option>
									<option value="NGAMPILAN">NGAMPILAN</option>
									<option value="PAKUALAMAN">PAKUALAMAN</option>
									<option value="TEGALREJO">TEGALREJO</option>
									<option value="UMBULHARJO">UMBULHARJO</option>
									<option value="WIROBRAJAN">WIROBRAJAN</option>
								</select>
								<span id="kelurahan_<?= $no ?>" class="text">Sorosutan</span>
								<select class="editbox" id="kelurahan_input_<?= $no ?>"></select>
							</td>

							<td class="edit_td">
								<span id="first_<?= $no ?>" class="text"></span> <a
									href="https://sipermen.jogjakota.go.id/cetak/update_asset/15/12"
									class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
								<textarea class="editbox" id="first_input_<?= $no ?>"></textarea>
							</td>

						</tr>
						<?php $no++; } }else{
							echo '<p style="margin-left: 10px;">Tidak ada</p>';
							} ?>
					</tbody>
				</table>
				<p>4. Berita Acara Peninjauan Titik Lokasi Penempatan Menara Telekomunikasi ini berfungsi sebagai
					laporan hasil peninjauan lapangan atas pengajuan dari pemohon rekomendasi menara telekomunikasi dan
					<b><u>bukan</u></b> merupakan rekomendasi atau ijin pendirian menara telekomunikasi.</p>
				<p>5. Rekomendasi Menara Telekomunikasi akan diterbitkan apabila dokumen persyaratan sudah dinyatakan
					benar dan lengkap.</p></br>
				<p>Demikian Berita Acara ini dibuat sebagai bahan untuk kelengkapan administrasi permohonan rekomendasi
					titik lokasi penempatan menara telekomunikasi dan agar dapat dipergunakan sebagaimana mestinya.</p>

			</div>
			<div id="kiri">
				<center>
					<p>Mengetahui</p>
					<p>Ka. Bidang Persandian dan Telekomunikasi</p>
					<br><br><br><br>
					<p><u>TRI HARYANTO, ST, MT</u></p>
					<p>197307311999031005</p>

				</center>
			</div>
			<div id="kanan">
				<center>
					<p>Yogyakarta, <input type="date" name="tgl_berita" id="tgl_berita" onchange="updatetglberita()"
							value="2021-04-27"></p><br>
					<p>Tim Pengawasan dan Pengendalian Penyelenggaraan</p>
					<p> Komunikasi dan Informatika Kota Yogyakarta Tahun 2019</p><br>
				</center>
				<ol>
					<li>
						<p>Ananto Susetyawan, A. Md</p>
						<p>197904291998121001</p>
						<p>Dinas Komunikasi Informatika & Persandian</p>
					</li>
					<li>
						<p>Laras Prilawati, A.Md</p>
						<p>198104042006042015</p>
						<p>Dinas Penanaman Modal & Perizinan</p>
					</li>
					<li>
						<p>Ir. Ariatmawan Prihandono</p>
						<p>196401221990031006</p>
						<p>DInas Pertanahan & Tata Ruang</p>
					</li>
					<li>
						<p>Edy Suwantara</p>
						<p>196912061993031007</p>
						<p>Dinas Pekerjaan Umum Perumahan & Kawasan Pemukiman</p>
					</li>
					<li>
						<p>Nanang Supriyanta</p>
						<p>197804262009011005</p>
						<p>Satuan Polisi Pamong Praja</p>
					</li>
					<li>
						<p>Turasno</p>
						<p>198410282010011003</p>
						<p>Dinas Komunikasi Informatika & Persandian</p>
					</li>
				</ol>
			</div>

		</div>
	</div>

	<a href="#" onClick="doPrint()" class="btn btn-primary" ><i
			class="fas fa-print"></i></a>

	<a href="https://sipermen.jogjakota.go.id/admin/pengajuan_menara#step-4" class="btn btn-back"><i
			class="fas fa-long-arrow-alt-left"></i> Back</a>
	</div>


</body>
<script type="text/javascript" src="https://sipermen.jogjakota.go.id/assets/admin/view/js/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){

	$(".editbox").hide();
	$(".edit_tr").click(function(){

		var ID=$(this).attr('id');
		function pilih_kelurahan(){
			var kecamatan = $('#kecamatan_input_'+ID).val();
			$.ajax({
        		url: 'https://sipermen.jogjakota.go.id/cetak/pilih_kelurahan',
        		data : 'kecamatan='+kecamatan,
				type: "post",
        		dataType: "html",
				timeout: 10000,
        		success: function(response){
					$('#kelurahan_input_'+ID).html(response);
        		}
    		});
		}
		$("#first_"+ID).hide();
		$("#first_input_"+ID).show();

		$("#lat_"+ID).hide();
		$("#lat_input_"+ID).show();

		$("#lng_"+ID).hide();
		$("#lng_input_"+ID).show();

		$("#kecamatan_"+ID).hide();
		$("#kecamatan_input_"+ID).show();
		$("#kecamatan_input_"+ID).change(function(){
			pilih_kelurahan();
		});

		$("#kelurahan_"+ID).hide();
		$("#kelurahan_input_"+ID).show();
	}).change(function(){
		var ID=$(this).attr('id');
		var first=$("#first_input_"+ID).val();
		var second=$("#lat_input_"+ID).val();
		var third=$("#lng_input_"+ID).val();
		var fourth = $("#kecamatan_input_"+ID).val();
		var five  = $("#kelurahan_input_"+ID).val();
		//var last=$("#last_input_"+ID).val();
		var dataString = 'id='+ ID +'&firstname='+first+'&lat='+second+'&lng='+third+'&kec='+fourth+'&kel='+five;
		//$("#first_"+ID).html('<img src="load.gif" />'); // Loading image
			$.ajax({
			type: "POST",
			url: "https://sipermen.jogjakota.go.id/cetak/update_alasan",
			data: dataString,
			cache: false,
			success: function(html){
				$("#first_"+ID).html(first);
				$("#lat_"+ID).html(second);
				$("#lng_"+ID).html(third);
				$("#kecamatan_"+ID).html(fourth);
				$("#kelurahan_"+ID).html(five);
				//$("#last_"+ID).html(last);
			}
			});
	});
	

// Edit input box click action
	$(".editbox").mouseup(function(){
		return false
	});

// Outside click action
	$(document).mouseup(function(){
		$(".editbox").hide();
		$(".text").show();
	});

	$()
	});

function isi_otomatis(){
  var kode_brg = $("#nip").val();
  var id_form = $("#form").val();
  //document.write(kode_brg);
  console.log(id_form);
    $.ajax({
    url: "https://sipermen.jogjakota.go.id/cetak/update",
    data:"kode_brg="+kode_brg+'&id_form='+id_form
    })
    .success(function (data) {
    	window.location.reload(true);
    });
}

function isi_otomatis2(){
  var kode_brg = $("#id_tempat").val();
  //document.write(kode_brg);
  console.log(kode_brg);
    $.ajax({
    url: 'https://sipermen.jogjakota.go.id/cetak/persil_warga',
    data:"kode_brg="+kode_brg ,
    })
    .success(function (data) {
   	window.location.reload(true);
    });
}
function isi_otomatis3(){
  var kode_brg = $("#id_tempat1").val();
  //document.write(kode_brg);
    $.ajax({
    url: 'cetak/revisi',
    data:"kode_brg="+kode_brg ,
    })
    .success(function (data) {
    	window.location.reload(true);
    });
}

function updatetglberita(){
	var kode_brg = $("#tgl_berita").val();
			var id_form = $("#form").val();
			var kolom = "tgl_berita";
  			//document.write(kode_brg);
    		$.ajax({
    			url: 'https://sipermen.jogjakota.go.id/cetak/update_nomor',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#tgl_berita").html(kode_brg);
   			});

}

function update_nomor(){
	var kode_brg = $("#nomorberita").val();
			var id_form = $("#form").val();
			var kolom = "no_berita_acara";
			  //document.write(kode_brg);
			  console.log(kode_brg);
			  console.log(id_form);
			  console.log(kolom);
    		$.ajax({
    			url: 'https://sipermen.jogjakota.go.id/cetak/update_nomor',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#nomorberita").html(kode_brg);
   			});

}
function doPrint() {
    window.print();            
    document.location.href = "<?= base_url() ?>auth/aksiprint/<?= $page ?>"; 
}

function updatethn(){
	var kode_brg = $("#tahun").val();
			var id_form = $("#form").val();
			var kolom = "tahun";
  			//document.write(kode_brg);
			  console.log(kode_brg);
			  console.log(id_form);
			  console.log(kolom);
    		$.ajax({
    			url: 'https://sipermen.jogjakota.go.id/cetak/update_berita',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#tahun").html(kode_brg);
   			});

}
function updatetgl(){
	var kode_brg = $("#tgl").val();
			var id_form = $("#form").val();
			var kolom = "tgl_survey";
  			//document.write(kode_brg);
			  console.log(kode_brg);
			  console.log(id_form);
			  console.log(kolom);
    		$.ajax({
    			url: 'https://sipermen.jogjakota.go.id/cetak/update_berita',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#tgl").html(kode_brg);
   			});

}
</script>
</html>
