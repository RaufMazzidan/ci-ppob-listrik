<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Level</h3>
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
				<form action="<?=base_url()?>level/create" method="POST">
					<input type="text" class="form-control" placeholder="Jabatan" name="level" required>
					<br>
					<input type="submit" class="btn btn-primary pull-right" value="Submit">
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Level</h3>
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
							<th>Jabatan</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$c->level?></td>
								<td class="text-center"><a href="#edit" class="btn btn-primary" onclick="edit(<?=$c->id_level?>)" data-toggle="modal"><i class="lnr lnr-magic-wand"></i></a>&nbsp;<a href="<?=base_url()?>level/delete/<?=$c->id_level?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a></td>
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
				<h4 class="modal-title">Edit Level</h4>
			</div>
			<form action="<?=base_url('level/edit')?>" method="post">
				<div class="modal-body">

					<input type="hidden" name="u_id_level" id="id_level">
					<input type="text" id="level" name="u_level" class="form-control" required>
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
			url:"<?=base_url()?>level/get_data/"+a,
			dataType:"json",
			success:function(data) {
				$("#id_level").val(data.id_level);
				$("#level").val(data.level);
			}

		});
	}
</script>