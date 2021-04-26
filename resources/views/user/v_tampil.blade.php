@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Temukan Akun di halaman ini</h5>
				<hr />
				@if (session('pesan'))
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						{{session('pesan')}}
					</div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
						<form action="/user" method="GET">
							@csrf
							<div class="form-group input-group">
                <input type="text" class="form-control" placeholder="Nama Pengguna" name="search">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari Pengguna</button>
                </span>
            	</div>
						</form>
					@if (session('level')==1)
						<a href="/user/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>				
					@endif
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>NA</th>
										<th>nama</th>
										<th>Status</th>
										<th>email</th>
										<th>Kelas</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user as $data)
									<tr>
										<td class="sorting_1">{{$data->nomor_induk}}</td>
										<td width="30%"><a href="/user/detail/{{$data->id_user}}">{{$data->nama}}</a></td>
										<td class=" ">
											@if ($data->level==1)
												Pegawai
											@else
												Pembaca
											@endif
										</td>
										<td class="center ">{{$data->email}}</td>
										<td class="center ">{{$data->nama_kelas}}</td>
										<td align="center" width="15%">
											<button type="button" data-toggle="modal" data-target="#detail-{{$data->id_user}}" class="btn btn-primary"><i class="fa fa-info"></i></button>
											<a href="/user/sunting/{{$data->id_user}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
											<button type="button" data-toggle="modal" data-target="#hapus-{{$data->id_user}}" class="btn btn-danger"><i class="fa fa-trash"></i></button>

											<!-- Modal Hapus -->
											<div id="hapus-{{$data->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
												<div role="document" class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 id="exampleModalLabel" class="modal-title">Hapus Data Pengguna "{{$data->nama}}"?</h5>
															<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
														</div>
														<div class="modal-body">
															<p>Kamu yakin ingin menghapus data ini?</p>
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
															<a type="button" class="btn btn-danger" href="/user/hapus/{{$data->id_user}}">Hapus data</a>
														</div>
													</div>
												</div>
											</div>
											  
											<!-- Modal lihat -->
											<div id="detail-{{$data->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
												<div role="document" class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 id="exampleModalLabel" class="modal-title">Data Pengguna</h5>
															<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-sm-7">
																	<strong>Nama :</strong><br><span>{{$data->nama}}</span><br>
																	<strong>Nomor Anggota :</strong><br><span>{{$data->nomor_induk}}</span><br>
																	<strong>Status :</strong><br><span>	@if ($data->level==1)
																																				Pegawai
																																			@else
																																				Pembaca
																																			@endif</span><br>
																	<strong>Email :</strong><br><span>{{$data->email}}</span><br>
																	<strong>Kelas :</strong><br><span>{{$data->nama_kelas}}</span><br>
																	<strong>Nomor Telepon :</strong><br><span>{{$data->no_telp}}</span><br>
													 			</div>
																<div class="col-md-5">
																	<p align="center">
													  				<img src="{{url('images/'.$data->foto)}}" alt="Foto tidak ditemukan" width="260" height="360">
																	</p>
													 			</div>
													  	</div>
											  		</div>
													</div>
											 	</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection