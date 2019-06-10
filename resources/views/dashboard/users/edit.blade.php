@extends('dashboard.layout')

@section('content')
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row col-12">
          <div class="col-6">
            <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Administrador de Usuarios - Modificar Usuario</h6>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('dashboard::users.update', ['user' => $model->id])}}" class="form-horizontal form-label-left" id='formEditUser'>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" value="{{ $model->id }}" class="form-control" name="id" id='id'/>
            {{ csrf_field() }}
            @include('dashboard.users.partials.form')
            @include('dashboard.common.form_buttons')
        </form>

      </div>
    </div>

@stop

@section('js-validation')
    {!! JsValidator::formRequest(\App\Http\Requests\UserRequest::class, '#formEditUser') !!}
@stop
