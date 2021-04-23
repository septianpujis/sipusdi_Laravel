@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Detail User "{{$user->nama}}"</h5>
				<hr />
            	<a href="/user/sunting/{{$user->id_user}}" class="btn btn-success">Sunting</a><br><br>

	         	<div class="row">
                <div class="col-sm-7">
                  <strong>Nama :</strong><br><span>{{$user->nama}}</span><br>
                  <strong>Nomor Anggota :</strong><br><span>{{$user->nomor_induk}}</span><br>
                  <strong>Status :</strong><br><span>@if ($user->level==1)
                                                      Pegawai
                                                    @else
                                                      Pembaca
                                                    @endif</span><br>
                  <strong>Email :</strong><br><span>{{$user->email}}</span><br>
                  <strong>Kelas :</strong><br><span>{{$user->nama_kelas}}</span><br>
                  <strong>Nomor Telepon :</strong><br><span>{{$user->no_telp}}</span><br>
                </div>
                <div class="col-md-5">
                  <p align="center">
                    <img src="{{url('images/'.$user->foto)}}" alt="Foto tidak ditemukan" width="260" height="360">
                  </p>
                </div>
              </div>
			</div>
		</div><hr />
     <div class="table-responsive">
        <h5>Tabel Riwayat Transaksi Peminjaman "{{$user->nama}}"</h5>
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Waktu Pinjam</th>
              <th>Peminjam</th>
              <th>Buku</th>
              <th>Status</th>
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
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
	</div>
</div>
@endsection
