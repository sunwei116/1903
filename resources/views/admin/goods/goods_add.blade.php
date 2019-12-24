@extends('admin.layouts.common')
@section('content')

    <script src="/js/uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <div class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="goods_name" autocomplete="off" placeholder="请输入名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品价格</label>
            <div class="layui-input-block">
                <input type="text" name="market_price" autocomplete="off" placeholder="请输入价格" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">商品图片</label>
            <div class="layui-input-block">
                <input type="file" name="gooods_img"  class="layui-input" id="uploadify">
                <input type="hidden" name="goods_img">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">商品库存量</label>
            <div class="layui-input-block">
                <input type="text" name="goods_stock" autocomplete="off" placeholder="请输入库存量" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item" pane="">
            <label class="layui-form-label">是否上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_sale" value="1" title="是" checked="">
                <input type="radio" name="is_sale" value="2" title="否">
            </div>
        </div>

        <div class="layui-form-item" pane="">
            <label class="layui-form-label">是否精品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_best" value="1" title="是" checked="">
                <input type="radio" name="is_best" value="2" title="否">
            </div>
        </div>

        <div class="layui-form-item" pane="">
            <label class="layui-form-label">是否热销</label>
            <div class="layui-input-block">
                <input type="radio" name="is_host" value="1" title="是" checked="">
                <input type="radio" name="is_host" value="2" title="否">
            </div>
        </div>

        <div class="layui-form-item" pane="">
            <label class="layui-form-label">是否上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_new" value="1" title="是" checked="">
                <input type="radio" name="is_new" value="2" title="否">
            </div>
        </div>

       商品分类 <div class="layui-input-inline">
            <select name="category_id">
                <option value="">请选择</option>
                @foreach($data as $v)
                <option value="{{$v->category_id}}">{{$v->category_name}}</option>
                @endforeach
            </select>
        </div>
        &nbsp;
        <br>
        &nbsp;
        <br>
       商品品牌 <div class="layui-input-inline">
            <select name="brand_id">
                <option value="">请选择</option>
                @foreach($brand as $v)
                    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文本域</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" class="layui-textarea" name="goods_desc"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">提交</button>
        </div>
    </div>


    <script>
                $(function () {
                    $("#uploadify").uploadify({
                        'swf':'/js/uploadify/uploadify.swf',
                        'uploader':'/admin/up',
                        'onUploadSuccess':function(file,msg,data){
                            $("input[name='goods_img']").val(msg);
                        }
                    });

                    $(document).on('click','.layui-btn',function () {
                        var data={};
                        data.goods_name=$("input[name='goods_name']").val();
                        data.goods_img=$("input[name='goods_img']").val();
                        data.market_price=$("input[name='market_price']").val();
                        data.goods_stock=$("input[name='goods_stock']").val();
                        data.is_sale= $("input[name='is_sale']:checked").val();
                        data.is_best =$("input[name='is_best']:checked").val();
                        data.is_host =$("input[name='is_host']:checked").val();
                        data.is_new =$("input[name='is_new']:checked").val();
                        data.category_id=$("select[name='category_id']").val();

                       data.goods_desc=$("textarea[name='goods_desc']").val();
                        data.brand_id=$("select[name='brand_id']").val();


                        // data={};
                        // data.goods_name=goods_name;
                        // data.goods_img=goods_img;
                        // data.market_price=market_price;
                        // data.goods_stock=goods_stock;
                        // data.is_sale=is_sale;
                        // data.is_best=is_best;
                        // data.is_host=is_host;
                        // data.is_new=is_new;
                        // data.category_id=category_id;
                        //
                        //
                        $.ajax({
                            type:'post',
                            data:data,
                            dataType:'json',
                            url:'/admin/img_add',
                            success:function(res){
                                if(res.ret==1){
                                    alert(res.res);
                                    location.href="{{url('admin/goods_list')}}";
                                }else{
                                    alert(res.res);
                                }
                            }
                        });

                    });

                })
    </script>

@endsection
