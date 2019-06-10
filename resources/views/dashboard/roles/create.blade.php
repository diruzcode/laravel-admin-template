@extends('dashboard.layout')

@section('content')
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row col-12">
          <div class="col-6">
            <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Administrador de Roles / Nuevo</h6>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('dashboard::roles.store')}}" class="form-horizontal form-label-left" id='formCreateRoles'>
            {{ csrf_field() }}
            @include('dashboard.roles.partials.form')
            @include('dashboard.common.form_buttons')
        </form>
      </div>
    </div>

    <!-- /page content -->
@stop

@section('js-validation')
    {!! JsValidator::formRequest(\App\Http\Requests\RoleRequest::class, '#formCreateRoles') !!}
@stop
