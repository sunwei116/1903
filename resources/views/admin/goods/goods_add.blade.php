@extends('admin.layouts.common')
@section('content')
    <div class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" autocomplete="off" placeholder="请输入名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品价格</label>
            <div class="layui-input-block">
                <input type="text" name="title" autocomplete="off" placeholder="请输入价格" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">商品库存量</label>
            <div class="layui-input-block">
                <input type="text" name="title" autocomplete="off" placeholder="请输入库存量" class="layui-input">
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

        <div class="layui-input-inline">
            <select name="quiz2">
                <option value="">所属分类</option>
                <option value="杭州">杭州</option>
                <option value="宁波">宁波</option>

            </select>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文本域</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">提交</button>
        </div>
    </div>

@endsection
