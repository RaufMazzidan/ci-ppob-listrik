<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Tagihan</h3>
				<div class="right">
					<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<?php 
				if ($this->session->userdata('pesan') !== NULL) {
					?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-success"></i> <?=$this->session->userdata('pesan')?>
					</div>
					<?php
				}
				elseif($this->session->userdata('warn') !== NULL){
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
							<th>Bulan</th>
							<th>Tahun</th>
							<th>Total Penggunaan</th>
							<th>Bukti</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						foreach ($content as $c) {
							$pembayaran = $this->m_penggunaan->cek_pembayaran($c->id_tagihan);
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$bulan[$c->bulan - 1]?></td>
								<td><?=$c->tahun?></td>
								<!-- <td><?=$pembayaran->id_tagihan?></td> -->
								<td><?php echo $c->meter_akhir-$c->meter_awal;?></td>
								<td>
									<?php
									if ($c->status == 3) {
									?>
									<a href="#upload" onclick="get(<?=$c->id_tagihan?>)" style="width: 65px;" class="btn btn-warning btn-xs" data-toggle="modal">Upload</a>
									<?php
									}else 
									if ($c->status == 2) {
									?>
									<a href="#show" style="width: 65px;" onclick="bukti('<?=$pembayaran->bukti?>')" class="btn btn-success btn-xs" data-toggle="modal">Show</a>
									<?php
									}else 
									if ($c->status == 1) {
									?>
									<a href="#show" style="width: 65px;" onclick="bukti('<?=$pembayaran->bukti?>')" class="btn btn-success btn-xs" data-toggle="modal">Show</a>
									<?php
									}elseif($c->status == 0){
									?>
									<a href="#upload" onclick="get(<?=$c->id_tagihan?>)" style="width: 65px;" class="btn btn-warning btn-xs" data-toggle="modal">Upload</a>
									<?php
									}
									 ?>
								</td>
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

<div class="modal fade" id="upload">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Tambahkan Bukti</h4>
			</div>
			<form action="<?=base_url('pembayaran/upload')?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id_tagihan" id="id_tagihan">
					<input type="file" name="bukti">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" name="update" class="btn btn-primary" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function get(a) {
		$("#id_tagihan").val(a);
	}
</script>
<script type="text/javascript">
	function bukti(z) {
		var img = "<img src='http://localhost/ukk_ppob/assets/img/bukti/"+z+"' style='width:100%'>"
		$('#bukti').replaceWith(img);
		// console.log(img);
	}
</script>