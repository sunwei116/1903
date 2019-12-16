@extends('admin.layouts.common')
@section('content')
<body>
    <form class="layui-form">
                <div class="layui-form-item">
                    <label for="level-name" class="layui-form-label">
                        <span class="x-red">*</span>角色名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="role_name" name="role_name" required="" lay-verify="required"
                        autocomplete="off"  class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save" lay-submit="submit">
                        添加
                    </button>
                </div>
            </form>
    <script>

    </script>
</body>
</html>

@endsection
