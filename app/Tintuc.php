<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    protected $table = "products";
    public function loaitin(){
    	$this->beLongTo('App\loaitin','idLoaiTin','id');
    }
    public function comment(){
    	return $this->hasMany('App\comment','idTinTuc','id');
    }
}
