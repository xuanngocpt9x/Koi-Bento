<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\productType;
use App\Product;

class MathangController extends Controller
{
	 public function getDanhSach(){
	 	$mathang = Product::orderBy('id','DESC')->get();
	 	 return view('admin.mathang.danhsach',['mathang'=>$mathang]);	

	 }
	
	 public function getThem(){ 
	 	$theloai=productType::all();
	 	return view('admin.mathang.them',['theloai'=>$theloai]);
	 }
	 public function postThem(Request $request){

	 	$this->validate($request,
	 		[
	 			'Ten'=>'required|unique:products,name|min:3|max:100',
	 			'theloai'=>'required',
	 			'Mota'=>'required|unique:products,name|min:3|max:100',
	 			'unitPrice'=>'required|unique:products,name',
	 			'promotionPrice'=>'required|unique:products,name',
	 			'unit'=>'required',
	 			'new'=>'required',
	 		],
	 		[
	 			'theloai.required'=>'bạn chưa chọn thể loại cho mặt hàng',

	 			'Ten.required'=>'bạn chưa nhập tên thể loại',
	 			'Ten.required'=>'Tên mặt hàng đã tồn tại',
	 			'Ten.required'=>'Tên mặt hàng đã tồn tại',
	 			'Ten.min'=>'Tên mặt hàng phải chứa tối thiểu 3 ký tự',
	 			'Ten.max'=>'Tên mặt hàng chỉ có thể chứa tối đa 100 tý tự',

	 			'Mota.required'=>'bạn chưa nhập tên thể loại',
	 			'Mota.required'=>'Tên mặt hàng đã tồn tại',
	 			'Mota.required'=>'Tên mặt hàng đã tồn tại',
	 			'Mota.min'=>'Tên mặt hàng phải chứa tối thiểu 3 ký tự',
	 			'Mota.max'=>'Tên mặt hàng chỉ có thể chứa tối đa 100 tý tự',

	 			'unitPrice.required'=>'bạn chưa nhập tên thể loại',
	 			'unitPrice.min'=>'giá quá thấp',
	 			'unitPrice.max'=>'Giá quá cao',

	 			'promotionPrice.required'=>'bạn chưa nhập tên thể loại',
	 			'promotionPrice.min'=>'giá quá thấp',
	 			'promotionPrice.max'=>'Giá quá cao',

	 			'unit.required'=>'đơn vị sản phẩm chưa có',

	 			'new.required'=>'bạn chưa nhập hình thức sản phẩm',

	 		]);
	 	$mathang = new Product();

	 	$mathang->name= $request->Ten;
	 	$mathang->id_type= $request->theloai;
	 	$mathang->description= $request->Mota;
	 	$mathang->unit_price= $request->unitPrice;
	 	$mathang->promotion_price= $request->promotionPrice;
	 	$mathang->unit= $request->unit;
	 	$mathang->new= $request->new;
	 	
	 	if ($request->hasFile('anh')) {

            $file = $request->file('anh');
           $formatImg = $file->getClientOriginalExtension();

           if($formatImg != 'jpg' && $formatImg !='png' && $formatImg != 'jpeg'){
                return redirect()->back()->with('message',"Format image is valid .Only jpg,png,jpeg");

           }


           $name = $file->getClientOriginalName();
           $name = str_random(4) ."_" .$name;
            
           while (file_exists('xuanngoc/image/product'.$name)) {
               $name = str_random(4) ."_" .$name;
           }

           $file->move('xuanngoc/image/product',$name);

            $mathang->image = $name; 
        }
	 	$mathang->save();

	 	return redirect()->back()->with('thongbao','bạn đã thêm thành công');
	 }
	public function getSua($id){
	 	$theloai=productType::all();
		$mathang=product::find($id);

	
		 return view('admin.mathang.sua',['mathang'=>$mathang,'theloai'=>$theloai]);

	 }

	 public function postSua(request $request,$id){

	 	$this->validate($request,
	 		[
	 			'Ten'=>'required|unique:products,name|min:3|max:100',
	 			'theloai'=>'required',
	 			'Mota'=>'required|unique:products,name|min:3|max:100',
	 			'unitPrice'=>'required|unique:products,name',
	 			'promotionPrice'=>'required|unique:products,name',
	 			'unit'=>'required',
	 			'new'=>'required',
	 		],
	 		[
	 			'theloai.required'=>'bạn chưa chọn thể loại cho mặt hàng',

	 			'Ten.required'=>'bạn chưa nhập tên thể loại',
	 			'Ten.required'=>'Tên mặt hàng đã tồn tại',
	 			'Ten.required'=>'Tên mặt hàng đã tồn tại',
	 			'Ten.min'=>'Tên mặt hàng phải chứa tối thiểu 3 ký tự',
	 			'Ten.max'=>'Tên mặt hàng chỉ có thể chứa tối đa 100 tý tự',

	 			'Mota.required'=>'bạn chưa nhập tên thể loại',
	 			'Mota.required'=>'Tên mặt hàng đã tồn tại',
	 			'Mota.required'=>'Tên mặt hàng đã tồn tại',
	 			'Mota.min'=>'Tên mặt hàng phải chứa tối thiểu 3 ký tự',
	 			'Mota.max'=>'Tên mặt hàng chỉ có thể chứa tối đa 100 tý tự',

	 			'unitPrice.required'=>'bạn chưa nhập tên thể loại',
	 			'unitPrice.min'=>'giá quá thấp',
	 			'unitPrice.max'=>'Giá quá cao',

	 			'promotionPrice.required'=>'bạn chưa nhập tên thể loại',
	 			'promotionPrice.min'=>'giá quá thấp',
	 			'promotionPrice.max'=>'Giá quá cao',

	 			'unit.required'=>'đơn vị sản phẩm chưa có',

	 			'new.required'=>'bạn chưa nhập hình thức sản phẩm',

	 		]);

	 	$mathang = product::find($id);

	 	$mathang->name= $request->Ten;
	 	$mathang->id_type= $request->theloai;
	 	$mathang->description= $request->Mota;
	 	$mathang->unit_price= $request->unitPrice;
	 	$mathang->promotion_price= $request->promotionPrice;
	 	$mathang->unit= $request->unit;
	 	$mathang->new= $request->new;

	 	$mathang->save();
	 	return redirect()->back()->with('thông báo','bạn đã sửa thành công');
	 }
 	public function getXoa($id){
 	}
 	public function postXoa($id){
 		
 	$mathang = products::find($id);
 	$mathang->delete();

 	return redirect()->back()->with('thongbao','bạn đã xóa thành công');
 	}
}
