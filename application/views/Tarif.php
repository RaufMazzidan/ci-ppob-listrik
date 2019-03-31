<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Tarif</h3>
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
				<form action="<?=base_url()?>tarif/create" method="POST">
					<input type="text" class="form-control" placeholder="Daya" name="daya" required>
					<br>
					<input type="text" class="form-control" placeholder="Harga Per-KWH" name="kwh" required>
					<br>
					<input type="submit" class="btn btn-primary pull-right" value="Submit">
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Tarif</h3>
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
							<th>Daya</th>
							<th>Harga Per-KWH</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$c->daya?></td>
								<td>Rp. <?= number_format($c->tarifperkwh)?></td>
								<td class="text-center"><a href="#edit" class="btn btn-primary" onclick="edit(<?=$c->id_tarif?>)" data-toggle="modal"><i class="lnr lnr-magic-wand"></i></a>&nbsp;<a href="<?=base_url()?>tarif/delete/<?=$c->id_tarif?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Edit Tarif</h4>
			</div>
			<form action="<?=base_url('tarif/edit')?>" method="post">
				<div class="modal-body">

					<input type="hidden" name="u_id_tarif" id="id_tarif">
					<input type="text" id="daya" name="u_daya" class="form-control" required>
					<br>
					<input type="text" id="kwh" name="u_kwh" class="form-control" required>
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
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>tarif/get_data/"+a,
			dataType:"json",
			success:function(data) {
				$("#id_tarif").val(data.id_tarif);
				$("#daya").val(data.daya);
				$("#kwh").val(data.tarifperkwh);
			}

		});
	}
</script>