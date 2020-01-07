@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('page-header')
    <h3 class="m-b-less" style="margin-bottom: 20px">
    {{ trans('labels.backend.access.roles.management') }}</h1>
@endsection

@section('content')
  <div class="wrapper">
      <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
                                {{ trans('labels.backend.access.roles.management') }}
     <div class="box-tools pull-right" style="margin-right: 50px">
               
           <span class="tools pull-right">
                     @include('Backend.access.includes.partials.role-header-buttons')
                                </span>
                               </header>
        <div class="table-responsive custom-responsive">
            <div class="table-responsive data-table-wrapper" >
                <table id="roles-table" class="table convert-data-table data-table table-responsive">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.access.roles.table.role') }}</th>
                            <th>{{ trans('labels.backend.access.roles.table.permissions') }}</th>
                            <th>{{ trans('labels.backend.access.roles.table.number_of_users') }}</th>
                            <th>{{ trans('labels.backend.access.roles.table.sort') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </tbody>
                        </table>
                          <div class="box-body">
            {{-- {!! history()->renderType('Role') !!} --}}
        </div><!-- /.box-body -->
                    </div>
                        </section>
                    
</div>
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

            var dataTable = $('#roles-table').dataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: '{{ route("admin.access.role.get") }}',
                    type: 'post',
                },
                columns: [
                    {data: 'name', name: '{{config('access.roles_table')}}.name'},
                    {data: 'permissions', name: '{{config('access.permissions_table')}}.display_name', sortable: false},
                    {data: 'users', name: 'users', searchable: false, sortable: false},
                    {data: 'sort', name: '{{config('access.roles_table')}}.sort'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }}
                    ]
                },
                language: {
                    @lang('datatable.strings')
                }
            });

            Backend.DataTableSearch.init(dataTable);
               $('.dt-buttons').hide();
        });
    </script>
@endsection