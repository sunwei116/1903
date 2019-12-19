@extends('admin.layouts.common')
@section('content')
    <table class="layui-table">
        <thead>
        <tr>
            <th>所属商品名称</th>
            <th>轮播图</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($data as $v)
            <tbody>
            <tr>
                <td>{{$v->goods_name}}</td>
                <td><img src="{{$v->img}}" width="240"></td>
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
