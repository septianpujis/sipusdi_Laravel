@extends('layout.v_template')

@section('title', 'Home')
@section('content')
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Home</h2>
				<h5>Welcome {{session('nama')}}, Love to see you back. </h5>
				
			</div>
		</div><hr />
	</div>
</div>
@endsection