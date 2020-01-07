@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.access.permissions.management') . ' | ' . trans('labels.backend.access.permissions.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.permissions.management') }}
        <small>{{ trans('labels.backend.access.permissions.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.permission.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission']) }}

        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ trans('labels.backend.access.permissions.create') }}
             <div class="box-tools pull-right" style="margin-right: 80px">
                 @include('backend.access.includes.partials.permission-header-buttons')
                </div><!--box-tools pull-right-->
                </header>
                   
          

            <div class="box-body">
<div class="container">
                {{-- Including Form --}}
                @include("Backend.access.permissions.form")

                <div class="edit-form-btn">
                    {{ link_to_route('admin.access.permission.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
              </div></div></section></div></div>
</div>
    {{ Form::close() }}
@endsection
