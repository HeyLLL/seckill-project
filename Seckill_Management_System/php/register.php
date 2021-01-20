<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>秒杀商城用户注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/xadmin.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="../lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/xadmin.js"></script>

</head>
<body>
    <!-- 顶部开始 -->
    <div class="login-logo"><h1>注册账号</h1></div>
    <div class="login-box">
        <form class="layui-form layui-form-pane" action="./do_register.php" method="post">
            <label class="login-title" for="username">用户手机号</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                    <input type="text" name="user_id" lay-verify="required" placeholder="请输入你的手机号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <label class="login-title" for="username">用户昵称</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                    <input type="text" name="nickname" lay-verify="required" placeholder="请输入你的昵称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                    <input type="password" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <label class="login-title" for="password">确认密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                    <input type="password" name="assertpassword" lay-verify="required" placeholder="请再次输入你的密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">提交</button>
            </div>
        </form>
    </div>

    <!-- 背景切换开始 -->
    <div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="../images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="../images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
    </div>
    <!-- 背景切换结束 -->
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

