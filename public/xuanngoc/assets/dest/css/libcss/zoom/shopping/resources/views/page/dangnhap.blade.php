<?php
/**
 * Created by PhpStorm.
 * User: 8470p
 * Date: 9/1/2018
 * Time: 2:59 PM
 */
?>
@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-sm-3"></div>
                @if(Session::has('flag'))
                    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                @endif
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection