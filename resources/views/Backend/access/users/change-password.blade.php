@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.change_password'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.change_password') }}</small>
    </h1>
@endsection

@section('content')
<div class="container">
    {{ Form::open(['route' => ['admin.access.user.change-password', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'patch']) }}
  <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">{{ trans('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}
                      </div><!--box-tools pull-right-->
                </header>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('old password', trans('validation.attributes.backend.access.users.old_password'), ['class' => 'col-lg-2 control-label required', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}

                    <div class="col-lg-8">
                        {{ Form::password('old_password', ['class' => 'form-control  box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-lg-2 control-label required', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}

                    <div class="col-lg-8">
                        {{ Form::password('password', ['class' => 'form-control  box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}

                    <div class="col-lg-8">
                        {{ Form::password('password_confirmation', ['class' => 'form-control  box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                </div><!--pull-left-->

                <div class="pull-right" style="margin-right: 100px">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
           </div></div></section></div></div>
       </div>
    {{ Form::close() }}
@endsection