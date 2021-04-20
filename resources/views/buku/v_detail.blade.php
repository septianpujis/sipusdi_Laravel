@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Detail Buku "{{$buku->judul}}"</h5>
				<hr />
            	<a href="/buku/sunting/{{$buku->id_buku}}" class="btn btn-success">Sunting</a><br><br>

				<div class="row">
	                <div class="col-sm-7">
	                  <strong>Judul :</strong><br><span>{{$buku->judul}}</span><br>
	                  <strong>Penulis :</strong><br><span>{{$buku->penulis}}</span><br>
	                  <strong>Penerbit :</strong><br><span>{{$buku->penerbit}}</span><br>
	                  <strong>Tahun Terbit :</strong><br><span>{{$buku->tahun}}</span><br>
	                  <strong>Genre :</strong><br><span>{{$buku->genre}}</span><br>
	                  <strong>Sinopsis :</strong><br><span>{{$buku->sinopsis}}</span><br>
	                </div>
	                <div class="col-md-5">
	                  <p align="center">
	                    <img src="{{url('images/'.$buku->sampul)}}" alt="Gambar Cover tidak ditemukan" width="260" height="360">
	                  </p>
	                </div>
	            </div>
			</div>
		</div><hr />
	</div>
</div>
@endsection
