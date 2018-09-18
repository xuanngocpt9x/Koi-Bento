<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
   protected $table = "Loaitin";

   public function Theloai(){
   	return $this->beLongTo('App\Theloai','idTheLoaoi','id');
   }
    public function tintuc(){
    	return $this->hasMany('App\tintuc','idLoaiTin','id');
    }
}
