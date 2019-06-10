
  <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
              <label>RUT / Pasaporte / Cédula *</label>
              <input type="text" value="{{ ($model->rut) ?? old('rut') }}" class="form-control" name="rut" id='rut' placeholder="Ej: 12345678-9"/>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
              <label>Primer Nombre *</label>
              <input type="text" value="{{ ($model->first_name) ?? old('first_name') }}" class="form-control" name="first_name" id='first_name' placeholder="Primer Nombre"/>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
              <label>Segundo Nombre</label>
              <input type="text" value="{{ ($model->last_name) ?? old('last_name') }}" class="form-control" name="last_name" id='last_name' placeholder="Segundo Nombre"/>
          </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
              <label>Apellido Paterno *</label>
              <input type="text" value="{{ ($model->father_surname) ?? old('father_surname') }}" class="form-control" name="father_surname" id='father_surname' placeholder="Apellido Paterno"/>
          </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
              <label>Apellido Materno</label>
              <input type="text" value="{{ ($model->mother_surname) ?? old('mother_surname') }}" class="form-control" name="mother_surname" id='mother_surname' placeholder="Apellido Materno"/>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Dirección de correo electronico *</label>
            <input type="text" value="{{ ($model->email) ?? old('email') }}" class="form-control" name="email" id='email' placeholder="Ej: hola@mundo.com" autocomplete="off"/>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Contraseña *</label>
            <input type="password" class="form-control" name="password" id='password' placeholder=""/>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Confirmar Contraseña *</label>
            <input type="password" class="form-control" name="password_confirmation" id='password_confirmation' placeholder=""/>
        </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
              <label class="control-label">Role :</label>
              <select name="role_id" id="role_id" class="form-control select2" >
                  <option value="">Seleccione una opción...</option>
                  @foreach($roles as $index => $name )
                  <option value="{{ $index }}" @if( $model->hasRole(str_slug($name))) selected="selected" @endif>{{ $name }}</option>
                  @endforeach
              </select>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label> Estado (Activo / Inactivo) : </label>
          <input type="checkbox" class="control-label js-switch" name="status" id='status' data-render='switchery'/>
        </div>
    </div>
  </div>
