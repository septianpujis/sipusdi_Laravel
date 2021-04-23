@extends('layout.v_template')

@section('title', 'Home')
@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Home</h2>
				<h5>Selamat Datang {{session('nama')}}</h5>
				<hr />
				
				<div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-user-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">{{$user}}</p>
                    <p class="text-muted">Pengguna</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-book"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">{{$buku}}</p>
                    <p class="text-muted">Buku</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-file-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">{{$trans}}</p>
                    <p class="text-muted">Peminjaman</p>
                </div>
             </div>
		     </div>
                    
			</div>

			</div>
		</div><hr />
	</div>
</div>
@endsection