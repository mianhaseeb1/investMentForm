@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.emailtemplates.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.emailtemplates.management') }}</h1>
@endsection

@section('content')
    <div class="wrapper">
      <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
            {{ trans('labels.backend.emailtemplates.management') }}
             <div class="box-tools pull-right" style="margin-right: 50px">
               
           <span class="tools pull-right">

            <div class="btn-group">
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">Export
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" id="copyButton"><i class="fa fa-clone"></i> Copy</a></li>
                    <li><a href="#" id="csvButton"><i class="fa fa-file-text-o"></i> CSV</a></li>
                    <li><a href="#" id="excelButton"><i class="fa fa-file-excel-o"></i> Excel</a></li>
                    <li><a href="#" id="pdfButton"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                    <li><a href="#" id="printButton"><i class="fa fa-print"></i> Print</a></li>
                  </ul>
            </div>
 </span>
           </header>
           <div class="table-responsive custom-responsive">
            <div class="table-responsive data-table-wrapper" >
                <table id="emailtemplates-table" class="table convert-data-table data-table table-responsive">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.emailtemplates.table.title') }}</th>
                            <th>{{ trans('labels.backend.emailtemplates.table.subject') }}</th>
                            <th>{{ trans('labels.backend.emailtemplates.table.status') }}</th>
                            <th>{{ trans('labels.backend.emailtemplates.table.createdat') }}</th>
                            <th>{{ trans('labels.backend.emailtemplates.table.updatedat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                          </tr>
                   </tbody>
                        </table>
      
    
                    </div>
                        </section>
                    
</div>
                </div>
                  
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        $(function() {
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataTable = $('#emailtemplates-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.emailtemplates.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'title', name: '{{config('module.email_templates.table')}}.title'},
                    {data: 'subject', name: '{{config('module.email_templates.table')}}.subject'},
                    {data: 'status', name: '{{config('module.email_templates.table')}}.status'},
                    {data: 'created_at', name: '{{config('module.email_templates.table')}}.created_at'},
                    {data: 'updated_at', name: '{{config('module.email_templates.table')}}.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
                $('.dt-buttons').hide();
        });
    </script>
@endsection