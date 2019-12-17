@extends('admin.layouts.common')
@section('content')

    <script src="/js/uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <div class="layui-form layui-form-pane">

        <div class="layui-form-item">
            <label class="layui-form-label">商品轮播图</label>
            <div class="layui-input-block">
                <input type="file" name="img"  class="layui-input" id="uploadify">
                <input type="hidden" name="img">
            </div>
        </div>


        <div class="layui-form-item" pane="">
            <label class="layui-form-label">是否显示</label>
            <div class="layui-input-block">
                <input type="radio" name="is_show" value="1" title="是" checked="">
                <input type="radio" name="is_show" value="0" title="否">
            </div>
        </div>

        <div class="layui-input-inline">
            <select name="goods_id">
                <option value="goods_id">请选择</option>
                @foreach($data as $v)
                    <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">提交</button>
        </div>
    </div>


    <script>
        $(function () {
            $("#uploadify").uploadify({
                'swf':'/js/uploadify/uploadify.swf',
                'uploader':'/admin/images_add',
                'onUploadSuccess':function(file,msg,data){
                    $("input[name='img']").html(msg);
                }
            });

            $(document).on('click','.layui-btn',function () {
                var data={};
                data.img=$("input[name='img']").text();
                data.is_show= $("input[name='is_show']:checked").val();
                data.goods_id= $("select[name='goods_id']").val();


                $.ajax({
                    type:'post',
                    data:data,
                    dataType:'json',
                    url:'/admin/images',
                    success:function(msg){
                        if(msg.error==1)
                        {
                            alert(msg.data);
                        }else{
                            alert(msg.data);
                        }
                    }
                });

            });

        })
    </script>

@endsection
