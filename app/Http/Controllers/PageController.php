<?php

namespace App\Http\Controllers;
use App\slide;
use App\product;
use App\productType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use App\theloai;

use Illuminate\Http\Request;

class PageController extends Controller
{
public function getIndex(){
	$slide = slide::all(); 
	$new_product = product::where('new',1)->paginate(4); 
	$sanpham_khuyenmai = product::where('promotion_price','<>',0)->paginate(8);
	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
	// return view('page.trangchu',['slide'=>$slide]); hoặc ta có thể dùng cách này
	}
public function getLoaiSp($type){
	$sp_theoloai = product::where('id_type',$type)->get();
	$sp_khac = product::where('id_type','<>',$type)->paginate(3);
	$loai = productType::all();
	$loai_sp=productType::where('id',$type)->first();
	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
}


public function getChitiet(Request $req){
	$sanpham = product::where('id',$req->id)->first();
	$sp_tuongtu = product::where('id_type',$sanpham->id_type)->paginate(3);
	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
}


public function getLienHe(){
	return view('page.lienHe');
}
public function getGioiThieu(){
	return view('page.gioithieu');
}

public function getAddToCart(Request $req, $id){
	$product = product::find($id);
	$oldCart = Session('cart')?Session::get('cart'):null;
	$cart = new Cart($oldCart);
	$cart->add($product, $id);
	$req->Session()->put('cart', $cart);
	return redirect()->back();
}

public function getDelItemCart($id){
	$oldCart = Session::has('cart')?Session::get('cart'):null;
	$cart = new Cart($oldCart);
	$cart->removeItem($id);
	if(count($cart->items)>0){
		Session::put('cart',$cart);
	}
	else {
		Session::forget('cart');
	}
	return redirect()->back();
}
	public function getCheckout(){
		return view('page.dat_hang');
	}
	public function postCheckout(Request $req){
		$cart= Session::get('cart');
		$customer = new Customer;
		$customer->name = $req->name;
		$customer->gender = $req->gender;
		$customer->email = $req->email;
		$customer->address = $req->address;
		$customer->phone_number = $req->phone;
		$customer->note = $req->notes;
		$customer->save();


		$bill = new Bill;
		$bill->id_customer=$customer->id;
		$bill->date_order=date('Y-m-d');
		$bill->total = $cart->totalPrice;
		$bill->payment= $req->payment_method;
		$bill->phone_number = $req->phone;
		$bill->address = $req->address;
		$bill->note= $req->notes;
		$bill->save();


		foreach ($cart -> items as $key => $value) {
		$bill_detail = new BillDetail;
		$bill_detail->id_bill=$bill->id;
		$bill_detail->id_product = $key;
		$bill_detail->quantity= $value['qty'];
		$bill_detail->unit_price=($value['price']/$value['qty']);
		$bill_detail->save();
		}

		Session::forget('cart');
		return redirect()->back()->with('thongbao','Bạn đã đặt hàng thành công');
	}
	public function getLogin(){
		return view('page.dangnhap');
	}

	public function getSignin(){
		return view('page.dangki');
	}
	public function postSignin(Request $req){
		$this->validate($req,
			[
				'email'=>'required|email|unique:users,email',
				'password'=>'required|min:8|max:32',
				'full_name'=>'required',
				're_password'=>'required|same:password'
			],
			[	
				'email.required'=>'vui lòng nhập email',
				'email.email'=>'vui lòng nhập đúng định dạng email',
				'email.unique'=>'email đã được sử dụng',
				'password.required'=>'vui lòng nhập nhập mật khẩu',
				'password.min'=>'mật khẩu chứa tối thiểu 8 ký tự',
				'password.max'=>'mật khẩu chứa tối đa 32 ký tự',
				'full_name.required'=>'vui lòng nhập tên đầy đủ của bạn',
				're_password.required'=>'bạn cần xác nhận lại mật khẩu',
				're_password.same'=>'mật khẩu không giống nhau',
			]);
		$user = new User();
		$user->full_name=$req->full_name;
		$user->email=$req->email;
		$user->phone=$req->phone;
		$user->password=hash::make($req->password);
		$user->address=$req->address;
		$user->save();
		return redirect()->back()->with('thanhcong','chúc mừng bạn đã đăng ký thành công');
	}
	public function postLogin(Request $req){

		$this->validate($req,
			[
				'email'=>'required|email',
				'password'=>'required|min:6|max:32'
			],
			[
				'email.required'=>'vui lòng điền đầy đủ email',
				'email.email'=>'vui lòng điền đúng định dạng email',
				'password.required'=>'vui lòng nhập mật khẩu',
				'password.min'=>'Mật khẩu phải chứa ít nhất 6 ký tự',
				'password.max'=>'Mật khẩu chỉ chứa tối đa 32 ký tự',

			]);

		$credentials = array('email'=>$req->email,'password'=>$req->password);

		if (Auth::attempt($credentials)) {

			
			return redirect()->back()->with(['flag'=>'success','message'=>'Bạn đã đăng nhập thành công']);
		}
		else{
			
			return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
		}

	}
	public function getLogout(){
		Auth::logout();
		return redirect()->route('trang-chu');
	}
	public function getSearch(Request $req){
		$product = Product::where('name','like','%'.$req->key.'%')
			->orWhere('unit_price',$req->key)
			->get();
		return view('page.search',compact('product'));
	}
}
