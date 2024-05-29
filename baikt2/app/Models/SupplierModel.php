<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "tbsupplier";
    protected $primaryKey = 'id';
    public $incrementing =false;
    protected $keyType ='string';
   
    
}
