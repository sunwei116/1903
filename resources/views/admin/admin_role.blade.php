@extends('admin.layouts.common')
@section('content')
    <form class="layui-form  layui-form-pane" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">选择用户</label>
            <div class="layui-input-block">
                <select name="city" lay-verify="required" id="sel">
                    <option value=""></option>
                @foreach($admin as $k => $v)
                        <option value="{{$v['admin_id']}}">{{$v['admin_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">角色选择</label>
            <div class="layui-input-block">
                @foreach($role as $k => $v)
                    <input type="checkbox" name="text" title="{{$v['role_name']}}" value="{{$v['role_id']}}">
                @endforeach
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn sb" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form();

            $(document).on('click','.sb',function () {
                var arr = new Array();
                $("input[type=checkbox]:checked").each(function(i){
                    arr.push($(this).val())
                });
                var options = $("#sel option:selected");
                var admin_id = options.val();
                $.ajax({
                    url: "{{url('admin/admin_role')}}",
                    type: "POST",
                    dataType: "JSON",
                    data: {admin_id:admin_id,arr},
                    success: function (res) {

                    }
                });
                return false;

            });


        });
    </script>
@endsection