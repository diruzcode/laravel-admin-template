<!DOCTYPE html>
<html lang="es">

<head>
	<title>{{ ENV('APP_TITLE') }}</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="{{ ENV('description') }}">
	<meta name="keywords" content="{{ ENV('keywords') }}">

  <meta name="theme-color" content="#ffffff">
	<!-- Main style -->
	<link rel="stylesheet" href="{{ mix('/css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ mix('/css/dashboard_resources.css') }}">

</head>

<body id="page-top">

	<div id="wrapper">

		@include('dashboard.common.navbar')

		<div id="content-wrapper" class="d-flex flex-column">

			<div id="content">

				@include('dashboard.common.topbar')

				<div class="container-fluid">

					@yield('content')

				</div>
			</div>

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; 2019</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>



  <script src="{{ mix('/js/dashboard.js') }}"></script>
	<script src="{{ mix('/js/dashboard_resources.js') }}"></script>
	@include('dashboard.common.message')

  @yield('js-validation')
  @yield('js-scripts')

	<script type="text/javascript">

			$(document).ready(function() {
					$('#datatable-responsive').DataTable({
							dom: 't',
							bDestroy: true,
							language: {
									"sProcessing":     "Procesando...",
									"sLengthMenu":     "Mostrar _MENU_ registros",
									"sZeroRecords":    "No se encontraron resultados",
									"sEmptyTable":     "Ningún dato disponible en esta tabla",
									"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
									"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
									"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
									"sInfoPostFix":    "",
									"sSearch":         "Buscar:",
									"sUrl":            "",
									"sInfoThousands":  ",",
									"sLoadingRecords": "Cargando...",
									"oPaginate": {
											"sFirst":    "Primero",
											"sLast":     "Último",
											"sNext":     "Siguiente",
											"sPrevious": "Anterior"
									},
									"oAria": {
											"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
											"sSortDescending": ": Activar para ordenar la columna de manera descendente"
									}
							},
							pageLength: 10
					});

					$(".select2").css({width:'100%'}).select2({
							allowClear: true,
							placeholder: {
									id: '',
									text: 'Seleccione una opción...'
							},
							minimumResultsForSearch: 6
					});

					$('#name').blur(function(event){
							$.get('/dashboard/common/slug/'+$('#name').val(), function(data){
									$('#slug').val(data);
							});
					});

					$('#display_name').blur(function(event){
							$.get('/dashboard/common/slug/'+$('#display_name').val(), function(data){
									$('#name').val(data);
							});
					});
			});
	</script>
</body>

</html>
