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
                  <strong>Status :</strong><br><span>{{$user->level}}</span><br>
                  <strong>Email :</strong><br><span>{{$user->email}}</span><br>
                  <strong>Kelas :</strong><br><span>{{$user->id_kelas}}</span><br>
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
	</div>
</div>
@endsection
