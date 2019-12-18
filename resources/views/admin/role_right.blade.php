@extends('admin.layouts.common')
@section('content')
<form class="layui-form  layui-form-pane" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">选择角色</label>
        <div class="layui-input-block">
            <select name="city" lay-verify="required" id="sel">
                <option value=""></option>
                @foreach($role as $k => $v)
                    <option value="{{$v['role_id']}}">{{$v['role_name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分配权限</label>
        <div class="layui-input-block">
            @foreach($right as $k => $v)
                <input type="radio" name="right" value="{{$v['right_id']}}" title="{{$v['right_name']}}">
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
    layui.use('form', function(){
        var form = layui.form();

        $(document).on('click','.sb',function () {
           var right_id = $("input[name=right]:checked").val();
            if (right_id == undefined) {
                alert('请选择权限');
                return false;
            }
            var options = $("#sel option:selected");
            var role_id = options.val();
            $.ajax({
                url: "{{url('admin/role_right')}}",
                type: "POST",
                dataType: "JSON",
                data: {role_id:role_id,right_id:right_id},
                success: function (res) {
                        layer.msg(res.message,{icon:1,time:2000})
                }
            });
            return false;

        });


    });
</script>
@endsection