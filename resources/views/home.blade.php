@extends('app')

@section('htmlheader_title')
    Clientes
@endsection

@section('extra.htmlheader')
    <link href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="content">
	<div class="row">
		<div class="col-md-12 col-ms-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{route('client.create')}}" class="box-tools btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
					Cliente
				</div>
				<div class="panel-body">
					<table class="table dataTable table-hover" id="ClienteIndex">
		                <thead>
		                	<tr>
								<th>Nombre</th>
								<th>Razon Social</th>
								<th>RFC</th>
								<th>Bancos</th>
			                </tr>
		                </thead>
		                <tbody>
		                	@forelse($clientes as $cliente)
		                	<tr data-url="{{ route('client.show', $cliente->id) }}">
								<td> {{ $cliente->nombre }}</td>
		                		<td> {{ $cliente->razon_social }}</td>
		                		<td> {{ $cliente->rfc }}</td>
		                		<td>
		                			<ul>
		                			@foreach($cliente->accounts as $cuenta)
		                				<li>{{$cuenta->banco}}</li>
		                			@endforeach
		                			</ul>

		                		</td>
		               		</tr>
		               		@empty
		               			<div class="row">
	               			    	<p class="text-center" >No hay Clientes registrados</p>
		               			</div>
		               		@endforelse
		                </tbody>
		                <tfoot>
							<tr>
								<th>Nombre</th>
								<th>Razon Social</th>
								<th>RFC</th>
								<th>Bancos</th>
			                </tr>	
		                </tfoot>
		            </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('extra.scripts')
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('#ClienteIndex').DataTable();
	});
	$(function () {

	    $('table.table tr').click(function () {
	        window.location.href = $(this).data('url');
	    });
	})
</script>
@endsection
