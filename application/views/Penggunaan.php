<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Pelanggan</h3>
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
							<th>Nama</th>
							<th>No Meter</th>
							<th>Daya</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$c->nama?></td>
								<td><?=$c->no_meter?></td>
								<td><?=$c->daya?></td>
								<td class="text-center">
									<a href="#add_penggunaan" data-toggle="modal" onclick="add_penggunaan(<?=$c->id_pelanggan?>)" class="btn btn-success btn-sm">Add Penggunaan</a>
									&nbsp;
									<a href="<?=base_url()?>penggunaan/detail/<?=$c->id_pelanggan?>" class="btn btn-primary btn-sm" target="_blank">Detail Penggunaan</a>
									&nbsp;
									<a href="<?=base_url()?>penggunaan/tagihan/<?=$c->id_pelanggan?>" class="btn btn-warning btn-sm">Detail Tagihan</a>
								</td>
								<!-- <td class="text-center"> -->
									<!-- <a href="#edit" class="btn btn-primary" onclick="edit(<?=$c->id_pelanggan?>)" data-toggle="modal"><i class="lnr lnr-magic-wand"></i></a>&nbsp;<a href="<?=base_url()?>pelanggan/delete/<?=$c->id_pelanggan?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a> -->
									<!-- </td> -->
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add_penggunaan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Add Penggunaan</h4>
				</div>
				<form action="<?=base_url('penggunaan/create')?>" method="post">
					<div class="modal-body">

						<input type="hidden" name="u_id_pelanggan" id="id_pelanggan">
						<input type="text" id="disabledTextInput" name="u_nama" class="form-control" disabled="">
						<br>
						<?php $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						?>
						<select name="u_bulan" class="form-control" required="">
							<option></option>
							<?php foreach ($bulan as $a => $b): ?>
								<option value="<?=$a?>"><?=$b?></option>
							<?php endforeach ?>
						</select>
						<br>
						<select name="u_tahun" class="form-control" required="">
							<option></option>
							<?php for ($i=2015; $i <= 2020 ; $i++) { ?>
							<option value="<?=$i?>"><?=$i?></option>
							<?php } ?>

						</select>
						<br>
						<input type="text" id="meterawal" class="form-control" placeholder="Meter Awal" name="u_metera" required>
						<br>
						<input type="text" id="meterakhir" class="form-control" placeholder="Meter Akhir" name="u_meterb" required>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" name="create" class="btn btn-primary" value="Submit">
					</div>
				</form>
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