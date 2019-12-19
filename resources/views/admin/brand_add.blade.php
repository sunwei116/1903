@extends('admin.layouts.common')
@section('content')
    <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">品牌名称</label>
            <div class="layui-input-block">
                <input type="text" name="brand_name" autocomplete="off" placeholder="请输入" lay-verify="required" class="layui-input name">
            </div>
        </div>
        <!-- <div class="layui-form-item">
            <label class="layui-form-label">品牌logo</label>
            <div class="layui-input-block">
                <input type="file" name="brand_logo" lay-verify="required" class="layui-input logo">
            </div>
        </div> -->

        <div class="layui-form-item">
            <label class="layui-form-label">品牌描述</label>
            <div class="layui-input-block">
                <textarea name="brand_desc" lay-verify="required" class="layui-textarea textarea" placeholder="请描述"></textarea>
                <!-- <input type="text" name="brand_name" autocomplete="off" placeholder="请输入" lay-verify="required" class="layui-input"> -->
            </div>
        </div>

        <div class="layui-form-item">
            <button class="layui-btn btn" lay-submit lay-filter="demo2" type="button">添加</button>
        </div>
    </form>

    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <!-- <script src="/jq.js"></script> -->
    <script>
        $('.btn').on('click',function(){
            var brand_name = $("[name='brand_name']").val();
            var brand_desc = $("[name='brand_desc']").val();
            $.ajax({
                url:"brand_add_do",
                type:'POST',
                data:{brand_name:brand_name,brand_desc:brand_desc},
                dataType:'json',
                success:function(res){
                    if(res.ret==1){
                        alert(res.res);
                        location.href="{{url('admin/brand_list')}}";
                    }else{
                        alert(res.res);
                    }
                }
            })
        })
    </script>
@endsection
