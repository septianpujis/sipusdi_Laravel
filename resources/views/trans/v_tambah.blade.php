@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Masukkan data dengan teliti.</h5>
				<hr />

		         {{-- <form method="post" action="/user/form_val" enctype="multipart/form-data">
		         	@csrf
			          <div class="row">
			            <div class="col-sm-8">
			              <div class="form-group row">
			                <label class="col-sm-3 form-control-label">Nomor Anggota</label>
			                <div class="col-sm-9">
			                  <input type="text" name="nomor" class="form-control" placeholder="NIS untuk Siswa, NIP untuk Pegawai" required>
			                  <div class="text-danger">
		                  	@error('nomor')
		                  	{{$message}}
		                  	@enderror
		                  </div>
			                </div>
			              </div>
			              <div class="line"> </div>
			              <div class="form-group row">
			                <label class="col-sm-3 form-control-label">Nama</label>
			                <div class="col-sm-9">
			                  <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" required>
			                  <div class="text-danger">
		                  	@error('nama')
		                  	{{$message}}
		                  	@enderror
		                  </div>
			                </div>
			              </div>
			              <div class="line"> </div>
			              <div class="form-group row">
			                <label class="col-sm-3 form-control-label">Level Akun</label>
			                <div class="col-sm-9">
			                  <div>
			                    <input id="optionsRadios1" type="radio" checked value="1" name="level">
			                    <label for="optionsRadios1">Pegawai</label>
			                  </div>
			                  <div>
			                    <input id="optionsRadios2" type="radio" value="2" name="level">
			                    <label for="optionsRadios2">Pembaca</label>
			                  </div>
			                </div>
			              </div>
			              <div class="form-group row">
			                <label class="col-sm-3 form-control-label">Kode Kelas</label>
			                <div class="col-sm-9 select">
			                  <select name="id_kelas" class="form-control">
			                    <option value="1">1</option>
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
			                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon/Handphone yang bisa dihubungi">
			                <div class="text-danger">
		                  	@error('no_telp')
		                  	{{$message}}
		                  	@enderror
		                  </div>
			              </div>
			            </div>
			            <div class="line"> </div>
			            <div class="line"> </div>
			            <div class="form-group row">
			              <label class="col-sm-3 form-control-label">Login Data</label>
			              <div class="col-sm-9">
			                <div class="form-group">
			                	<label>Email</label>
			                  <input type="email" name="email" class="form-control" placeholder="Email">
				               <div class="text-danger">
			                  	@error('email')
			                  	{{$message}}
			                  	@enderror
			                  </div>
			                </div>
			                <div class="form-group">
			                	<label>Password</label>
			                  <input type="password" name="password" class="form-control" placeholder="Password">
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
			              <a href="/buku" class="btn btn-primary">Batal</a>
			              <button type="reset" class="btn btn-warning">Reset</button>
			              <button class="btn btn-success">Simpan</button>
			            </div>
			          </div>
			            </div>
			            <div class="col-sm-4">
			              <div class="image has-shadow"><img class="img-fluid" src="#" alt="Foto Profil Pengguna" width="300" height="360"></div>
			              <br/>
			              <input type="file" name="foto_profil">
			            </div>
			          </div>
			          <div class="line"></div>
		        </form> --}}

        <form method="post" action="/">
        	@csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Waktu Pinjam</label>
                <div class="col-sm-9">
                  <input type="date" name="waktu_pinjam" class="form-control" readonly="" required value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
              <div class="line"> </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Peminjam</label>
                <div class="col-sm-9">
                  <select name="user" class="form-control" {{-- <?php if ($this->session->userdata('level')=='2') echo "disabled"; ?>  --}}>
                    <option>Pilih Data Pengguna</option>
                    {{-- <?php foreach($kelas as $row):?> --}}
                    {{-- <option value="<?php echo $row->id_user;?>" <?php if($row->id_user == $this->session->userdata('id')) echo 'selected';?>><?php echo $row->nama;?></option>
                    <?php endforeach;?> --}}
                  </select>
                </div>
              </div>
              <div class="line"> </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Judul Buku Yang Dipinjam</label>
                <div class="col-sm-9">
                  <select name="buku" class="form-control" required="">
                    <option>Pilih Buku</option>
                    {{-- <?php foreach($buku as $row):?>
                    <option value="<?php echo $row->id_buku;?>" <?php if ($row->id_buku == $this->input->post('id_buku')){echo "selected";}?>><?php echo $row->judul;?></option>
                    <?php endforeach;?> --}}
                  </select>
                </div>
              </div>
              <div class="line"> </div>
            </div>
            <div class="line"> </div>
            <div class="col-sm-4">
              <div>Waktu Peminjaman Terhitung 7 (Tujuh) Hari sejak buku diambil (Status 'belum diambil' berubah menjadi 'belum dikembalikan'</div>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <div class="col-sm-4 offset-sm-2">
              <a href="/trans" class="btn btn-secondary">Batal</a>
              <button type="reset" class="btn btn-secondary">Reset</button>
              <input type="submit" class="btn btn-primary" value="Tambah Data">
            </div>
          </div>
        </form>
			</div>
		</div><hr />
	</div>
</div>
@endsection