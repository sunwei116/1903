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
<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="./index.html">后台首页</a></div>
    <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="">个人信息</a></dd>
                <dd><a href="">切换帐号</a></dd>
                <dd><a href="{{url('admin/login')}}">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="/">前台首页</a></li>
    </ul>
</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<div class="wrapper">
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li class="list" current>
                    <a href="./index.html">
                        <i class="iconfont">&#xe761;</i>
                        欢迎页面
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                </li>
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        会员管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="member-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                会员列表
                            </a>
                        </li>
                        <li>
                            <a href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                会员删除
                            </a>
                        </li>
                        <li>
                            <a href="member-level.html">
                                <i class="iconfont">&#xe6a7;</i>
                                等级管理
                            </a>
                        </li>
                        <li>
                            <a href="member-kiss.html">
                                <i class="iconfont">&#xe6a7;</i>
                                积分管理
                            </a>
                        </li>
                        <li>
                            <a href="member-view.html">
                                <i class="iconfont">&#xe6a7;</i>
                                浏览记录
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        分类管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('admin/category_list')}}">
                                <i class="iconfont">&#xe6a7;</i>
                                分类列表
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/category_add')}}">
                                <i class="iconfont">&#xe6a7;</i>
                                分类添加
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        轮播管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="./banner-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        管理员管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="./banner-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播列表
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        系统设置
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="./banner-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播列表
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- 左侧菜单结束 -->
        @yield('content')
<!-- 底部开始 -->
{{--<div class="footer">--}}
{{--    <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved. 本后台系统由X前端框架提供前端技术支持</div>--}}
{{--</div>--}}
<!-- 底部结束 -->
    <!-- 背景切换开始 -->
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
    <!-- 背景切换结束 -->
{{--    <script>
        //百度统计可去掉
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>--}}
</body>
</html>