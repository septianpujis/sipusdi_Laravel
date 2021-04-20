@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Isi data dengan teliti.</h5>
				<hr />
				<form method="post" action="/user/form_val/{{$user->id_user}}" enctype="multipart/form-data">
         	@csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nomor Anggota</label>
                <div class="col-sm-9">
                  <input type="text" name="nomor" class="form-control" placeholder="NIS untuk Siswa, NIP untuk Pegawai" required value="{{$user->nomor_induk}}">
                  <div class="text-danger">
	                	@error('nomor')
	                		{{$message}}
	                	@enderror
                	</div>
                </div>
              </div>
	            <div class="form-group row">
	              <label class="col-sm-3 form-control-label">Nama</label>
	              <div class="col-sm-9">
	                <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" required value="{{$user->nama}}">
	                <div class="text-danger">
		              	@error('nama')
		              		{{$message}}
		              	@enderror
	              	</div>
	              </div>
	            </div>
	            <div class="form-group row">
	              <label class="col-sm-3 form-control-label">Level Akun</label>
	              <div class="col-sm-9">
	                <div>
	                  <input id="optionsRadios1" type="radio" value="1" name="level" @if ($user->level ==1) checked @endif>
	                  <label for="optionsRadios1">Pegawai</label>
	                </div>
	                <div>
	                  <input id="optionsRadios2" type="radio" value="2" name="level" @if ($user->level ==2) checked @endif>
	                  <label for="optionsRadios2">Pembaca</label>
	                </div>
	              </div>
	            </div>
	            <div class="form-group row">
	              <label class="col-sm-3 form-control-label">Kode Kelas</label>
	              <div class="col-sm-9 select">
	                <select name="id_kelas" class="form-control">
	                	<option value="">Pilih Kelas</option>
	                	@foreach ($kelas as $data)
	                		<option value="{{$data->id_kelas}}" @if ($user->id_kelas==$data->id_kelas) selected @endif>{{$data->nama_kelas}}</option>
	                	@endforeach
	                </select>
	                <div class="text-danger">
		              	@error('id_kelas')
		              		{{$message}}
		              	@enderror
	              	</div>
	              </div>
	            </div>
	            <div class="form-group row">
	              <label class="col-sm-3 form-control-label">Nomor Telepon</label>
	              <div class="col-sm-9">
	                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon/Handphone yang bisa dihubungi" value="{{$user->no_telp}}">
	                <div class="text-danger">
	                	@error('no_telp')
	                		{{$message}}
	                	@enderror
	                </div>
	              </div>
	            </div>
	            <div class="form-group row">
	              <label class="col-sm-3 form-control-label">Login Data</label>
	              <div class="col-sm-9">
	                <div class="form-group">
	                	<label>Email</label>
	                  <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
		               	<div class="text-danger">
	                  	@error('email')
	                  	{{$message}}
	                  	@enderror
	                  </div>
	                </div>
	                <div class="form-group">
	                	<label>Password</label>
	                  <input type="password" name="password" class="form-control" placeholder="Password" value="{{$user->password}}">
		               	<div class="text-danger">
	                  	@error('password')
	                  	{{$message}}
	                  	@enderror
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="form-group row ">
	            	<div class="col-sm-3"></div>
		            <div class="col-sm-9">
		              <a href="/user" class="btn btn-primary">Batal</a>
		              <button type="reset" class="btn btn-warning">Reset</button>
		              <button class="btn btn-success">Simpan</button>
		            </div>
	         		</div>
	         	</div>
	          <div class="col-sm-4">
	            <div class="image has-shadow"><img class="img-fluid" src="{{url('images/'.$user->foto)}}" alt="Foto Profil Pengguna" width="300" height="360"></div>
	            <br/>
	            <input type="file" name="foto_profil">
	          </div>
	        </div>
        </form>
			</div>
		</div><hr />
	</div>
</div>
@endsection