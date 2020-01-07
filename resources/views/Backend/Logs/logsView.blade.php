@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management'))

@section('page-header')
   <h3 class="m-b-less" style="margin-bottom: 20px">
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1>
@endsection
@section('content')
  <div class="wrapper">
      <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
      Logs View
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>
                               <div class="row">
    <div class="form-group col-md-6">
    <h5>Start Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-6">
    <h5>End Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
    </div>
    <div class="text-left" style="
    margin-left: 15px;
    ">
    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
    </div>
    </div>
    <br>
                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <td>id</td>
                <td>Action Performed</td>
                <td>causer_id</td>
                <td>user_name</td>
                <td>action on </td>
                <td>date</td>
             <!--    <th>Action</th> -->
               
            </tr>
        </thead>                       </tbody>
                        </table>
                    </div>
                        </section>
                    
</div>
                </div>
</div>
   
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
  
<!--data table init-->
<!-- <script src="{{URL('js/data-table-init.js')}}"></script> -->

    <script>
        $(function() {

    $('#customers').DataTable({
        processing: true,
        serverSide: true,
         ajax: {
                "url": '{!! route('admin.data') !!}',
                "type": 'GET',
                 data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
               
            },
        columns: [
         { data: 'id', name: 'id' },
            { data: 'Action Performed', name: 'Action Performed' },
            { data: 'causer_id', name: 'causer_id' },
            { data: 'user_name', name: 'user_name' },
            { data: 'action on ', name: 'action on ' },
            { data: 'date', name: 'date' },
            
        ],
           order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }}
                    ]
                },
                language: {
                    @lang('datatable.strings')
                }

    });
      $('.dt-buttons').hide()
});
       $('#btnFiterSubmitSearch').click(function(){
     $('#customers').DataTable().draw(true);
  });   
    </script>
    @endsection