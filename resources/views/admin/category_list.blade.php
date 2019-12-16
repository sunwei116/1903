@extends('admin.layouts.common')
@section('content')
    <table class="layui-table">
        <thead>
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($data as $k => $v)
        <tbody>
        <tr  category_id="{{$v['category_id']}}">
            <td>{{$v['category_id']}}</td>
            <td class="update">{{$v['category_name']}}</td>
            <td>{{$v['create_time']}}</td>
            <td>
                <a href="javascript:;" class="del">删除</a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
    <script>
        //删除分类
        $(".del").click(function () {
            var category_id = $(this).parents('tr').attr('create_id');
            console.log(category_id);
            $.ajax({
                url: "{{url('admin/category_del')}}",
                type: "POST",
                dataType: "JSON",
                data: {category_id:category_id},
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
        //修改分类（即点即改）
        $(document).on('click','.update',function () {
            //获取当前对象
            var _this = $(this);
            var category_id = _this.parent('tr').attr('category_id');
            var _text = _this.text();
            if (_this.children('input').length>0){
                return false;
            }
            var input = $('<input type="text">').css({'border':0,'background-color':_this.css('background-color')}).val(_text);
            _this.html(input);
            input.select();
            input.blur(function () {
                $.ajax({
                   url: "{{url('admin/category_update')}}",
                   type: "POST",
                   dataType: "JSON",
                   data: {category_id:category_id,category_name:input.val()},
                   success: function (data) {
                       if (data.code ==2 && data.data == true){
                           layer.msg(data.message,{icon:5,time:2000});
                       } else{
                           window.location.reload()  //刷新页面
                       }

                   } 
                });
            })
        })
    </script>
@endsection