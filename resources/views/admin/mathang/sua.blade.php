    @extends('admin.layout.index')
    @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br>
                                @endforeach
                            </div>
                        @endif 
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <h1 class="page-header">Loại Tin
                            <small>{{$mathang['name']}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/mathang/sua/{{$mathang->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select name="theloai" class="form-control">
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên mặt hàng</label>
                                <input class="form-control" name="Ten" placeholder="nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <input class="form-control" name="Mota" placeholder="Mô tả sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input class="form-control" name="unitPrice" placeholder="giá sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mại</label>
                                <input class="form-control" name="promotionPrice" placeholder="Giá khuyến mại" />
                            </div>
                            <div class="form-group">
                                <label>chọn ảnh</label>
                                <input class="form-control" name="" placeholder="nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>đơn vị tính</label>
                                <input class="form-control" name="unit" placeholder="đơn vị sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>sản phẩm mới</label>
                                <input class="form-control" name="new" placeholder="nếu mới chọn 1 còn cũ chọn 0" />
                            </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection