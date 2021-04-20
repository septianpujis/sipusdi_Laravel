@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Detail User "{{$trans->id_trans}}"</h5>
				<hr />
        <a href="/user/sunting/{{$trans->id_user}}" class="btn btn-success">Sunting</a><br><br>
       	<div class="row">
          <div class="col-sm-7">
            <strong>Id Transaksi : </strong><span>{{$trans->id_trans}}</span><br><br>
            <strong>Tanggal Pinjam : </strong><span>{{$trans->waktu_pinjam}}</span><br><br>
            <strong>Tanggal Ambil buku : </strong><span>{{$trans->waktu_ambil}}</span><br><br>
            <strong>Tanggal Kembali : </strong><span>{{$trans->waktu_kembali}}</span><br><br>
            <strong>Peminjam : </strong><span>{{$trans->id_user}}</span><br><br>
            <strong>Buku yang dipinjam : </strong><span>{{$trans->id_buku}}</span><br><br>
            <strong>Status Transaksi : </strong><span>{{$trans->id_status}}</span><br><br>
          </div>
        </div>
			</div>
		</div><hr />
	</div>
</div>
@endsection
