<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    //Hiển thị ra trang chủ
    public function getIndex(){
        $slide = Slide::all();

        $new_product = Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        $sp_uathich = Product::where('promotion_price','==',0)->paginate(4);
        //return view('page.trangchu',['slide'=>$slide]);   //cách 1
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai','sp_uathich')); //cách 2
    }

    //loại sản phẩm
    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    //Chi tiết sản phẩm
    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(5);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sanpham_khuyenmai'));
    }

    //Trang liên hệ
    public function getLienhe(){
        return view('page.lienhe');
    }

    //Trang giới thiệu
    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    //Thêm giỏ hàng
    public function getAddtoCart(Request $req,$id){

        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        
        return redirect()->back();
    }

    //Xóa giỏ hàng
    public function getDelItemCart($id){

         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
        // $a=$cart->items["$id}"];
        // return view('page.test',compact('a'));
        $cart->removeItem($id);
        if (count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->back();
        
    }

    //Lưu thông tin vào trong Database dạng get
    public function getCheckout(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            // dd($cart);
            return view('page.dat_hang',[
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty 
            ]);
        }
        else{
            return view('page.dat_hang');
        }
        
    }

    //Lưu thông tin vào trong Database dạng post
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');
        // dd($cart);
        $customer = new Customer;
        $customer->name = $req->full_name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $value['item']['id']; //$key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');

    }


    //Đăng kí tài khoản
    public function getSignin(){
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập Email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu ít nhất 20 kí tự',
                'fullname.required'=>'Họ tên là bắt buộc'
            ]
        );
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->route('dangnhap'); //back()->with('thanhcong','Tạo tài khoản thành công');
    }

    //Đăng nhập
    public function getLogin(){
        return view('page.dangnhap');
    }

    public  function  postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu ít nhất 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if (Auth::attempt($credentials)){
            return redirect()->route('trang-chu'); //back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    //Đăng xuất
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    //Chức Năng Tìm Kiếm
    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                        ->orWhere('unit_price',$req->key)
                        ->get();
        return view('page.search', compact('product'));
    }
}

