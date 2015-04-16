@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Noticias
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{ HTML::style('admin/vendors/datatables/css/dataTables.colReorder.min.css') }}
{{ HTML::style('admin/vendors/datatables/css/dataTables.scroller.min.css') }}
{{ HTML::style('admin/vendors/datatables/css/dataTables.bootstrap.css') }}
{{ HTML::style('admin/css/pages/tables.css') }}
{{ HTML::style('admin/vendors/Buttons-master/css/buttons.css') }}
<!--end of page level css-->

{{ HTML::style('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Entradas</h1>
    <a href="{{ route('administrador.posts.create') }}" class="btn btn-md btn-default mgBt10">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar nuevo registro
    </a>
    <div class="alert alert-dismissable"></div>
</section>
<!--section ends-->
<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-body">

                    {{ Form::model(Input::all(), ['route' => 'administrador.posts.index', 'method' => 'GET', 'class' => 'form-horizontal']) }}

                        <div class="form-group">
                            <div class="col-md-2">
                                {{ Form::text('search', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-2">
                                {{ Form::select('category', ['' => 'Seleccionar categoria'] + $category, null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-2">
                                {{ Form::select('publicar', ['' => 'Seleccionar estado', '0' => 'No publicado', '1' => 'Publicado'], null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-1">
                                {{ Form::button('Buscar', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('administrador.posts.index') }}" class="btn btn-danger">Borrar busqueda</a>
                            </div>
                        </div>

                    {{ Form::close() }}

                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>

                                <th>Titulo</th>
                                <th>Categoría</th>
                                <th>Publicar</th>
                                <th>Fecha publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $item)
                            <tr data-id="{{ $item->id }}" data-title="{{ $item->titulo }}">
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->category->titulo }}</td>
                                <td>{{ $item->publicar ? 'Publicado' : 'No publicado' }}</td>
                                <td>{{ date_format(new DateTime($item->published_at), 'd/m/Y H:m')  }}</td>
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('home.noticia.preview', [$item->id, $item->slug_url]) }}" target="_blank">Ver</a></li>
                                            <li><a href="{{ route('administrador.posts.edit', $item->id) }}">Editar</a></li>
                                            <li><a href="#" class="btn-delete">Eliminar</a></li>
                                            <li><a href="{{ route('administrador.post.photoslist', $item->id) }}">Galería de Fotos</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row">

                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Total de registros: {{ $posts->getTotal() }}</div>
                        </div>

                        <div class="col-md-7 col-sm-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                {{ $posts->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div id="dialog-confirm" title="Eliminar registro">
  <p>¿Desea eliminar el registro?</p>
  <div class="title"></div>
</div>

{{ Form::open(['route' => ['administrador.posts.destroy', ':REGISTER'], 'method' => 'DELETE', 'id' => 'FormDeleteRow']) }}
{{ Form::close() }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
{{ HTML::script('admin/vendors/Buttons-master/js/buttons.js') }}

<script>
$(document).on("ready", function(){
    $('.alert').hide();
    $("#dialog-confirm").hide();

    $(".btn-delete").on("click", function(){
        var row = $(this).parents("tr");
        var id = row.data("id");
        var title = row.data("title");
        var form = $("#FormDeleteRow");
        var url = form.attr("action").replace(':REGISTER', id);
        var data = form.serialize();

        $("#dialog-confirm .title").text(title);

        $( "#dialog-confirm" ).dialog({
            resizable: true,
            height: 250,
            modal: false,
            buttons: {
                "Borrar registro": function() {
                    row.fadeOut();

                    $.post(url, data, function(result){
                        $(".alert").show().removeClass('alert-danger').addClass('alert-success').text(result.message);
                    }).fail(function(){
                        $(".alert").show().removeClass('alert-success').addClass('alert-danger').text("Se produjo un error al eliminar el registro");
                        row.show();
                    });

                    $(this).dialog("close");
                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            }
        });
    });
});

</script>
@stop