@extends ('Backend.layouts.app')

@section ('title', 'WEBJOBSUK | InvestMent')

@section('page-header')
   <h3 class="m-b-less" style="margin-bottom: 20px">
        InvestMent Requests
        <!-- <small>{{ trans('labels.backend.access.users.active') }}</small> -->
    </h1>
@endsection
@section('content')
  <div class="wrapper">
      <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
    InvestMent Requests
                                <span class="tools pull-right">

                                   
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                <th>id </th>
                <th>Company Name</th>
                <th>Company Website</th>
                <th>Company Telephone</th>  
                <th>Action</th>
                

               
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
                "url": '{{ route("admin.investment.requests") }}',
                "type": 'GET',
                 data: {status: 1, trashed: false}
               
            },
        columns: [
             { data: 'id', name: 'id' },
            { data: 'Company Name', name: 'Company Name' },
            { data: 'Company Website', name: 'Company Website' },
            { data: 'Company_Phone', name: 'Company_Phone' },
            
            
           { data: 'Action', name: 'Action' },
           

            
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
     
    </script>
     
    
    @endsection