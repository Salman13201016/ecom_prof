<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatModel extends Model
{
    use HasFactory;
    protected $table = "subcats";

    public function category(){
        return $this->belongsTo(CatModel::class,'cat_id');
    }
}
