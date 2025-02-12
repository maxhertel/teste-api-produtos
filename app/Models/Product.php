<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name','sku','price'];
 /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = true;
}
