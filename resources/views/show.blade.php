@extends('app')

@section('htmlheader_title')
    Crear Cliente
@endsection

@section('main-content')
<div class="content">
	<div class="row">
		<div class="col-md-12 col-ms-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="box-tools pull-left">
						{!! Form::open(['route' => ['client.destroy', $cliente->id], 	'method' => 'delete' , 'role' => 'form']) !!}

							<button type="submit" class="btn btn-danger btn-xs">
	  							<i class="fa fa-times"></i>
							</button>
							<a href="{{ route('client.edit' , $cliente->id) }}" class="btn btn-primary btn-xs">
		  						<i class="fa fa-pencil"></i>
							</a> 
						{!! Form::close() !!}

					</div>
						Cliente {{ $cliente->nombre }}
					<div class="pull-right">
						Cuenta <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">
	  						<i class="fa fa-plus"></i>
						</button> 
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-6">
						<div class="box box-success box-solid">
							<div class="box-header with-border">
							<h3 class="box-title">Cliente</h3>
							</div>
							<div class="box-body">
								<ol>
									<li>{{ $cliente->nombre }}</li>
									<li>{{ $cliente->razon_social }}</li>
									<li>{{ $cliente->rfc }}</li>
								</ol>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-warning box-solid">
							<div class="box-header with-border">
							<h3 class="box-title">Cliente</h3>
							</div>
							<div class="box-body">
								<ol>
									<li>{{ $cliente->address->calle }}</li>
									<li>{{ $cliente->address->numero }}</li>
									<li>{{ $cliente->address->estado }}</li>
									<li>{{ $cliente->address->municipio }}</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('cuentas')
	</div>
</div>


@endsection

@section('modals')
	@include('modal')
@endsection

@section('extra.scripts')
	<script type="text/javascript">

	</script>
@endsection
