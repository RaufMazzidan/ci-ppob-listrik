<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Penggunaan</h3>
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
						<i class="fa fa-success"></i> <?=$this->session->userdata('pesan_del')?>
					</div>
					<?php
				}
				elseif($this->session->userdata('warn_del') !== NULL){
					?>
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-warning"></i> <?=$this->session->userdata('warn_del')?>
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
							<th>Meter Awal</th>
							<th>Meter Akhir</th>
							<th>Total Penggunaan</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						$i = 0;
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$bulan[$c->bulan - 1]?></td>
								<td><?=$c->tahun?></td>
								<td><?=$c->meter_awal?></td>
								<td><?=$c->meter_akhir?></td>
								<td><?php echo $c->meter_akhir-$c->meter_awal;?></td>
								<td class="text-center"><a href="<?=base_url()?>penggunaan/delete/<?=$c->id_penggunaan?>/<?=$c->id_pelanggan?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>