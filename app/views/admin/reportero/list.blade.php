@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Advanced Data Tables
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
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Reportero ciudadano</h1>
    <a href="{{ route('administrador.posts.create') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar nuevo registro
    </a>
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

                                <th>Titulo</th>
                                <th>Reportero</th>
                                <th>Fecha creacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $item)
                            {{--*/
                            $usuario = $item->user->profile->nombre." ".$item->user->profile->apellidos;
                            /*--}}
                            <tr>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $usuario  }}</td>
                                <td>{{ date_format(new DateTime($item->created_at), 'd/m/Y H:m')  }}</td>
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('home.noticia.preview', [$item->id, $item->slug_url]) }}" target="_blank">Ver</a></li>
                                            <li><a href="{{ route('administrador.posts.edit', $item->id) }}">Editar</a></li>
                                            {{ Form::open(['route' => ['administrador.posts.destroy', $item->id], 'method' => 'delete', 'class' => 'FormDeleteRow']) }}
                                            <li><button type="submit">Eliminar</button></li>
                                            {{ Form::close() }}
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
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
{{ HTML::script('admin/vendors/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.tableTools.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.colReorder.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.scroller.min.js') }}
{{ HTML::script('admin/vendors/datatables/dataTables.bootstrap.js') }}
{{ HTML::script('admin/js/pages/table-advanced.js') }}
{{ HTML::script('admin/vendors/Buttons-master/js/vendor/scrollto.js') }}
{{ HTML::script('admin/vendors/Buttons-master/js/main.js') }}
{{ HTML::script('admin/vendors/Buttons-master/js/buttons.js') }}
@stop