<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Company;
use App\Models\Company\Company_Bank;
use App\Models\Company\Company_Customer;
use App\Models\Company\Company_Product;
use App\Models\Company\Company_Supplier;
use App\Models\Company\Company_Competitor;
use App\Models\Company\Company_Management;
use Alert;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('Backend.company.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->company_name;
        $company->website_url =$request->company_website;
        $company->working_capital = $request->working_capital;
        $company->phone = $request->company_telephone;
        $company->save();
        
// foreach ($request->product_name as $key => $value) {
    $company_product = new Company_Product;
    $company_product->product_name =$request->product_name[0];
    $company_product->company_id = $company->id;
    $company_product->per_salses =1;
    $company_product->save();
    
// 

    $company_compititor = new Company_Competitor;
    $company_compititor->company_id  =$company->id;
    $company_compititor->competitior =$request->competitor[0];
    $company_compititor->products    =$request->products[0];
    $company_compititor->save();


//     }

    $company_supplier = new Company_Supplier;
    $company_supplier->company_id        =$company->id; 
    $company_supplier->primary_suppliers = $request->suppliers[0];
    $company_supplier->country           = $request->country_supplier[0];
    $company_supplier->type_of_product   = $request->type_of_product[0];
    $company_supplier->quantity          = $request->quantity[0];
    $company_supplier->per_sales         = $request->sales_supplier[0];
    $company_supplier->save();  

    $company_customer = new Company_Customer;
    $company_customer->company_id = $company->id;
    $company_customer->primary_suppliers = $request->primary_customers[0];
    $company_customer->country = $request->country_customer[0]; 
    $company_customer->duration = $request->Duration[0];
    $company_customer->per_sales=$request->sales[0];
    $company_customer->save();
    

    $company_management = new Company_Management;
    $company_management->company_id =$company->id;
    $company_management->name = $request->name[0];
    $company_management->position = $request->position[0];
    $company_management->education = $request->education[0];
    $company_management->year_in_company = $request->year_in_company[0];
    $company_management->year_in_industry =$request->year_in_industry[0];
    $company_management->save();

     Alert::success('successfully Request Submit', "Stay Connected");
     return back();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function list()
    {
        return view('Backend.company.index');
    }
    public function getTable()
    {
        $company= Company::with('product')->get();

         return  DataTables::of($company)

            ->addColumn('id', function ($company) {
               return $company->id;
            })
            ->addColumn('Company Name', function ($company) {
               return $company->name;
            })
            ->addColumn('Company Website', function ($company) {
               return $company->website_url;
            })
             ->addColumn('Company_Phone', function ($company) {
               return $company->phone;
            })
            
               ->editColumn('Action', function ($company) {
                return '<a class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="btn btn-danger" style="margin-left:5px"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
               
              ->rawColumns(['Action'])
          
            ->make(true);
    }
}
