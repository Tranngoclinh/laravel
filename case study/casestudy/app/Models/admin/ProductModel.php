<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    use Notifiable,
    SoftDeletes;
    public function category(){
        return $this->belongsTo(CategoriModel::class,'category_id','id');      
    }
}
