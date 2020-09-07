<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'productId', 'dateofPurchase', 'supplierId', 'invoiceNumber', 'purchaseOrderNumber', 'quantityPurchased', 'ratePerUnit', 'total',  'processAdopted', 'purposeOfPurchase'
       ];
    public function test() {
        return $this->hasMany(PurchaseDetails::class, 'supplierId');
    }
}
