<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInvestMent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'company_name'      =>'required',
            'company_website'   =>'required',
            'company_telephone' =>'required',
            'working_capital'   =>'required',
            'product_name'      =>'required',
            'percentage'        =>'required|numeric',
            'competitor'        =>'required',
            'country'           =>'required',
            'products'          =>'required',
            'country_customer'           =>'required',
            'suppliers'         =>'required',
            'type_of_product'   =>'required',
            'quantity'          =>'required',
            'sales'             =>'required|numeric',
            'primary_customers' =>'required',
            'country_supplier'           =>'required',
         'sales_supplier'            =>'required|numeric',
            'Duration'          =>'required|numeric',
            'year_in_industry'  =>'required|numeric',
            'year_in_company'   =>'required|numeric',
            'position'          =>'required',
            'name'              =>'required',
            'education'         =>'required',
            'Covenants'         =>'required',
            'security'          =>'required',
           'Term_and_conditions'=>'required',
           'utilisation'        =>'required',
           'fecility_limit'     =>'required',
           'Lending_fecility'   =>'required',


        ];
    }
}
