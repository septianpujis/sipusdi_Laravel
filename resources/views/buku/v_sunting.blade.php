@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Isi data dengan teliti.</h5>
				<form method="POST" action="/buku/form_val/{{$buku->id_buku}}" enctype="multipart/form-data">
					@csrf
		          <div class="row">
		            <div class="col-sm-8">
		              <div class="form-group row">
		                <label class="col-sm-3 form-control-label">Judul Buku</label>
		                <div class="col-sm-9">
		                  <input type="text" name="judul" class="form-control  @error('judul') is-invalid @enderror" placeholder="Judul Buku Lengkap" value="{{$buku->judul}}">
		                  <div class="text-danger">
		                  	@error('judul')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                </div>
		              </div>
		              <div class="line"> </div>
		              <div class="form-group row">
		                <label class="col-sm-3 form-control-label">Penulis</label>
		                <div class="col-sm-9">
		                  <input type="text" name="penulis" class="form-control  @error('penulis') is-invalid @enderror" placeholder="Nama Penulis Buku" value="{{$buku->penulis}}">
		                  <div class="text-danger">
		                  	@error('penulis')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                </div>
		              </div>
		              <div class="line"> </div>
		              <div class="form-group row">
		                <label class="col-sm-3 form-control-label">Penerbit</label>
		                <div class="col-sm-9">
		                  <input type="text" name="penerbit" class="form-control  @error('penerbit') is-invalid @enderror" placeholder="Nama Penerbit Buku" value="{{$buku->penerbit}}">
		                  <div class="text-danger">
		                  	@error('penerbit')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                </div>
		              </div>
		              <div class="line"> </div>
		              <div class="row">
		                <div class="col-sm-6">
		                  <div class="form-group row">
		                    <label class="col-sm-6 form-control-label">Tahun Terbit</label>
		                    <div class="col-sm-6">
		                      <input type="number" min="1950" max="3000" name="tahun" class="form-control  @error('tahun') is-invalid @enderror" placeholder="Cth: 2016" value="{{$buku->tahun}}">
		                      <div class="text-danger">
		                  	@error('tahun')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-sm-6">
		                  <div class="form-group row">
		                    <label class="col-sm-4 form-control-label">Halaman</label>
		                    <div class="col-sm-8">
		                      <input type="number" name="halaman" min="10" max="8000" class="form-control  @error('halaman') is-invalid @enderror" placeholder="Cth: 200" value="{{$buku->halaman}}">
		                      <div class="text-danger">
		                  	@error('halaman')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <div class="line"> </div>
		              <div class="form-group row">
		                <label class="col-sm-3 form-control-label">Genre</label>
		                <div class="col-sm-9">
		                  <input type="text" name="genre" class="form-control  @error('genre') is-invalid @enderror" placeholder="Genre Buku" value="{{$buku->genre}}">
		                  <div class="text-danger">
		                  	@error('genre')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                </div>
		              </div>
		              <div class="line"> </div>
		              <div class="form-group row">
		                <strong><label class="col-sm-3 form-control-label">Sinopsis</label></strong>
		                <div class="col-sm-9">
		                  <textarea type="text" name="sinopsis" class="form-control  @error('sinopsis') is-invalid @enderror" rows="12" placeholder="Sinopsis Buku Maksimal 500 Karakter">{{$buku->sinopsis}}</textarea>
		                  <div class="text-danger">
		                  	@error('sinopsis')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		                </div>
		              </div>
		              <div class="line"> </div>
		              <div class="form-group row ">
		            	<div class="col-sm-3 offset-sm-2"></div>
		           		<div class="col-sm-9">
			              <a href="/buku" class="btn btn-primary">Batal</a>
			              <button type="reset" class="btn btn-warning">Reset</button>
			              <button class="btn btn-success">Simpan</button>
		            	</div>
		              </div>
		            </div>
		            <div class="line"> </div>
		            <div class="col-sm-4">
		            	<label class="form-control-label">Status Sedia</label>
		            	<select name="sedia" class="form-control">
                    	<option value="1" @if ($buku->sedia == 1) checked @endif>Tersedia</option>
                    	<option value="2" @if ($buku->sedia == 2) checked @endif>Tidak Tersedia</option>
                  </select>
		            	<hr />
		              <div class="image has-shadow">
		              	<img class="img-fluid" src="{{url('images/'.$buku->sampul)}}" alt="Foto Sampul Buku" width="300" height="360"></div>
		              <br/>
		              <input type="file" name="sampul" value="{{$buku->sampul}}">
		              <div class="text-danger">
		                  	@error('sampul')
		                  	{{$message}}
		                  	@enderror
		                  </div>
		            </div>
		          </div>
		          <div class="line"></div>
		          
		        </form>
			</div>
		</div><hr />
	</div>
</div>
@endsection