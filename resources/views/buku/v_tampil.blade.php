@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Temukan Bukumu dihalaman ini</h5>
				<hr />

				@if (session('pesan'))
					 <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session('pesan')}}
                    </div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="/buku/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Judul</th>
										<th>Penulis</th>
										<th>Tahun</th>
										<th>Ketersediaan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($buku as $data)
									<tr>
										<td class="sorting_1">{{$data->id_buku}}</td>
			                            <td class=" "><a href="/buku/detail/{{$data->id_buku}}">{{$data->judul}}</a></td>
			                            <td class=" ">{{$data->penulis}}</td>
			                            <td class="center ">{{$data->tahun}}</td>
			                            <td class="center ">{{$data->sedia}}</td>
			                            <td align="center">
			                            	<button type="button" data-toggle="modal" data-target="#detail-{{$data->id_buku}}" class="btn btn-primary">Detail</button><br>
			                            	<a href="/buku/sunting/{{$data->id_buku}}" class="btn btn-success">Sunting</a><br>
                  							<button type="button" data-toggle="modal" data-target="#hapus-{{$data->id_buku}}" class="btn btn-danger">Hapus</button>
                  
								            <!-- Modal Hapus -->
			                            	<div id="hapus-{{$data->id_buku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
								                <div role="document" class="modal-dialog">
								                  <div class="modal-content">
								                    <div class="modal-header">
								                      <h5 id="exampleModalLabel" class="modal-title">Hapus Data Buku {{$data->judul}}?</h5>
								                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								                    </div>
								                    <div class="modal-body">
								                      <p>Kamu yakin ingin menghapus data ini?</p>
								                    </div>
								                    <div class="modal-footer">
								                      <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
								                      <a type="button" class="btn btn-danger" href="/buku/hapus/{{$data->id_buku}}">Hapus data</a>
								                    </div>
								                  </div>
								                </div>
								              </div>
								              <!-- Modal lihat -->
								              <div id="detail-{{$data->id_buku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
								                <div role="document" class="modal-dialog modal-lg">
								                  <div class="modal-content">
								                    <div class="modal-header">
								                      <h5 id="exampleModalLabel" class="modal-title">Data Buku</h5>
								                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								                    </div>
								                    <div class="modal-body">
								                      <div class="row">
										                <div class="col-sm-7">
										                  <strong>Judul :</strong><br><span>{{$data->judul}}</span><br>
										                  <strong>Penulis :</strong><br><span>{{$data->penulis}}</span><br>
										                  <strong>Penerbit :</strong><br><span>{{$data->penerbit}}</span><br>
										                  <strong>Tahun Terbit :</strong><br><span>{{$data->tahun}}</span><br>
										                  <strong>Genre :</strong><br><span>{{$data->genre}}</span><br>
										                  <strong>Sinopsis :</strong><br><span>{{$data->sinopsis}}</span><br>
										                </div>
										                <div class="col-md-5">
										                  <p align="center">
										                    <img src="{{url('images/'.$data->sampul)}}" alt="Gambar Cover tidak ditemukan" width="260" height="360">
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