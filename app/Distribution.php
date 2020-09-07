<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Department;

class Distribution extends Model
{
    protected $fillable = [
        'date_of_issue', 'department_id', 'purchase_order_number','quantity',  'product_id',
       ];
        public function department() {
            return $this->belongsTo(Department::class, 'department_id');
        }
        public function item() {
            return $this->belongsTo(Product::class, 'product_id');
        }      
    
        public function pon() {
            return $this->belongsTo(PurchaseDetails::class, 'purchase_order_number', 'purchase_order_number');
        }
        
    
}
