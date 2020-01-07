@extends ('Backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.deactivated'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.deactivated') }}</small>
    </h1>
@endsection

@section('content')
   <div class="container">
     <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                            {{ trans('labels.backend.access.users.deactivated') }}</h3>
              <div class="box-tools pull-right" style="margin-right: 50px">
                @include('backend.access.includes.partials.user-header-buttons')
        </div><!--box-tools pull-right-->
                            </header>
                             <div class="table-responsive data-table-wrapper">
        <table id="users-table" class="table colvis-data-table data-table">
             <thead>
                        <tr>
                            <th>{{ trans('labels.backend.access.users.table.first_name') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.last_name') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.created') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
           </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
    </div>
     </div><!-- /.box-header -->
       
    </div><!--box box-info-->
        </section>
        </div></div></div>
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
    <script>

        (function () {
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
                    data: {status: 0, trashed: false}
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
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
              $('.dt-buttons').hide(); 
        })();
       
    </script>
@endsection
