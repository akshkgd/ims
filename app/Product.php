<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchaseDetails;
class Product extends Model
{
    // protected $fillable = [
    //     'name', 'description', 'category', 'reorderThreshold', 
    //        ];
        public function purchase() {
            return $this->hasMany(PurchaseDetails::class, 'id' );
        }
        
}
