<?php
/**
 * Created by PhpStorm.
 * User: 8470p
 * Date: 8/28/2018
 * Time: 10:53 PM
 */
?>
@extends('master')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="source/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h3>{{$sanpham->name}}</h3></p>
                            <p class="single-item-price">
                                @if($sanpham->promotion_price == 0)
                                    <span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
                                @else
                                    <span class="flash-del">{{number_format($sanpham->unit_price)}}đồng</span>
                                    <span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$sanpham->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Số lượng:</p>
                        <div class="single-item-options">

                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}} </p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                        @foreach($sp_tuongtu as $sptt)
                             <div class="col-sm-4">
                            <div class="single-item">
                                @if($sptt->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div> </div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price">
                                        @if($sptt->promotion_price == 0)
                                            <span class="flash-sale">{{number_format($sptt->unit_price)}}đồng</span>
                                        @else
                                            <span class="flash-del">{{number_format($sptt->unit_price)}}đồng</span>
                                            <span class="flash-sale">{{number_format($sptt->promotion_price)}}đồng</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">{{$sp_tuongtu->links()}}</div>
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">BÁN CHẠY NHẤT</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sanpham_khuyenmai as $banchay1)
                                 <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('chitietsanpham',$banchay1->id)}}"><img src="source/image/product/{{$banchay1->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$banchay1->name}}
                                    <br>
                                    @if($banchay1->promotion_price == 0)
                                        <span class="flash-sale">{{number_format($banchay1->unit_price)}}đồng</span>
                                    @else
                                        <span class="flash-del">{{number_format($banchay1->unit_price)}}đồng</span>
                                        <span class="flash-sale">{{number_format($banchay1->promotion_price)}}đồng</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">SẢN PHẨM MỚI</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sanpham_khuyenmai as $spm)
                                <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',$spm->id)}}"><img src="source/image/product/{{$spm->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$spm->image}}
                                    <br>
                                    @if($spm->promotion_price == 0)
                                        <span class="flash-sale">{{number_format($spm->unit_price)}}đồng</span>
                                    @else
                                        <span class="flash-del">{{number_format($spm->unit_price)}}đồng</span>
                                        <span class="flash-sale">{{number_format($spm->promotion_price)}}đồng</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
    @endsection