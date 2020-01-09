@extends ('frontend.layouts.app')

@section ('title', 'Apply for Investment - Online Application Form')

@section('page-header')
    <h1>
        <small>Apply for Investment - Online Application Form</small>
    </h1>
@endsection
@section('style')
<style type="text/css">
    label{
        color: brown;
    }
</style>
@endsection
@section('content')
<div class="wrapper">
   <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Credit Fund - Online Application Form
                  @if(count($errors) > 0 )
                 @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
                @break
                 @endforeach
                  @endif
                </header>
<div class="panel-body">
  <form class="form-horizontal tasi-form" method="post" action="{{route('company.store')}}" enctype="multipart/form-data" id="MyFromID">
    @csrf
                      <div class="form-group">
                          <center>
                          <h3 style="color:#85144b">Company Information <span></span><i class="fa fa-building-o "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>
   <div class="row" style="margin-top: 20px">
    <div class="col-md-12">
        <label class="col-md-2">Company Name</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="company_name" placeholder="Enter name">
        </div>
        <label class="col-md-2">Website URL</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="company_website" placeholder="Enter Url">
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px">
    <div class="col-md-12">
        <label class="col-md-2">Telephone</label>
        <div class="col-md-4">
            <input type="text" class="form-control"  placeholder="Enter Telephone" name="company_telephone">
        </div>
        <label class="col-md-2">Working capital cycle</label>
        <div class="col-md-4">
            <input type="text" name="working_capital"  class="form-control" name="" placeholder="Ente flow...">
        </div>
    </div>
</div>


 <center>
                          <h3 style="color:#85144b">Product's Information <span></span><i class="fa fa-list "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>


     <div class="row" style="margin-top: 20px" id="forAttach"><div class="col-md-12"><div class="col-sm-5"><input type="" name="product_name[]" class="form-control round-input" placeholder="product"></div><div class="col-sm-5"><input type=""  name="percentage[]" class="form-control round-input" placeholder="% of sales"></div><div class="col-sm-2"><button type="button" class="btn btn-info" id="add">Add</button></div></div></div>

<center>
                          <h3 style="color:#85144b">Competitor's Information <span></span><i class="fa fa-user "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>
<div class="row" style="margin-top: 20px" id="forCompetitors"><div class="col-md-12"><div class="col-sm-3"><input type="" name="competitor[]" class="form-control round-input" placeholder="competitor"></div><div class="col-sm-3"><input type=""  name="country[]" class="form-control round-input" placeholder="country"></div><div class="col-sm-4"><input type="" value="" name="products[]" class="form-control round-input" placeholder="products"></div><div class="col-sm-2"><button type="button" class="btn btn-info" id="addCompetitors">Add</button></div></div></div>
<!--  -->

<center>
                          <h3 style="color:#85144b">Supplier's Information <span></span><i class="fa fa-user "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>
<!--  -->
<div class="row" style="margin-top: 20px" id="forSuppliers"><div class="col-md-12"><div class="col-sm-2"><input type="" name="suppliers[]" class="form-control round-input" placeholder="primary suppliers"></div><div class="col-sm-2"><input type="text"  name="country_supplier[]" class="form-control round-input" placeholder="Country"></div><div class="col-sm-2"><input type="" value="" name="type_of_product[]" class="form-control round-input" placeholder="Type Of product"></div><div class="col-sm-2"><input type="" value="" name="quantity[]" class="form-control round-input" placeholder="Quantity"></div><div class="col-sm-2"><input type="" value="" name="sales_supplier[]" class="form-control round-input" placeholder="% of total"></div><div class="col-sm-2"> <button type="button" class="btn btn-info" id="addSuppliers">Add</button></div></div></div>
<!--  -->

<center>
                          <h3 style="color:#85144b">Customer's Information <span></span><i class="fa fa-user "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>
<!--  -->
<div class="row" id="forCustomers" style="margin-top: 20px"><div class="col-md-12"><div class="col-sm-3"><input type="" name="primary_customers[]" class="form-control round-input" placeholder="primary Customers"></div><div class="col-sm-3"><input type=""  name="country_customer[]" class="form-control round-input" placeholder="Country"> </div><div class="col-sm-2"><input type="" value="" name="sales[]" class="form-control round-input" placeholder="% of sales"></div><div class="col-sm-2"><input type="" value="" name="Duration[]" class="form-control round-input" placeholder="Duration of Relationship"></div><div class="col-sm-2"><button type="button" class="btn btn-info" id="addCustomers">Add</button></div></div></div>
<!--  -->

<center>
                          <h3 style="color:#85144b">Management<span></span><i class="fa fa-building-o "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>
<!--  -->
<div class="row" id="forManagement" style="margin-top: 20px"><div class="col-md-12"><div class="col-sm-2"><input type="" name="name[]" class="form-control round-input" placeholder="Name"></div><div class="col-sm-2"><input type=""  name="position[]" class="form-control round-input" placeholder="Position"></div><div class="col-sm-2"><input type="" value="" name="education[]" class="form-control round-input" placeholder="Education"></div><div class="col-sm-2"><input type="" value="" name="year_in_company[]" class="form-control round-input" placeholder="Year in company"></div><div class="col-sm-2"><input type="" value="" name="year_in_industry[]" class="form-control round-input" placeholder="Year in industry"></div><div class="col-sm-2"><button type="button" class="btn btn-info" id="addManagement">Add</button></div></div></div>
<!--  -->

<center>
                          <h3 style="color:#85144b">Bank and Non Bank facilities:<span></span><i class="fa fa-bank "style="color: red" aria-hidden="true"></i></h3>
                          <hr>
                        </center>

<!--  -->
<div class="row" id="forBank" style="margin-top: 20px"><div class="col-md-12"><div class="col-sm-2"><input type="" name="Lending_fecility[]" class="form-control round-input" placeholder="Lending fecility"></div><div class="col-sm-2"><input type=""  name="fecility_limit[]" class="form-control round-input" placeholder="Fecility Limit"></div><div class="col-sm-2"><input type=""  name="utilisation[]" class="form-control round-input" placeholder="utilisation %"></div><div class="col-sm-2"><input type=""  name="Term_and_conditions[]" class="form-control round-input" placeholder="Term and conditions"></div><div class="col-sm-2"><input type="" value="" name="security[]" class="form-control round-input" placeholder="security"></div><div class="col-sm-1"><input type="" value="" name="Covenants[]" class="form-control round-input" placeholder="Covenants"></div><div class="col-sm-1"><button type="button" class="btn btn-info" id="addBank">Add</button></div></div></div>
<!--  -->

<h4 style="margin-left: 30px">Files:</h4>

<!--  -->

<div class="row" style="margin-top: 20px">
    <div class="col-md-12">
        <label class="col-md-2">Latest Commercial Registeration</label>
        <div class="col-md-4">
            <input type="file" name="Commercial">
        </div>
        <label class="col-md-2">Management Accounts</label>
        <div class="col-md-4">
            <input type="file" name="Management">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label class="col-md-2">Audited Financial statement</label>
        <div class="col-md-4">
            <input type="file" name="Financial">
        </div>
        <label class="col-md-2">Financial Forecast(Next 3 yr)</label>
        <div class="col-md-4">
            <input type="file" name="Forecast">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label class="col-md-2">Latest Aging Payable</label>
        <div class="col-md-4">
            <input type="file" name="Payable">
        </div>
        <label class="col-md-2">Latest Aging Recieveable</label>
        <div class="col-md-4">
            <input type="file" name="Aging">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label class="col-md-2">Ownership structure</label>
        <div class="col-md-4">
            <input type="file" name="Ownership">
        </div>
        <label class="col-md-2">Management structure</label>
        <div class="col-md-4">
            <input type="file" name="structure">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label class="col-md-2">Authorised signorities</label>
        <div class="col-md-4">
            <input type="file" name="Authorised">
        </div>
        <label class="col-md-2">Business Plan</label>
        <div class="col-md-4">
            <input type="file" name="Business_plan">
        </div>
    </div>
</div>




<!--  -->
<div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-lg">Register</button>
    </div>
    <div class="col-md-5"></div>
</div>
</form>
</div></section></div></div></div>

@endsection

@section('after-scripts')
<script >
    $(document).ready(function() {
    $('.dropD').select2();
});
</script>
        <script src="{{ url('js/thirdparty') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script> 
    <script type="text/javascript" src="{{url('js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
 <!--    <script src="{{url('js/summernote/dist/summernote.min.js')}}"></script> -->
  <!--bootstrap-wysihtml5-->
<!-- <script type="text/javascript" src="{{url('js/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script> -->

<script type="text/javascript" src="{{url('js/file-input-init.js')}}"></script>
<link href="{{url('https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/css/froala_editor.pkgd.min.css')}}" rel='stylesheet' type='text/css' />

<!-- Include JS file. -->
<script type='text/javascript' src="{{url('https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/js/froala_editor.pkgd.min.js')}}"></script>
<script>
var editor = new FroalaEditor('#editor');
var editor2 = new FroalaEditor('#editor2');
</script>
<script type="text/javascript">
   
    var i = 0;
       
    

    $("#add").click(function(){

   

        $("#forAttach").append('<div class="row" id="new"><div class="col-md-12" style="margin-top:20px;margin-left:20px"><div class="col-sm-5"><input type="" name="product_name[]" class="form-control round-input" placeholder="product"></div><div class="col-sm-5"><input type=""  name="percentage[]" class="form-control round-input" placeholder="% of sales"></div><div class="col-sm-2"><button type="button" class="btn btn-danger remove-tr" id="addBank">X</button></div></div></div>');

    });
 
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#new').remove();
    });

      var j = 0;
       
    $("#addCompetitors").click(function(){

        ++j;
   
        $("#forCompetitors").append('<div class="row" id="new2"><div class="col-md-12" style="margin-top:20px;margin-left:20px"><div class="col-sm-3"><input type="" name="competitor[]" class="form-control round-input" placeholder="competitor"></div><div class="col-sm-3"><input type=""  name="country[]" class="form-control round-input" placeholder="country"></div><div class="col-sm-4"><input type="" value="" name="products[]" class="form-control round-input" placeholder="products"></div><div class="col-sm-2"><button type="button" class="btn btn-danger remove-tr" id="addBank">X</button></div></div></div>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#new2').remove();
    });  

  var k = 0;
       
    $("#addSuppliers").click(function(){

        ++k;
   
        $("#forSuppliers").append('<div class="row" id="new3"><div class="col-md-12" style="margin-top:20px;margin-left:20px"><div class="col-sm-2"><input type="" name="suppliers[]" class="form-control round-input" placeholder="primary suppliers"></div><div class="col-sm-2"><input type="text"  name="country_supplier[]" class="form-control round-input" placeholder="Country"></div><div class="col-sm-2"><input type="" value="" name="type_of_product[]" class="form-control round-input" placeholder="Type Of product"></div><div class="col-sm-2"><input type="" value="" name="quantity[]" class="form-control round-input" placeholder="Quantity"></div><div class="col-sm-2"><input type="" value="" name="sales_supplier[]" class="form-control round-input" placeholder="% of total"></div><div class="col-sm-2"><button type="button" class="btn btn-danger remove-tr" id="addBank">X</button></div></div></div>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#new3').remove();
    });  


      var l = 0;
       
    $("#addCustomers").click(function(){

        ++l;
   
        $("#forCustomers").append('<div class="row" id="new4"><div class="col-md-12" style="margin-top:20px;margin-left:20px"><div class="col-sm-3"><input type="" name="primary_customers[]" class="form-control round-input" placeholder="primary Customers"></div><div class="col-sm-3"><input type=""  name="country_customer[]" class="form-control round-input" placeholder="Country"> </div><div class="col-sm-2"><input type="" value="" name="sales[]" class="form-control round-input" placeholder="% of sales"></div><div class="col-sm-2"><input type="" value="" name="Duration[]" class="form-control round-input" placeholder="Duration of Relationship"></div><div class="col-sm-2"><button type="button" class="btn btn-danger remove-tr" id="addBank">X</button></div></div></div>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#new4').remove();
    });  


      var m = 0;
       
    $("#addManagement").click(function(){

        ++m;
   
        $("#forManagement").append('<div class="row" id="new5"><div class="col-md-12" style="margin-top:20px;margin-left:20px"><div class="col-sm-2"><input type="" name="name[]" class="form-control round-input" placeholder="Name"></div><div class="col-sm-2"><input type=""  name="position[]" class="form-control round-input" placeholder="Position"></div><div class="col-sm-2"><input type="" value="" name="education[]" class="form-control round-input" placeholder="Education"></div><div class="col-sm-2"><input type="" value="" name="year_in_company[]" class="form-control round-input" placeholder="Year in company"></div><div class="col-sm-2"><input type="" value="" name="year_in_industry[]" class="form-control round-input" placeholder="Year in industry"></div><div class="col-sm-2"><button type="button" class="btn btn-danger remove-tr" id="addBank">X</button></div></div></div>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#new5').remove();
    });  



      var n = 0;
       
    $("#addBank").click(function(){

        ++n;
   
        $("#forBank").append('<div class="row" id="new6"><div class="col-md-12" style="margin-top:20px;margin-left:20px"><div class="col-sm-2"><input type="" name="Lending_fecility[]" class="form-control round-input" placeholder="Lending fecility"></div><div class="col-sm-2"><input type=""  name="fecility_limit[]" class="form-control round-input" placeholder="Fecility Limit"></div><div class="col-sm-2"><input type=""  name="utilisation[]" class="form-control round-input" placeholder="utilisation %"></div><div class="col-sm-2"><input type=""  name="Term_and_conditions[]" class="form-control round-input" placeholder="Term and conditions"></div><div class="col-sm-2"><input type="" value="" name="security[]" class="form-control round-input" placeholder="security"></div><div class="col-sm-1"><input type="" value="" name="Covenants[]" class="form-control round-input" placeholder="Covenants"></div><div class="col-sm-1"><button type="button" class="btn btn-danger remove-tr" id="addBank">X</button></div></div></div>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#new6').remove();
    });

</script>
 <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

                    {!! JsValidator::formRequest('App\Http\Requests\AddInvestMent','#MyFromID'); !!}
@endsection


