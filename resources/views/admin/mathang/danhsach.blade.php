     @extends('admin.layout.index')
    @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">mặt hàng
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>nhóm</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Giá Sale</th>
                                <th>đơn vị</th>
                                <th>ảnh</th>
                                <th>new</th>
                                <th>xóa</th>
                                <th>sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mathang as $mh)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$mh->id}}</td>
                                    <td>{{$mh->name}}</td>
                                    <td>{{$mh->id_type}}</td>
                                    <td>{{$mh->description}}</td>
                                    <td>{{$mh->unit_price}}</td>
                                    <td>{{$mh->promotion_price}}</td>
                                    <td>{{$mh->unit}}</td>
                                    <td><img src="xuanngoc/image/product/{{$mh->image}}" height="100px"></td>
                                    <td>{{$mh->new}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/mathang/xoa/{{$mh->id}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/mathang/sua/{{$mh->id}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection