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
use App\Models\File\File;

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

$file = new File;
$file->company_id =$company->id;
     if (isset($request->Commercial)) {
          $profilePic_filename = $request->Commercial->getClientOriginalName();
          $profilePic_extension = $request->Commercial->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $CommercialPath = $profilePicFolderName . $storeProfilePicName;
          $request->Commercial->move(public_path() . $profilePicFolderName, $storeProfilePicName);

          $file->Commercial=$CommercialPath;
      }
      else
      {
        $file->Commercial="null";
      }
      if (isset($request->Management)) {
          $profilePic_filename = $request->Management->getClientOriginalName();
          $profilePic_extension = $request->Management->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $ManagementPath = $profilePicFolderName . $storeProfilePicName;
          $request->Management->move(public_path() . $profilePicFolderName, $storeProfilePicName);
          $file->Management=$ManagementPath;
      }
      else
      {
        $file->Management="null";
      }
      if (isset($request->Financial)) {
          $profilePic_filename = $request->Financial->getClientOriginalName();
          $profilePic_extension = $request->Financial->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $FinancialPath = $profilePicFolderName . $storeProfilePicName;
          $request->Financial->move(public_path() . $profilePicFolderName, $storeProfilePicName);
          $file->Financial = $FinancialPath; 
      }
      else
      {
         $file->Financial = "null";
      }
      if (isset($request->Forecast)) {
          $profilePic_filename = $request->Forecast->getClientOriginalName();
          $profilePic_extension = $request->Forecast->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $ForecastPath = $profilePicFolderName . $storeProfilePicName;
          $request->Forecast->move(public_path() . $profilePicFolderName, $storeProfilePicName);
          $file->Forecast = $ForecastPath;
      }
      else
      {
         $file->Forecast = "null";
      }
      if (isset($request->Payable)) {
          $profilePic_filename = $request->Payable->getClientOriginalName();
          $profilePic_extension = $request->Payable->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $PayablePath = $profilePicFolderName . $storeProfilePicName;
          $request->Payable->move(public_path() . $profilePicFolderName, $storeProfilePicName);
          $file->Payable = $PayablePath;
      }
      else
      {
         $file->Payable = "null";
      }
      if (isset($request->Aging)) {
          $profilePic_filename = $request->Aging->getClientOriginalName();
          $profilePic_extension = $request->Aging->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/filesData/';
          $AgingPath = $profilePicFolderName . $storeProfilePicName;
          $request->Aging->move(public_path() . $profilePicFolderName, $storeProfilePicName);

          $file->Aging = $AgingPath;
      }
      else
      {
         $file->Aging = "null"; 
      }
      if (isset($request->Ownership)) {
          $profilePic_filename = $request->profilePic->getClientOriginalName();
          $profilePic_extension = $request->profilePic->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $OwnershipPath = $profilePicFolderName . $storeProfilePicName;
          $request->Ownership->move(public_path() . $profilePicFolderName, $storeProfilePicName);
          $file->Ownership = $OwnershipPath;
      }
      else
      {
        $file->Ownership = "null";
      }
      if (isset($request->structure)) {
          $profilePic_filename = $request->profilePic->getClientOriginalName();
          $profilePic_extension = $request->profilePic->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $structurePath = $profilePicFolderName . $storeProfilePicName;
          $request->structure->move(public_path() . $profilePicFolderName, $storeProfilePicName);

          $file->structure =$structurePath;
      }
      else
      {
         $file->structure = "null";
      }
      if (isset($request->Authorised)) {
          $profilePic_filename = $request->profilePic->getClientOriginalName();
          $profilePic_extension = $request->profilePic->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $AuthorisedPath = $profilePicFolderName . $storeProfilePicName;
          $request->Authorised->move(public_path() . $profilePicFolderName, $storeProfilePicName);
          $file->Authorised = $AuthorisedPath;
      }
      else
      {
        $file->Authorised = "null";
      }
      if (isset($request->Business_plan)) {
          $profilePic_filename = $request->profilePic->getClientOriginalName();
          $profilePic_extension = $request->profilePic->getClientOriginalExtension();
          $randName = $profilePic_filename;
          $randImgName    = explode(".",$randName);
          $storeProfilePicName =$company->id.$randImgName[0] . "." . $profilePic_extension;
          $profilePicFolderName = '/ProfilePicFrames/';
          $Business_planPath = $profilePicFolderName . $storeProfilePicName;
          $request->Business_plan->move(public_path() . $profilePicFolderName, $storeProfilePicName);

          $file->Business_plan=$Business_plan;
      }
      else
      {
        $file->Business_plan = "null";
      }

$file->save();






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
        $Company_product    = Company_Product::where('company_id',$id)->get();
        $Company_Supplier   = Company_Supplier::where('company_id',$id)->get();
        $Company_Competitor = Company_Competitor::where('company_id',$id)->get();
        $Company_Customer   = Company_Customer::where('company_id',$id)->get();
        $Company_Bank       = Company_Bank::where('company_id',$id)->get();
        $Company_Management = Company_Management::where('company_id',$id)->get();
        $file = File::where('company_id',$id)->first();
        // dd($file);
        return view('Backend.company.detail',compact('Company_product','Company_Supplier','Company_Competitor','Company_Customer','Company_Bank','Company_Management','file'));
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
        $company =Company::where('id',$id)->delete();
         Alert::success('successfully deleted', "Application Deleted");
     return back();
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
                return '<a href=\''.route('company.show',[$company->id]).'\' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="btn btn-danger" style="margin-left:5px"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
               
              ->rawColumns(['Action'])
          
            ->make(true);
    }
}
