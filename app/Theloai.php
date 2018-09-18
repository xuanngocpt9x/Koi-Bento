<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
   protected $table = "productType";

   public function Loaitin(){
   		return $this->hasMany('App/Loaitin','idTheLoai','id');
   }

   public function Tintuc(){
   		return $this->hasManyThrough('App/Tintuc','App\Loaitin','idTheLoai','idTheLoai','id');
   }
}
