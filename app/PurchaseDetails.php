<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class PurchaseDetails extends Model
{
    protected $dates = ['date_of_delivery', 'date_of_purchase'];
    protected $fillable = [
        'product_id', 'date_of_purchase', 'supplier_id', 'invoice_number', 'purchase_order_number', 'quantity_purchased', 'rate_per_unit', 'total',  'process_adopted', 'purpose_of_purchase', 'department_id'
    ];
    protected $guarded = [];
    public function item()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
