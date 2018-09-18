@extends('master')
@section('content') 
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">thêm hàng</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="index.html">Home</a> / <span>Đăng kí</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="container">
        <div id="content">
            
            <form action="{{route('sigin')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>

                        
                        <div class="form-block">
                            <label for="email">Địa chỉ email:</label>
                            <input type="email" name="email"id="email" placeholder="Địa chỉ email" required>
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Tên đầy đủ:</label>
                            <input type="text" name="full_name" id="your_last_name" placeholder="Họ & Tên" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Địa chỉ:</label>
                            <input type="text" name="address" id="adress" placeholder="Địa chỉ" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" name="phone" id="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Mật khẩu:</label>
                            <input type="text" name="password" id="password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">RNhập lại mật khẩu:</label>
                            <input type="text" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection