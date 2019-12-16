@extends('admin.layouts.common')
@section('content')
    <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-block">
                <input type="text" name="category_name" autocomplete="off" placeholder="请输入" lay-verify="required" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <button 	class="layui-btn layui-btn-radius layui-btn-normal" lay-submit lay-filter="demo2" type="submit">添加</button>
            <a href="{{url('admin/category_list')}}" class="layui-btn layui-btn-radius layui-btn-warm">分类列表</a>
        </div>
    </form>

    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form();

            //监听提交
            form.on('submit(demo2)', function(data){
                $.ajax({
                    url: "{{url('admin/category_add_do')}}",
                    data: data.field,
                    dataType: "JSON",
                    method: "POST",
                    success: function (res) {
                            layer.msg(res.message,{icon:5,time:2000});
                    }
                });
                return false;
            });

        });
    </script>
@endsection
