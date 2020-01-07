<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company\Company_Product;

class Company extends Model
{
   protected $table='companies';
   public $timestamps =false;

   public function product()
   {
   	return $this->hasOne(Company_Product::class,'company_id');
   }
}
