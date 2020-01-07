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
                               {{ trans('labels.backend.access.users.active') }}
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>
                                <div class="table-responsive custom-responsive">
                 <table  id="users-table" class="table convert-data-table data-table table-responsive">
                    <!-- <div class="container"></div> -->
                        <thead>
                       <tr>
                            <td>{{ trans('labels.backend.access.users.table.first_name') }}</td>
                            <td>{{ trans('labels.backend.access.users.table.last_name') }}</td>
                            <td>{{ trans('labels.backend.access.users.table.email') }}</td>
                            <td>{{ trans('labels.backend.access.users.table.confirmed') }}</td>
                            <td>{{ trans('labels.backend.access.users.table.roles') }}</td>
                            <td>{{ trans('labels.backend.access.users.table.created') }}</td>
                        <td>{{ trans('labels.backend.access.users.table.last_updated') }}</td>
                            <td>{{ trans('labels.general.actions') }}</td>
                        </tr>
                    </thead>
                       </tbody>
                        </table>
                    </div>
                        </section>
                    
</div>
                </div>
</div>
      <!--   <div class="box-body">
            {{-- {!! history()->renderType('User') !!} --}}
        </div> --><!-- /.box-body -->
   
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
  
<!--data table init-->
<!-- <script src="{{URL('js/data-table-init.js')}}"></script> -->

    <script>
        (function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            
            var dataTable = $('#users-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.user.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [

                    {data: 'first_name', name: '{{config('access.users_table')}}.first_name'},
                    {data: 'last_name', name: '{{config('access.users_table')}}.last_name'},
                    {data: 'email', name: '{{config('access.users_table')}}.email'},
                    {data: 'confirmed', name: '{{config('access.users_table')}}.confirmed'},
                    {data: 'roles', name: '{{config('access.roles_table')}}.name', sortable: false},
                    {data: 'created_at', name: '{{config('access.users_table')}}.created_at'},
                    {data: 'updated_at', name: '{{config('access.users_table')}}.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
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
            Backend.DataTableSearch.init(dataTable);
        })();

      
    </script>
    @endsection