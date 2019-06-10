

  <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
              <label>Nombre *</label>
              <input type="text" value="{{ ($model->display_name) ?? old('display_name') }}" class="form-control" name="display_name" id='display_name' placeholder="Nombre"/>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
              <label>Codigo Interno</label>
              <input type="text" value="{{ ($model->name) ?? old('name') }}" class="form-control" name="name" id='name' placeholder="Codigo Interno" readonly/>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
              <label>Descripción</label>
              <input type="text" value="{{ ($model->description) ?? old('description') }}" class="form-control" name="description" id='description' placeholder="Descripción"/>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
              <label class="control-label">Permisos :</label>
              <select name="permission_id[]" id="permission_id" class="form-control select2"  multiple='multiple'>
                  <option value="">Seleccione una opción...</option>
                  @foreach($permissions as $index => $name )
                    <option value="{{ $index }}" @if(in_array($index, $permission_id)){{'selected'}}@endif>{{ $name }}</option>
                  @endforeach
              </select>
          </div>
      </div>
  </div>



<input type="hidden" value="{{$page}}" name="page" />
