@extends('dashboard.layout')

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row col-12">
      <div class="col-6">
        <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Lista de Roles</h6>
      </div>
      <div class="col-6">
        <a href="{{ route('dashboard::roles.create') }}" class="btn btn-success btn-icon-split float-right">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Nuevo Role</span>
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div>
      <table id="datatable-responsive" class="table table-striped  dt-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->display_name }}</td>
                <td>{{ $item->description }}</td>
                <td class="d-flex justify-content-center">
                  <a href="{{ route('dashboard::roles.edit', ['role' => $item->id, 'page' => $page]) }}" class="btn btn-info btn-circle btn-sm" title="Editar" style="margin:1px">
                    <span class="icon">
                      <i class="fas fa-pen-alt"></i>
                    </span>
                  </a>
                  <a href="{{ route('dashboard::roles.edit', ['role' => $item->id, 'page' => $page]) }}" class="btn btn-danger btn-circle btn-sm" title="Eliminar" style="margin:1px">
                    <span class="icon">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      @if($items->total() > 0)
          <div class="row">
              <div class="col-sm-4 text-muted font-13">Mostrando registros del {{$items->firstItem()}} al {{$items->lastItem()}} de {{$items->total()}}.</div>
              <div class="col-sm-8 text-right">{{$items->appends(['search' => request('search')])->links()}}</div>
          </div>
      @endif
    </div>
  </div>
</div>

@stop
