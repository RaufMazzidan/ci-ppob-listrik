<div class="row">
	<div class="col-md-5">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Admin</h3>
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
				<form action="<?=base_url()?>admin/create" method="POST">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
					<br>
					<input type="text" class="form-control" placeholder="Username" name="username" required>
					<br>
					<input type="password" class="form-control" placeholder="Password" name="password" required>
					<br>
					<select name="level" class="form-control required">
						<option></option>
						<?php foreach ($level as $l): ?>
						<option value="<?=$l->id_level?>"><?=$l->level?></option>	
						<?php endforeach ?>
						
					</select>
					<br>
					<input type="submit" class="btn btn-primary pull-right" value="Submit">
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Admin</h3>
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
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($content as $c) {
							$i++ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$c->nama_admin?></td>
								<td><?=$c->username?></td>
								<td><?=$c->password?></td>
								<td><?=$c->level?></td>
								<td><a href="#edit" class="btn btn-primary" onclick="edit(<?=$c->id_admin?>)" data-toggle="modal"><i class="lnr lnr-magic-wand"></i></a>
									&nbsp;
								<a href="<?=base_url()?>admin/delete/<?=$c->id_admin?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a></td>
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
				<h4 class="modal-title">Edit Admin</h4>
			</div>
			<form action="<?=base_url('admin/edit')?>" method="post">
				<div class="modal-body">

					<input type="hidden" name="u_id_admin" id="id_admin">
					<input type="text" id="nama" class="form-control" name="u_nama" required>
					<br>
					<input type="text" id="username" class="form-control" name="u_username" required>
					<br>
					<input type="password" id="password" class="form-control" name="u_password" required>
					<br>
					<select name="u_level" class="form-control required" id="level">
						<option></option>
						<?php foreach ($level as $l): ?>
						<option value="<?=$l->id_level?>"><?=$l->level?></option>	
						<?php endforeach ?>
						
					</select>
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
			url:"<?=base_url()?>admin/get_data/"+a,
			dataType:"json",
			success:function(data) {
				$("#id_admin").val(data.id_admin);
				$("#nama").val(data.nama_admin);
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#level").val(data.id_level);
			}

		});
	}
</script>