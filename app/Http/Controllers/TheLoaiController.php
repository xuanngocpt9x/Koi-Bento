<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\productType;

class TheLoaiController extends Controller
{
 public function getDanhSach(){
 	$theloai=productType::all();
 	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
 }

 public function getThem(){
 	return view('admin.theloai.them');
 }
 public function postThem(Request $request){
 	$this->validate($request,
 		[
 			'Ten' => 'required|min:3|max:100',
 			'Mota' => 'required|min:9|max:100'
 		],
 		[
 			'Ten.required' => 'Bạn chưa nhập tên thể loại',
 			'Ten.min' => 'Tên thể loại phải có ít nhất 3 ký tự',
 			'Ten.max' => 'Tên thể loại chứa tối đa 100 ký tự',

 			'Mota.required' => 'Bạn chưa nhập tên thể loại',
 			'Mota.min' => 'Tên thể loại phải có ít nhất 9 ký tự',
 			'Mota.max' => 'Tên thể loại chứa tối đa 100 ký tự',
 		]);
 	$theloai = new productType;
 	$theloai->name = $request->Ten;
 	$theloai->description = $request->Mota;
 	$theloai->save();
 	return redirect('admin/theloai/them')->with('thongbao','bạn đã thêm thể loại thành công');
 }
public function getSua($id){
 	$theloai = productType::find($id);
 	return view('admin.theloai.sua',['theloai'=>$theloai]);
 }

 public function postSua(request $request,$id){
 	$theloai = productType::find($id);
 	$this->validate($request,
 		[
 			'Ten'=>'required|unique:type_products,name|min:3|max:100',
 			'mota'=>'required|unique:type_products,description|min:3|max:100',
 		],
 		[
 			'Ten.required'=>'bạn chưa nhập tên thể loại',
 			'Ten.unique'=>'tên thể loại bị trùng',
 			'Ten.min' => 'Tên thể loại phải có ít nhất 3 ký tự',
 			'Ten.max' => 'Tên thể loại chứa tối đa 100 ký tự',

 			'mota.required'=>'bạn chưa nhập tên thể loại',
 			'mota.unique'=>'tên thể loại bị trùng',
 			'mota.min' => 'Tên thể loại phải có ít nhất 9 ký tự',
 			'mota.max' => 'Tên thể loại chứa tối đa 100 ký tự',
 		]);

 		$theloai->name=$request->Ten;
 		$theloai->description=$request->mota;
 		$theloai->save();
 		return redirect()->back()->with('thongbao','bạn đã sửa thành công');
 	
 	// return view('admin.theloai.sua',['theloai'=>id]);
 }
 	public function getXoa($id){
 		$theloai = productType::find($id);
 		$theloai->delete();
 		return redirect()->back()->with('thongbao','bạn đã xóa thành công');
 	}
}
