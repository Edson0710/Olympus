@extends('adminlte::page')

@section('title', 'Citas')
<link href="{{asset('img/olympus-icon.png')}}" rel="icon">

@section('content_header')
<h1>Citas</h1>
@stop

@section('content')
<div class="card-body">
    @if(session('notification'))
        <div class="alert alert-info" role="alert">
            {{ session('notification') }}
        </div>
    @endif
</div>
<div class="text-right mb-3">
    <a class="btn btn-primary" href="/cita/create">Registrar Cita</a>
</div>
<div class="table-responsive">
    <table id="Mytable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha</th>
                <th>Celular</th>
                <th>Hora</th>
                <th>Barbero</th>
                <th>Servicio</th>
                <th>Total</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>
                    <a href="/cita/{{ $cita->id }}">
                        {{ $cita->nombreUsuarioCita }}
                    </a>
                </td>
                <td>{{ $cita->emailUsuarioCita }}</td>
                <td>{{ $cita->fechaUsuarioCita }}</td>
                <td>{{ $cita->celularUsuarioCita }}</td>
                <td>{{ $cita->horaUsuarioCita }}</td>
                <td>{{ $cita->empleado->nombreEmpleado }}</td>
                <td>
                    @foreach($cita->servicios as $servicio)
                        {{ $servicio->nombreServicio }}</br>
                    @endforeach
                </td>
                <td>${{ $cita->total }}</td>
                <td>
                    <a class="btn btn-warning" href="/cita/{{ $cita->id }}/edit">Editar</a>
                </td>
                <td>
                    <form class="formulario-eliminar" action="/cita/{{ $cita->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/cssAdmin/styles.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready( function () {
        $('#Mytable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                    }
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        } );
    } );
</script>

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡No será posible revertir esta acción!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
        })
    });
</script>
@stop
