@extends('admin.layouts.common')
@section('content')
    <form action="" class="layui-form">
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="content">
                <!-- 右侧内容框架，更改从这里开始 -->
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-block">
                            <input type="text" name="admin_name" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号</label>
                        <div class="layui-input-block">
                            <input type="text" name="mobile" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="email" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码框</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
{{--                        <div class="layui-form-mid layui-word-aux">辅助文字</div>--}}
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">成为皇上</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_admin" value="1" title="是">
                            <input type="radio" name="is_admin" value="2" title="否" checked>
                        </div>
                    </div>
                   {{-- <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            <span class="x-red">*</span>确认密码
                        </label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>--}}
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-submit lay-filter="add"   type="submit">
                            增加
                        </button>
                    </div>
                </form>
                <!-- 右侧内容框架，更改从这里结束 -->
            </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    </form>
    <script>
        $(function  () {
            layui.use('form', function(){
                var form = layui.form();
                //监听提交
                form.on('submit(add)', function(data){
                    // layer.msg(JSON.stringify(data.field),function(){
                    //     location.href='index.html'
                    // })
                    $.ajax({
                        url: "{{url('admin/admin_add')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: data.field,
                        success: function (res) {
                            if (res.code == 2 && res.message == '登录成功'){
                                layer.msg(res.message,{icon:5,time:2000},function () {
                                    location.href='{{url("admin/index")}}';
                                });
                            }else{
                                layer.msg(res.message,{icon:5,time:2000});
                            }
                        }
                    });

                    return false;
                });
            });
        })
    </script>
@endsection