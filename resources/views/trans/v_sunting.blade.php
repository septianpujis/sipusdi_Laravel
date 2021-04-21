@extends('layout.v_template')

@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Halaman {{$title}}</h2>
				<h5>Isi data dengan teliti.</h5>
				<hr />
				
        <form method="post" action="/trans/form_val/{{$trans->id_trans}}">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Waktu Pinjam</label>
                <div class="col-sm-9">
                  <input type="date" name="waktu_pinjam" class="form-control" readonly="" required value="{{$trans->waktu_pinjam}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Peminjam</label>
                <div class="col-sm-9">
                  <select name="user" class="form-control">
                    <option>Pilih Data Pengguna</option>
                    @foreach ($user as $data)
                      <option value="{{$data->id_user}}" @if ($trans->id_user==$data->id_user) selected @endif>{{$data->nama}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-danger">
                  @error('user')
                  {{$message}}
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Judul Buku Yang Dipinjam</label>
                <div class="col-sm-9">
                  <select name="buku" class="form-control" required>
                    <option>Pilih Buku</option>
                    @foreach ($buku as $data)
                        <option value="{{$data->id_buku}}" @if ($trans->id_buku==$data->id_buku) selected @endif>{{$data->judul}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-danger">
                  @error('buku')
                  {{$message}}
                  @enderror
                </div>
              </div>
              @if (isset($trans->waktu_ambil))
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Tanggal Pengambilan Buku</label>
                  <div class="col-sm-9">
                    <label class="form-control-label">{{$trans->waktu_ambil}}</label><br>
                  </div>
                </div>
              @endif

              @if (isset($trans->waktu_kembali))
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Tanggal Pengembalian Buku</label>
                  <div class="col-sm-9">
                    <label class="form-control-label">{{$trans->waktu_kembali}}</label><br>
                  </div>
                </div>
              @endif
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Status Transaksi</label>
                <div class="col-sm-9">
                  <label class="form-control-label">{{$trans->nama_status}}</label><br>
                  @if ($trans->id_status==4)
                    <button class="btn btn-success" name="ganstat" value="1">Konfirmasi pengambilan buku</button>
                  @elseif ($trans->id_status==1)
                    <button class="btn btn-success" name="ganstat" value="2">Konfirmasi pengembalian buku</button>
                  @endif
                </div>
                <div class="text-danger">
                  @error('buku')
                  {{$message}}
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                  <a href="/trans" class="btn btn-default">Batal</a>
                  <button type="reset" class="btn btn-warning">Reset</button>
                  <input type="submit" class="btn btn-primary" value="Sunting Data">
                </div>
              </div>
            </div>
            <div class="line"> </div>
            <div class="col-sm-4">
              <div>Waktu Peminjaman Terhitung 7 (Tujuh) Hari sejak buku diambil (Status 'belum diambil' berubah menjadi 'belum dikembalikan'</div>
            </div>
          </div>
        </form>
			</div>
		</div><hr />
	</div>
</div>
@endsection