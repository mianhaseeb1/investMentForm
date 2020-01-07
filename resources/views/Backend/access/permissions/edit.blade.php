@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.access.permissions.management') . ' | ' . trans('labels.backend.access.permissions.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.permissions.management') }}
        <small>{{ trans('labels.backend.access.permissions.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($permission, ['route' => ['admin.access.permission.update', $permission], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role']) }}
  <div class="container">
 <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ trans('labels.backend.access.permissions.edit') }}
              @include('backend.access.includes.partials.permission-header-buttons')

               </header>
          
            <div class="box-body">

                {{-- Including Form --}}
                @include("backend.access.permissions.form")
                 <div class="form-group">
                  <div class="container">
                <div class="edit-form-btn">
                    {{ link_to_route('admin.access.permission.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    </div>
                    <div class="clearfix"></div>
              </div></div></section></div></div></div></div>
    {{ Form::close() }}
@endsection