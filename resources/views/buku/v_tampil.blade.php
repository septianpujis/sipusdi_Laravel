@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>nanti tabel buku disini (tampilBuku)</h5>
				<ul>
					<li><a href="/buku/tambah">TAMBAH</a></li>
					<li><a href="/buku/sunting/1">SUNTING data 1</a></li>
					<li><a href="/buku/detail/2">DETAIL data 2</a></li>
					<li><a href="/buku/hapus/2">HAPUS data 2</a></li>
				</ul>
			</div>
		</div><hr />
	</div>
</div>
@endsection