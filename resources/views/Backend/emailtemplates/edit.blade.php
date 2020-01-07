@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.emailtemplates.management') . ' | ' . trans('labels.backend.emailtemplates.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.emailtemplates.management') }}
        <small>{{ trans('labels.backend.emailtemplates.edit') }}</small>
    </h1>
    <div class="model-container">
        <div class="modal fade model-wrapper" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Email Template </h4>
                    </div>

                    <div id="model-body" class="modal-body">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    {{ Form::model($emailtemplate, ['route' => ['admin.emailtemplates.update', $emailtemplate], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role']) }}
<div class="container">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.emailtemplates.edit') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('title', trans('validation.attributes.backend.emailtemplates.title'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-8">
                        {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.emailtemplates.title'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('type_id', trans('validation.attributes.backend.emailtemplates.type'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-8">
                        {{ Form::select('type_id', $emailtemplatetypes, null,['class' => 'form-control select2 box-size', 'placeholder' => trans('validation.attributes.backend.emailtemplates.type'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('placeholder', trans('validation.attributes.backend.emailtemplates.placeholder'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-8">
                        <div class="input-group box-size">
                            {{ Form::select('placeholder', $emailtemplateplaceholders, null,['class' => 'form-control select2', 'placeholder' => trans('validation.attributes.backend.emailtemplates.placeholder'), 'id' => 'placeHolder', 'style' => 'width:100%']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="addPlaceHolder" type="button">{{ trans('buttons.general.crud.add') }}</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!--col-lg-10-->
                </div><!--form control-->
@php
$body= $emailtemplate->body;
@endphp
                <div class="form-group">
                    {{ Form::label('subject', trans('validation.attributes.backend.emailtemplates.subject'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-8">
                        {{ Form::text('subject', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.emailtemplates.subject')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('body', trans('validation.attributes.backend.emailtemplates.body'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-8 mce-box">
                   
                        {{ Form::textarea('body', null,['class' => 'form-control summernote', 'placeholder' => trans('validation.attributes.backend.emailtemplates.body'), ]) }}
                    </div><!--col-lg-3-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('is_active', trans('validation.attributes.backend.emailtemplates.is_active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-8">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                {{ Form::checkbox('is_active', 1, ($emailtemplate->status == 1) ? true : false ) }}
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-3-->
                </div><!--form control-->
                <div class="edit-form-btn">
                    {{ link_to_route('admin.emailtemplates.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    <input type="button" id="showPreview" data-toggle="modal" data-target="#templatePreview" class="btn btn-info btn-md" value="{{ trans('buttons.general.preview') }}" />
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div>
                
            </div><!-- /.box-body -->
        </div><!--box-->
    {{ Form::close() }}
</div>
@endsection
@section("after-scripts")
 

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

<script type="text/javascript">



   $(document).ready(function() {



    $('.summernote').summernote({



          height: 500,



     });



  });

$('.summernote').summernote('editor.pasteHTML',   ) 

</script>

@endsection
