@extends('dashboard.layout')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row col-12">
      <div class="col-6">
        <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Exportar por contenido</h6>
      </div>
      <div class="col-6">
        <a href="#"  id="submit"  class="btn btn-success btn-icon-split float-right">
          <span class="text">Generar y Exportar</span>
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
      <div class="document-editor">
          <div class="document-editor__toolbar"></div>
          <div class="document-editor__editable-container">
              <div name="document" class="document-editor__editable">

              </div>
          </div>
      </div>
      <form method="POST" action="{{route('dashboard::pdfs.export_document_generate')}}" class="form-horizontal form-label-left" id="formPdfGenerate" >
          {{ csrf_field() }}
          <input name="content_textarea" id="content_textarea" type="hidden">
      </form>
  </div>
</div>


<div class="card shadow mb-4">

  <div class="card-header py-3">
    <div class="row col-12">
      <div class="col-6">
        <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Exportar por URL</h6>
      </div>
    </div>
  </div>
  <div class="card-body">

    <form method="POST" action="{{route('dashboard::pdfs.export_document_url')}}" class="form-horizontal form-label-left" id="formPdfGenerate" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" class="form-control" name="url" id='url' placeholder="Ej: https://github.com/DiruzCode/laravel-admin-template"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="float-right">
                <button type="submit" class="btn btn-success">Buscar y Exportar</button>
            </div>
        </div>
    </form>
  </div>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
      <div class="row col-12">
          <div class="col-6">
            <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Exportar por Vista</h6>
          </div>
      </div>
    </div>

    <div class="card-body">

      <a href="{{ route('dashboard::pdfs.export_by_view') }}"  target="_blank" class="btn btn-success btn-icon-split float-right">
        <span class="text">Exportar</span>
      </a>
    </div>
</div>
@stop

@section('js-scripts')

  <script type="text/javascript">
      $(document).ready(function() {

        DecoupledEditor.create( document.querySelector( '.document-editor__editable' ) ).then( editor => {
            const toolbarContainer = document.querySelector( '.document-editor__toolbar' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );

            window.editor = editor;
        } )
        .catch( err => {
            console.error( err );
        } );

        document.querySelector( '#submit' ).addEventListener( 'click', () => {
          $('#content_textarea').val(window.editor.getData());
          $('#formPdfGenerate').submit();
        } );


      });
  </script>
@stop
