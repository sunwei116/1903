@extends('admin.layouts.common')
@section('content')
    <table class="layui-table">
        <thead>
        <tr>
            <th>用户名称</th>
            <th>邮箱</th>
            <th>手机号</th>
            <th>添加时间</th>
            <th>是否为皇上</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($data as $k => $v)
        <tbody>
        <tr admin_id="{{$v['admin_id']}}">
            <td>{{$v['admin_name']}}</td>
            <td>{{$v['email']}}</td>
            <td>{{$v['mobile']}}</td>
            <td>{{$v['create_time']}}</td>
            <td  class="is">
                @if ( $v['is_admin'] == 1 ) <a href="javascript:;">是</a> @else <a href="javascript:;">否</a> @endif
            </td>
            <td>
                <a href="javascript:;" class="layui-btn layui-btn-danger del">删除</a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
    <script>
        //修改
        $(document).on('click','.is',function () {
            var _this = $(this);
            var is_admin = _this.text();
            var admin_id = _this.parent('tr').attr('admin_id')
            $.ajax({
               url: "{{url('admin/is_admin_update')}}",
                method: "POST",
                dataType: "JSON",
                data: {admin_id:admin_id,is_admin:is_admin},
                success: function (res) {
                    if (res.code == 2 && res.message == '修改成功'){
                        layer.msg(res.message,{icon:5,time:2000},function () {
                            window.location.reload()  //刷新页面
                        });
                    }else{
                        layer.msg(res.message,{icon:5,time:2000});
                    }
                }
            });
        });
        //删除

        $(document).on('click','.del',function () {
            var admin_id = $(this).parents('tr').attr('admin_id');
            $.ajax({
                url: "{{url('admin/admin_del')}}",
                type: "POST",
                dataType: "JSON",
                data: {admin_id:admin_id},
                success: function (res) {
                    if (res.code == 2 && res.message == '删除成功'){
                        layer.msg(res.message,{icon:5,time:2000},function () {
                            window.location.reload()  //刷新页面
                        });
                    }else{
                        layer.msg(res.message,{icon:5,time:2000});
                    }
                }
            })
        })
    </script>
@endsection