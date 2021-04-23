@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Tabel data peminjaman buku.</h5>
				<hr />

				@if (session('pesan'))
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						{{session('pesan')}}
					</div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="/trans/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Waktu Pinjam</th>
										<th>Peminjam</th>
										<th>Buku</th>
										<th>Status</th>
										@if (session('level')==1)
										<th>Aksi</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach ($trans as $data)
									<tr>
										<td class="sorting_1"><a href="/trans/detail/{{$data->id_trans}}">{{$data->id_trans}}</a></td>
										<td class=" ">{{$data->waktu_pinjam}}</td>
                    <td class=" "><a href="/user/detail/{{$data->id_user}}">{{$data->nama}}</a></td>
                    <td class="center "><a href="/buku/detail/{{$data->id_buku}}">{{$data->judul}}</td>
                    <td class="center ">{{$data->nama_status}}</td>
                    @if (session('level')==1)
                    <td align="center" width="15%">
	                    <button type="button" data-toggle="modal" data-target="#detail-{{$data->id_trans}}" class="btn btn-primary"><i class="fa fa-info"></i></button>
	                    
	                    <a href="/trans/sunting/{{$data->id_trans}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
	      							<button type="button" data-toggle="modal" data-target="#hapus-{{$data->id_trans}}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
	      							
	      							<!-- Modal Hapus -->
	      							<div id="hapus-{{$data->id_trans}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
	      								<div role="document" class="modal-dialog">
	      									<div class="modal-content">
	      										<div class="modal-header">
	      											<h5 id="exampleModalLabel" class="modal-title">Hapus Data Transaksi?</h5>
	      											<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		                    		</div>
		                    		<div class="modal-body">
		                      		<p>Kamu yakin ingin menghapus data ini?</p>
		                    		</div>
		                    		<div class="modal-footer">
		                      		<button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
		                      		<a type="button" class="btn btn-danger" href="/trans/hapus/{{$data->id_trans}}">Hapus data</a>
		                    		</div>
		                  		</div>
		                		</div>
		              		</div>

		              		<!-- Modal lihat -->
				              <div id="detail-{{$data->id_trans}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
				                <div role="document" class="modal-dialog modal-lg">
				                  <div class="modal-content">
				                    <div class="modal-header">
				                      <h5 id="exampleModalLabel" class="modal-title">Data Pengguna</h5>
				                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
				                    </div>
				                    <div class="modal-body">
						                  <strong>Id Transaksi : </strong><span>{{$data->id_trans}}</span><br><br>
						                  <strong>Tanggal Pinjam : </strong><span>{{$data->waktu_pinjam}}</span><br><br>
						                  <strong>Tanggal Ambil buku : </strong><span>{{$data->waktu_ambil}}</span><br><br>
						                  <strong>Tanggal Kembali : </strong><span>{{$data->waktu_kembali}}</span><br><br>
						                  <strong>Peminjam : </strong><span>{{$data->nama}}</span><br><br>
						                  <strong>No. Telp : </strong><span>{{$data->no_telp}}</span><br><br>
						                  <strong>Buku yang dipinjam : </strong><span>{{$data->judul}}</span><br><br>
						                  <strong>Penulis buku : </strong><span>{{$data->penulis}}</span><br><br>
						                  <strong>Status Transaksi : </strong><span>{{$data->nama_status}}</span><br><br>
						                </div>
						              </div>
				                </div>
				              </div>
				            </td>
				            @endif
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