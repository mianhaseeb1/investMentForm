@extends ('Backend.layouts.app')

@section ('title', 'Investent | Detail')

@section('page-header')
   <h3 class="m-b-less" style="margin-bottom: 20px">
        Application Detail
        <!-- <small>{{ trans('labels.backend.access.users.active') }}</small> -->
    </h3>
@endsection
@section('content')
  <div class="wrapper">
      <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
      Product's Detail
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <th>id</th>
                <th>Product Name</th>
                <th>Per sales</th>
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
            @foreach($Company_product as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->per_salses}}</td>
            </tr>
            @endforeach
        </thead>                       </tbody>
                        </table>
                    </div>

                        </section>
                    
</div>
                </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
     Competitor's Detail
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <th>id</th>
                <th>Competitor</th>
                <th>Product</th>
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
            @foreach($Company_Competitor as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->competitior}}</td>
                <td>{{$c->products}}</td>
            </tr>
            @endforeach
        </thead>                       </tbody>
                        </table>
                    </div>
                    
                        </section>
                    
</div>
                </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
      Supplier's Information
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <th>id</th>
                <th>Primary Suppliers</th>
                <th>Country</th>
                <th>Type of product</th>
                <th>Quantity</th>
                <th>% of sales</th>
                 
                
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
            @foreach($Company_Supplier as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->primary_suppliers}}</td>
                <td>{{$s->country}}</td>
                <td>{{$s->type_of_product}}</td>
                <td>{{$s->quantity}}</td>
                <td>{{$s->per_sales}}</td>
            </tr>
            @endforeach
        </thead>                       </tbody>
                        </table>
                    </div>
                    
                        </section>
                    
</div>
                </div>

                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
      Customer's Information
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <th>id</th>
                <th>Primary Customer</th>
                <th>Country</th>
                 <th>% of sales</th>
                 <th>Duration of Relation</th>
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
            @foreach($Company_Customer as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->primary_suppliers}}</td>
                <td>{{$c->country}}</td>
                 <td>{{$c->per_sales}}</td>
                <td>{{$c->duration}}</td>
            </tr>
            @endforeach
        </thead>                       </tbody>
                        </table>
                    </div>
                    
                        </section>
                    
</div>
                </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
     Management
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <th>id</th>
                <th>Name</th>
                <th>position</th>
                <th>Education</th>
                <th>Year in company</th>
                <th>Year in industry</th>
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
            @foreach($Company_Management as $m)
            <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->name}}</td>
                <td>{{$m->position}}</td>
                <td>{{$m->education}}</td>
                <td>{{$m->year_in_company}}</td>
                <td>{{$m->year_in_industry}}</td>
            </tr>
            @endforeach
        </thead>                       </tbody>
                        </table>
                    </div>
                    
                        </section>
                    
</div>
                </div>

         <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
    Bank and Non Banking facilities
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                 <th>id</th>
                <th>Lending Fecility</th>
                <th>Fecility Limit</th>
                <th>Terms and condition</th>
                <th>Security</th>
                <th>Cover</th>
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
            <tr>
                <td>asasa</td>
                <td>asasa</td>
                <td>asasa</td>
                <td>asasa</td>
                <td>asasa</td>
                <td>asasa</td>
            </tr>
        </thead>                       </tbody>
                        </table>
                    </div>
                    
                        </section>
                    
</div>



  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="padding: 15px">
                            <header class="panel-heading " style="margin-bottom: 15px">
   Files Data
                                <span class="tools pull-right">

                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                               </header>

                            <div class="table-responsive custom-responsive">
      <table  id="customers" class="table convert-data-table data-table table-responsive">
            
        <thead>
            <tr>
                <th>Commercial Registeration</th>
                <th>Management Accounts</th>
                <th>Audited Financial</th>
                <th>Financial Forecast</th>
                <th>Latest Aging Payable</th>
                <th>Latest Aging Recieveable</th>
                <th>Ownership structure</th>
                <th>Management structure</th>
                <th>Authorised signorities</th>
                <th>Business Plan</th>
                
                <!-- <td>Action</td> -->
             <!--    <th>Action</th> -->
               
            </tr>
           
            <tr>
                <td><a href='{{url("$file->Commercial")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Management")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Financial")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Forecast")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Payable")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Aging")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Ownership")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->structure")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Authorised")}}'>Click To Download</a></td>
                <td><a href='{{url("$file->Business_plan")}}'>Click To Download</a></td>
            </tr>
        </thead>                       </tbody>
                        </table>
                    </div>
                    
                        </section>
                    
</div>



































                </div>























  </div>

@endsection