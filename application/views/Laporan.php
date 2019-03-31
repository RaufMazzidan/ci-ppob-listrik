<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Laporan PPOB <?php echo date('d F Y')?></h3>
				<div class="right">
					<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<?php 
				if ($this->session->userdata('pesan_del') !== NULL) {
					?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-success"></i> <?=$this->session->userdata('pesan')?>
					</div>
					<?php
				}
				elseif($this->session->userdata('warn_del') !== NULL){
					?>
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-warning"></i> <?=$this->session->userdata('warn')?>
					</div>
					<?php
				}
				else{

				} ?>
				<table class="table">
					<thead>
						<tr> 
							<th>#</th>
							<th>Nama</th>
							<th>No Meter</th>
							<th>Daya</th>
							<th>Tanggal</th>
							<th>Bulan</th>
							<th>Biaya Admin</th>
							<th>Total Bayar</th>
							<th>Status</th>
							<th>Bukti</th>
							<th>Admin</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$c->nama?></td>
								<td><?=$c->no_meter?></td>
								<td><?=$c->daya?></td>
								<td><?=$c->tanggal?></td>
								<td><?=$bulan[$c->bulan-1]?>(<?=$c->tahun?>)</td>
								<td>2000</td>
								<td><?=$c->total_bayar?></td>
								<td><?php 
								if ($c->status == 3) {
									?>
									<span class="label label-danger align-middle" style="font-size: 14px;">Rejected</span>
									<?php
								}elseif ($c->status == 2) {
									?>
									<span class="label label-warning align-middle" style="font-size: 14px;">Pending</span>
									<?php
								}elseif ($c->status == 1) {
									?>
									<span class="label label-success align-middle" style="font-size: 14px;">Lunas</span>
									<?php
								}elseif($c->status == 0){
									?>
									<span class="label label-danger" style="font-size: 14px;">Belum Lunas</span>
									<?php
								}
								?></td>
								<td><img src='http://localhost/ukk_ppob/assets/img/bukti/<?=$c->bukti?>' style='width:100px;'></td>
								<td><?=$c->nama_admin?></td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="show">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Show</h4>
			</div>
			<div class="modal-body">
				<span id="bukti"></span>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function add_penggunaan(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>pelanggan/get_data/"+a,
			dataType:"json",
			success:function(data) {
				$("#id_pelanggan").val(data.id_pelanggan);
				$("#disabledTextInput").val(data.nama);
			}

		});
	}
</script>

<script type="text/javascript">
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>pelanggan/get_data/"+a,
			dataType:"json",
			success:function(data) {
				$("#id_pelanggan").val(data.id_pelanggan);
				$("#nama").val(data.nama);
				$("#alamat").val(data.alamat);
				$("#meter").val(data.no_meter);
				$("#email").val(data.email);
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#tarif").val(data.id_tarif);
			}

		});
	}
</script>
<script type="text/javascript">
	function bukti(z) {
		var img = "<img src='http://localhost/ukk_ppob/assets/img/bukti/"+z+"' style='width:100%'>"
		$('#bukti').replaceWith(img);
		// console.log(img);
	}
</script>
<script type="text/javascript">
	function download() {
		window.print();
	}
</script>