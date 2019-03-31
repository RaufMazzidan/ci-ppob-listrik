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
							<th>Total Penggunaan</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$bulan[$c->bulan - 1]?></td>
								<td><?=$c->tahun?></td>
								<td><?php echo $c->meter_akhir-$c->meter_awal;?></td>
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