@extends('admin.layouts.common')
@section('content')
    <table class="layui-table">
        <thead>
        <tr>
            <th>商品ID</th>
            <th>商品名称</th>
            <th>商品图片</th>
            <th>市场价格</th>
            <th>库存</th>
            <th>是否上架</th>
            <th>是否精品</th>
            <th>是否热销产品</th>
            <th>是否新品</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($data as $v)
            <tbody>
            <tr  category_id="{{$v['category_id']}}">
                <td>{{$v->goods_id}}</td>
                <td class="update">{{$v->goods_name}}</td>
                <td><img src="{{$v->goods_img}}" width="130px" height="120px"></td>
                <td>{{$v->market_price}}</td>
                <td>{{$v->goods_stock}}</td>
                <td>@if($v->is_sale==1) 是 @else 否 @endif</td>
                <td>@if($v->is_best==1) 是 @else 否 @endif</td>
                <td>@if($v->is_host==1)  是 @else 否 @endif</td>
                <td>@if($v->is_new==1) 是 @else 否 @endif</td>
                
                <td>
                    <a href="javascript:;" class="del" goods_id="{{$v->goods_id}}">删除</a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    <script>
        $(function(){
            $('.del').click(function(){
                var _this=$(this);
                var goods_id=$(".del").attr("goods_id");


                $.ajax({
                    type:'post',
                    data:{'goods_id':goods_id},
                    dataType:'json',
                    url:'/admin/goods_del',
                    success:function(msg)
                    {
                        if(msg.error==1){
                            _this.parents('tr').hide();
                            alert(msg.result);
                        }
                    }
                });
            });
        })
    </script>
@endsection
