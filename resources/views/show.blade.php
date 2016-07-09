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
							<h3 class="box-title">Domicilio</h3>
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
<script src="{{ asset('/plugins/jquery-validation/jquery.validate.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
	$(document).on('click','.deleteCuenta', function(){
		var idCuenta = $(this).data('cuenta');
		var elementoCuenta = $(this);
		swal({
			title: "Esta seguro?",
			text: "Desea eliminar la cuenta bancaria!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "¡Si, Eliminar!",
			closeOnConfirm: false,
			cancelButtonText: "Cancelar"
		},
		function(){

            var formAction = "/home/destroyajax/"+idCuenta; // form handler url
            var formMethod = 'POST'; 

            $.ajax({
                type     : formMethod,
                url      : formAction,
                data: { "_token": "{{ csrf_token() }}" },
                dataType: 'json',

				beforeSend : function() {
                    console.log(formAction);
                    console.log(formMethod);
                },
                success  : function(result) {
                	var jsonObj = $.parseJSON(JSON.stringify(result));
					swal("¡Completado!", "Se ha eliminado el registro exitosamente", "success")
					elementoCuenta.parent().parent().parent().parent().remove();
           		},
                error : function(error) {
					swal("¡Error!", "Ah ocurrido un error", "warning");
					

                }
            });

		});

	});
	$("#formCuenta").validate({
		rules: {
			//banco: "required",
			sucursal: "required",
			numero_cuenta: "required"
		},
		messages: {
			banco: "Introduzca el Nombre del Banco",
			sucursal: "Indique cual es la sucursal",
			numero_cuenta: "indique el numero de Cuenta"
		},
		submitHandler: function(form) {

 				//e.preventDefault();
            
            var banco     = $('input[name=banco]').val();
            var sucursal    = $('input[name=sucursal]').val();
            var numero_cuenta = $('input[name=numero_cuenta]').val();
            var cliente_id  = '{{ $cliente->id }}';
            
            var formAction = "{{ route('client.storeAjax') }}"; // form handler url
            var formMethod = 'POST'; // GET, POST
            var _token = $('input[name="_token"]').val();
            /*$.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });*/

            $.ajax({
                type     : formMethod,
                url      : formAction,
                dataType: 'json',
                data     : {banco: banco, sucursal: sucursal, numero_cuenta: numero_cuenta, cliente_id: cliente_id, _token: _token},

				beforeSend : function() {
                    console.log(formAction);
                },
                success  : function(result) {
                	var jsonObj = $.parseJSON(JSON.stringify(result));
                	console.log(jsonObj);
                	$("#myModal").modal('toggle');
                	//$('#myModal').hide();	
					swal("¡Completado!", "Se ha generado el registro exitosamente", "success")
					var cuentaNueva = '<div class="col-md-6">'+
								'<div class="box box-danger box-solid">'+
									'<div class="box-header with-border">'+
									'<h3 class="box-title">Cuenta</h3>'+
										'<div class="box-tools pull-right">'+
										'<button type="button" class="btn btn-box-tool'+ 
 											' deleteCuenta"'+ 
 											'data-cuenta="'+jsonObj['id']+
 											'"><i class="fa fa-times"></i>'+
										'</button>'+
										'</div>'+
									'</div>'+
									'<div class="box-body">'+
										'<ol>'+
											'<li>'+ jsonObj['banco'] +'</li>'+
											'<li>'+ jsonObj['sucursal'] +'</li>'+
											'<li>'+ jsonObj['numero_cuenta'] +'</li>'+
										'</ol>'+
									'</div>'+
								'</div>'+
							'</div>';
				    $('#baseCuenta').append(cuentaNueva);
				                },
                error : function(error) {
						swal("¡Error "+error['status']+"!", error['responseText']['numero_cuenta'], "warning");
                	
					console.log(error);

                }
            });

            // console.log(formData);

            return false;

		},
	    highlight: function(element) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }

	});

});
</script>
@endsection
