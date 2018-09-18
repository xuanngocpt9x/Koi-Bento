<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $table = "Comment";
   public function tintuc(){
   	return $this->beLongTo('App\tintuc','idTinTuc','id');
   }
   public function user(){
   	return $this->beLongTo('App\user','idUser','id');
   }
}
