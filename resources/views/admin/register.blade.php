<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin1.1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('static/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/xadmin.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="{{asset('static/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/swiper.jquery.min.js')}}"></script>
    <script src="{{asset('static/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('static/js/xadmin.js')}}"></script>

</head>
<body>
<div class="" align="center"><h1>X-ADMIN V1.1</h1></div>
<div class="login-box">
    <div class="layui-form layui-form-pane" action="">

        <label class="login-title" for="username">帐号</label>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="admin_name" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input">
            </div>
        </div>

        <label class="login-title" for="password">密码</label>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="password" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <label class="login-title" for="username">手机号</label>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="mobile" lay-verify="required" placeholder="请输入你的手机号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <label class="login-title" for="email">邮箱</label>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="email" name="email" lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="form-actions">

            <button class="btn btn-warning pull-right" lay-submit lay-filter="login" >点击注册</button>
            <div class="forgot"><a href="{{url('admin/login')}}" class="forgot">返回登录页面</a></div>
        </div>
    </div>
</div>
<div class="bg-changer">
    <div class="swiper-container changer-list">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/a.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/b.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/c.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/d.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/e.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/f.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/g.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/h.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/i.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/j.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('static/images/k.jpg')}}" alt=""></div>
            <div class="swiper-slide"><span class="reset">初始化</span></div>
        </div>
    </div>
    <div class="bg-out"></div>
    <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
</div>
</body>
</html>
<script>
        $(function(){
            $(document).on('click','.btn',function () {
                var admin_name=$("input[name='admin_name']").val();
                var password=$("input[name='password']").val();
                var mobile=$("input[name='mobile']").val();
                var email=$("input[name='email']").val();
                data={};
                data.admin_name=admin_name;
                data.password=password;
                data.mobile=mobile;
                data.email=email;
                $.ajax({
                    type:'post',
                    data:data,
                    dataType:'json',
                    url:'register',
                    success:function(res){
                        if(res.error==1){
                            alert("注册成功 即将跳转登录页面");
                            window.location.href="{{url('admin/login')}}";
                        }else{
                            alert('页面错误');
                            window.location.href="{{url('admin/register')}}";
                        }
                    }
                });
            });

        });
</script>
<style>
    .form-actions{
        margin-top:30px;
    }

    .login-box
    {
        width:400px;
    }
</style>

