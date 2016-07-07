@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="content">
	<div class="row">
		<div class="col-md-12 col-ms-12">
			<div class="panel panel-default">

				<a href="{{route('client.create')}}" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
				<div class="panel-heading">
					Home
				</div>
				<div class="panel-body">
					<table class="table dataTable" id="ClienteIndex">
		                <thead>
		                	@forelse($clientes as $cliente)
		                	<tr>
		                		<th></th>
		               		</tr>
		               		@empty
		               			<div class="row">
	               			    	<p class="text-center" >No hay Clientes registrados</p>
		               			</div>
		               		@endforelse
		                </thead>
		                <tbody>
		                	<tr>
								<td></td>
			                </tr>
		                </tbody>
		                <tfoot>
		             	   <tr>
								<th></th>
							</tr>
		                </tfoot>
		            </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
