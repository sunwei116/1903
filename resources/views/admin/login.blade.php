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
    <div class="login-logo"><h1>X-ADMIN V1.1</h1></div>
    <div class="login-box">
        <form class="layui-form layui-form-pane" action="">

            <h3>登录你的帐号</h3>
            <label class="login-title" for="username">帐号</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="user_name" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="form-actions" margin-top:30px;>
                <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">登录</button>
                <div class="forgot"><a href="{{url('admin/register')}}" class="forgot">没有账号？去注册</a></div>
            </div>
        </form>
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
    <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form();
              //监听提交
              form.on('submit(login)', function(data){
                // layer.msg(JSON.stringify(data.field),function(){
                //     location.href='index.html'
                // });
                  $.ajax({
                      url: "{{url('admin/login_do')}}",
                      method: "POST",
                      dataType: "JSON",
                      data: data.field,
                      success: function (res) {
                          layer.msg(res,{icon:5});
                      }
                  });
                return false;
              });
            });
        })

    </script>
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>
<style>

</style>
