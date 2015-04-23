@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Usuarios - Reportero Ciudadano
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{ HTML::style('admin/vendors/datatables/css/dataTables.colReorder.min.css') }}
{{ HTML::style('admin/vendors/datatables/css/dataTables.scroller.min.css') }}
{{ HTML::style('admin/vendors/datatables/css/dataTables.bootstrap.css') }}
{{ HTML::style('admin/css/pages/tables.css') }}
{{ HTML::style('admin/vendors/Buttons-master/css/buttons.css') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <h1>Usuarios - Reportero Ciudadano</h1>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-body">

                {{ Form::model(Input::all(), ['route' => 'administrador.users.reporteroList', 'method' => 'GET', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        <div class="col-md-2">
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                        </div>
                        <div class="col-md-1">
                            {{ Form::button('Buscar', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('administrador.users.reporteroList') }}" class="btn btn-danger">Borrar busqueda</a>
                        </div>
                    </div>

                {{ Form::close() }}

                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="filters">
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Fecha registro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                    		<td>{{ $user->profile->nombre }}</td>
            				<td>{{ $user->profile->apellidos }}</td>
            				<td>{{ $user->email }}</td>
                            <td>{{ date_format(new DateTime($user->created_at), 'd/m/Y H:i')  }}</td>
                            <td>{{ $user->activacion ? 'Activado' : 'No activado' }}</td>
            				<td>
                                <div class="button-dropdown" data-buttons="dropdown">
                                    <a href="#" class="button button-rounded">
                                        Acciones
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul>
                                        <li><a href="{{ route('administrador.users.show', $user->id) }}">Ver</a></li>
                                    </ul>
                                </div>
                            </td>
            			</tr>
                    @endforeach
                        
                    </tbody>
                </table>

                <div class="row">

                    <div class="col-md-5 col-sm-12">
                        <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Total de registros: {{ $users->getTotal() }}</div>
                    </div>

                    <div class="col-md-7 col-sm-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                            {{ $users->links() }}
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
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