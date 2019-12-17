
@extends('admin.layouts.common')
@section('content')
    <table class="layui-table">
        <thead>
        <tr>
            <th>编号</th>
            <th>角色名称</th>
            <th>添加时间</th>
            <th>角色描述</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($data as $k => $v)
            <tbody>
            <tr role_id="{{$v['role_id']}}">
                <td>{{$v['role_id']}}</td>
                <td>{{$v['role_name']}}</td>
                <td>{{$v['create_time']}}</td>
                <td>{{$v['centent']}}</td>
                <td>
                    <a href="javascript:;" class="layui-btn layui-btn-danger del">删除</a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    <script>
        {{--//修改--}}
        {{--$(document).on('click','.is',function () {--}}
        {{--    var _this = $(this);--}}
        {{--    var is_admin = _this.text();--}}
        {{--    var role_id = _this.parent('tr').attr('role_id')--}}
        {{--    $.ajax({--}}
        {{--        url: "{{url('admin/is_admin_update')}}",--}}
        {{--        method: "POST",--}}
        {{--        dataType: "JSON",--}}
        {{--        data: {admin_id:admin_id,is_admin:is_admin},--}}
        {{--        success: function (res) {--}}
        {{--            if (res.code == 2 && res.message == '修改成功'){--}}
        {{--                layer.msg(res.message,{icon:5,time:2000},function () {--}}
        {{--                    window.location.reload()  //刷新页面--}}
        {{--                });--}}
        {{--            }else{--}}
        {{--                layer.msg(res.message,{icon:5,time:2000});--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        //删除

        $(document).on('click','.del',function () {
            var role_id = $(this).parents('tr').attr('role_id');
            $.ajax({
                url: "{{url('admin/role_del')}}",
                type: "POST",
                dataType: "JSON",
                data: {role_id:role_id},
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