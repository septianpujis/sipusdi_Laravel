@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Detail User "{{$trans->id_trans}}"</h5>
				<hr />
        <a href="/trans/sunting/{{$trans->id_user}}" class="btn btn-success">Sunting</a><br><br>
       	<div class="row">
          <div class="col-md-12">
            <strong>Id Transaksi : </strong><span>{{$trans->id_trans}}</span><br><br>
            <strong>Tanggal Pinjam : </strong><span>{{$trans->waktu_pinjam}}</span><br><br>
            <strong>Tanggal Ambil buku : </strong><span>{{$trans->waktu_ambil}}</span><br><br>
            <strong>Tanggal Kembali : </strong><span>{{$trans->waktu_kembali}}</span><br><br>
            <strong>Peminjam : </strong><span><a href="/user/detail/{{$trans->id_user}}">{{$trans->nama}}</a></span><br><br>
            <strong>Buku yang dipinjam : </strong><span><a href="/buku/detail/{{$trans->id_buku}}">{{$trans->judul}}</a></span><br><br>
            <strong>Status Transaksi : </strong><span>{{$trans->nama_status}}</span><br><br>
          </div>
        </div>
			</div>
		</div><hr />
	</div>
</div>
@endsection
