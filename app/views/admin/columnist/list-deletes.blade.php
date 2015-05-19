@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Columnistas eliminados
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
    <h1>Columnistas eliminadas</h1>
    <div class="alert alert-dismissable"></div>
</section>
<!--section ends-->
<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-body">

                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>

                                <th>Columnista</th>
                                <th>Dias</th>
                                @if(is_admin())
                                <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $item)
                            <tr data-id="{{ $item->id }}" data-title="{{ $item->titulo }}">
                                <td>{{ $item->nombre." ".$item->apellidos }}</td>
                                <td>
                                    {{ $item->dia_lunes ? 'Lunes - ' : '' }}
                                    {{ $item->dia_martes ? 'Martes - ' : '' }}
                                    {{ $item->dia_miercoles ? 'Miercoles - ' : '' }}
                                    {{ $item->dia_jueves ? 'Jueves - ' : '' }}
                                    {{ $item->dia_viernes ? 'Viernes - ' : '' }}
                                    {{ $item->dia_sabado ? 'Sabado - ' : '' }}
                                    {{ $item->dia_domingo ? 'Domingo' : '' }}
                                </td>
                                @if(is_admin())
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="#" class="btn-restore">Restaurar</a></li>
                                            <li><a href="#" class="btn-delete">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                                @endif
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
  <p>¿Desea eliminar el registro permanentemente?</p>
  <div class="title"></div>
</div>

<div id="dialog-confirm-restore" title="Restaurar la noticia">
  <p>¿Desea restaurar el registro eliminado?</p>
  <div class="title"></div>
</div>

{{ Form::open(['route' => ['administrador.columnist.destroyTotal', ':REGISTER'], 'method' => 'DELETE', 'id' => 'FormDeleteRow']) }}
{{ Form::close() }}

{{ Form::open(['route' => ['administrador.columnist.restore', ':REGISTER'], 'method' => 'POST', 'id' => 'FormRestoreRow']) }}
{{ Form::close() }}

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
{{ HTML::script('admin/vendors/Buttons-master/js/buttons.js') }}

<script>
$(document).on("ready", function(){
    $('.alert, #dialog-confirm, #dialog-confirm-restore').hide();

    $(".btn-delete").on("click", function(){
        var row = $(this).parents("tr");
        var id = row.data("id");
        var title = row.data("title");
        var form = $("#FormDeleteRow");
        var url = form.attr("action").replace(':REGISTER', id);
        var data = form.serialize();

        $("#dialog-confirm .title").text(title);

        $("#dialog-confirm").dialog({
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

    $(".btn-restore").on("click", function(){
        var row = $(this).parents("tr");
        var id = row.data("id");
        var title = row.data("title");
        var form = $("#FormRestoreRow");
        var url = form.attr("action").replace(':REGISTER', id);
        var data = form.serialize();

        $("#dialog-confirm-restore .title").text(title);

        $("#dialog-confirm-restore").dialog({
            resizable: true,
            height: 250,
            modal: false,
            buttons: {
                "Restaurar registro": function() {
                    row.fadeOut();

                    $.post(url, data, function(result){
                        $(".alert").show().removeClass('alert-danger').addClass('alert-success').text(result.message);
                    }).fail(function(){
                        $(".alert").show().removeClass('alert-success').addClass('alert-danger').text("Se produjo un error al restaurar el registro");
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