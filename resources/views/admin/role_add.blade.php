@extends('admin.layouts.common')
@section('content')
<body>
    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">角色名称</i></label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="role_name" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">角色说明</label>
            <div class="layui-input-block">
                <textarea name="centent" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即添加</button>
            </div>
        </div>
            </form>
    <script>
        layui.use('form', function(){
            var form = layui.form();

            //监听提交
            form.on('submit(formDemo)', function(data){
                $.ajax({
                    url: "{{url('admin/role_add')}}",
                    method: "POST",
                    dataType: "JSON",
                    data: data.field,
                    success: function (res) {
                        if (res.code == 2 && res.message == '添加成功'){
                            layer.msg(res.message,{icon:5,time:2000},function () {
                                location.href='{{url("admin/role_list")}}';
                            });
                        }else{
                            layer.msg(res.message,{icon:5,time:2000});
                        }
                    }
                });
                return false;
            });
        });
    </script>
@endsection
