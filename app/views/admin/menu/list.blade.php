@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Advanced Data Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{-- LISTA DE MENU --}}
{{ HTML::style('admin/vendors/nestable_files/jquery.nestable.css') }}

{{-- BUTTONS --}}
{{ HTML::style('admin/css/pages/buttons.css') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>
        Menu
    </h1>
</section>
<!--section ends-->
<section class="content">

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Opciones</h3>
                </div>

                <div class="panel-body">
                    <div id="accordion-menu" class="panel-group">

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#paginas" data-parent="#accordion-menu" data-toggle="collapse">Páginas</a>
                                </h4>
                            </div>
                            <div id="paginas" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    {{ Form::open(['route' => 'administrador.menu.page', 'method' => 'POST']) }}

                                        <ul class="list-group">

                                            @foreach($pagesList as $item)
                                            <li class="list-group-item">
                                                <div class="checkbox">
                                                    <label>
                                                    	{{ Form::radio('pages', $item->id, null) }}
                                                    	{{ $item->titulo }}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>

                                        <input type="submit" class="btn btn-block btn-md btn-success" value="Agregar al menú"/>

                                    {{ Form::close() }}

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#categorias" data-parent="#accordion-menu" data-toggle="collapse">Categorías</a>
                                </h4>
                            </div>
                            <div id="categorias" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    {{ Form::open(['route' => 'administrador.menu.category', 'method' => 'POST']) }}

                                        <ul class="list-group">

                                            @foreach($categoriesList as $item)
                                            <li class="list-group-item">
                                                <div class="checkbox">
                                                    <label>
                                                    	{{ Form::radio('categories', $item->id, null) }}
                                                    	{{ $item->titulo }}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>

                                        <input type="submit" class="btn btn-block btn-md btn-success" value="Agregar al menú"/>

                                    {{ Form::close() }}

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#enlaces" data-parent="#accordion-menu" data-toggle="collapse">Enlaces</a>
                                </h4>
                            </div>
                            <div id="enlaces" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    {{ Form::open(['route' => 'administrador.menu.link', 'method' => 'POST']) }}

                                        <div class="form-group">

                                            {{ Form::label('titulo', 'Titulo', ['class' => 'control-label']) }}
                                            {{ Form::text('titulo', null, ['class' => 'form-control']) }}

                                        </div>

                                        <div class="form-group">

                                            {{ Form::label('enlace', 'Enlace', ['class' => 'control-label']) }}
                                            {{ Form::text('enlace', null, ['class' => 'form-control']) }}

                                        </div>

                                        <input type="submit" class="btn btn-block btn-md btn-success" value="Agregar al menú"/>

                                    {{ Form::close() }}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Menú principal</h3>
                </div>

                <div class="panel-body">
                    <div class="dd" id="lista_menu">

                        {{ $menus }}

                        {{ Form::open(['route' => 'administrador.menu.order', 'method' => 'post']) }}
                            {{ Form::hidden('menu_order', null, ['id' => 'menu_order']) }}
                            {{ Form::hidden('menu_delete', null, ['id' => 'menu_delete']) }}

                        	<input type="submit" class="btn btn-block btn-md btn-success" value="Guardar menú"/>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal starts here-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">
                        Delete this entry
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <span class="glyphicon glyphicon-warning-sign"></span>
                        Are you sure you want to delete this Record?
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        Yes
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal ends here -->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<script src="{{ asset('admin/vendors/nestable_files/jquery.nestable.min.js') }}"></script>
<script>
$(document).on("ready", function() {

    $('#lista_menu').nestable({
        maxDepth: 2
    }).on('change', function(){
        valor = JSON.stringify($('#lista_menu').nestable('serialize'));
        $("#menu_order").val(valor);
        console.log(valor);
    });

});
</script>

{{-- ELIMINACION DE ITEM DE MENU --}}
<script>
$(document).on("ready", function(){
    $('.deleteMenu').on("click", function(){
        valor = $(this).attr('id');
        $('li[data-id='+valor+']').remove();
        $('#menu_delete').val(valor + "-" + $('#menu_delete').val());
    });
});
</script>

{{-- ACCORDION --}}
{{ HTML::script('admin/vendors/wizard/acc-wizard-master/js/acc-wizard.min.js') }}
{{ HTML::script('admin/js/pages/accordionformwizard.js') }}
@stop