

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




<input type="hidden" value="{{$page}}" name="page" />
