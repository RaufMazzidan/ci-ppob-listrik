<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Pelanggan</h3>
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
				<form action="<?=base_url()?>pelanggan/create" method="POST">

					<div class="row">
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Nomor Meter" name="meter" required>
							<br>
							<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
							<br>
							<input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
							<br>
							<input type="email" class="form-control" placeholder="Email" name="email" required>
							<br>	
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Username" name="username" required>
							<br>
							<input type="password" class="form-control" placeholder="Password" name="password" required>
							<br>
							<select name="tarif" class="form-control required">
								<option></option>
								<?php foreach ($tarif as $l): ?>
									<option value="<?=$l->id_tarif?>"><?=$l->daya?></option>	
								<?php endforeach ?>

							</select>
							<br>
							<input type="submit" class="btn btn-primary pull-right" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
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
							<th>No Meter</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Username</th>
							<th>Password</th>
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
								<td><?=$c->alamat?></td>
								<td><?=$c->email?></td>
								<td><?=$c->username?></td>
								<td><?=$c->password?></td>
								<td><?=$c->daya?></td>
								<td class="text-center"><a href="#edit" class="btn btn-primary" onclick="edit(<?=$c->id_pelanggan?>)" data-toggle="modal"><i class="lnr lnr-magic-wand"></i></a>&nbsp;<a href="<?=base_url()?>pelanggan/delete/<?=$c->id_pelanggan?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a></td>
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
				<h4 class="modal-title">Edit Pelanggan</h4>
			</div>
			<form action="<?=base_url('pelanggan/edit')?>" method="post">
				<div class="modal-body">

					<input type="hidden" name="u_id_pelanggan" id="id_pelanggan">
					<div class="row">
						<div class="col-md-6">
							<input type="text" id="meter" class="form-control" placeholder="Nomor Meter" name="u_meter" required>
							<br>
							<input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="u_nama" required>
							<br>
							<input type="text" id="alamat" class="form-control" placeholder="Alamat" name="u_alamat" required>
							<br>
							<input type="email" id="email" class="form-control" placeholder="Email" name="u_email" required>
							<br>	
						</div>
						<div class="col-md-6">
							<input type="text" id="username" class="form-control" placeholder="Username" name="u_username" required>
							<br>
							<input type="password" id="password" class="form-control" placeholder="Password" name="u_password" required>
							<br>
							<select name="u_tarif" id="tarif" class="form-control required">
								<option></option>
								<?php foreach ($tarif as $l): ?>
									<option value="<?=$l->id_tarif?>"><?=$l->daya?></option>	
								<?php endforeach ?>
								
							</select>
							<br>
						</div>
					</div>
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