<?php
session_start();
if(isset($_SESSION['is_login'])&&$_SESSION['is_login']){
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>后台登录-X-admin1.1</title>
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
    <div class="container">
        <div class="logo"><a href="./index.php">X-ADMIN V1.1</a></div>
        <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
        <ul class="layui-nav right" lay-filter="">
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo $_SESSION['username']?></a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="./change_password.php">修改密码</a></dd>
                    <dd><a href="./logout.php">退出</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="./index.php">后台首页</a></li>
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
                        <a href="./index.php">
                            <i class="iconfont">&#xe761;</i>
                            欢迎页面
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                    </li>
                    <li class="list" current>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            用户管理
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="user_management.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    普通用户
                                </a>
                            </li>
                            <li>
                                <a href="./admin_management.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    管理员
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list">
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            秒杀商品及活动管理
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="seckill_goods_management.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    秒杀商品列表
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list" >
                        <a href="seckill_order_list.php">
                            <i class="iconfont">&#xe6a3;</i>
                            秒杀订单查看
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="content">
                <form class="layui-form layui-form-pane" action="do_add_secgoods.php" method="post">
                    <label class="login-title" for="password">秒杀商品id</label>
                    <div class="layui-form-item">
                        <div class="layui-input-inline login-inline">
                            <input type="text" name="goods_id" lay-verify="required" placeholder="请输入秒杀商品id" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <label class="login-title" for="password">秒杀商品价格</label>
                    <div class="layui-form-item">
                        <div class="layui-input-inline login-inline">
                            <input type="text" name="goods_price" lay-verify="required" placeholder="请输入秒杀商品价格" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <label class="login-title" for="password">秒杀商品库存</label>
                    <div class="layui-form-item">
                        <div class="layui-input-inline login-inline">
                            <input type="text" name="goods_stock" lay-verify="required" placeholder="请输入秒杀商品库存" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <label class="login-title" for="password">秒杀商品开始时间</label>
                    <div class="layui-form-item">
                        <div class="layui-input-inline login-inline">
                            <input type="text" name="start_date" lay-verify="required" placeholder="HH-MM-DD hh-mm-ss" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <label class="login-title" for="password">秒杀商品结束时间</label>
                    <div class="layui-form-item">
                        <div class="layui-input-inline login-inline">
                            <input type="text" name="end_date" lay-verify="required" placeholder="HH-MM-DD hh-mm-ss" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">提交</button>
                </form>
                <!-- 右侧内容框架，更改从这里结束 -->
            </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved. 本后台系统由X前端框架提供前端技术支持</div>
    </div>
    <!-- 底部结束 -->
    <!-- 背景切换开始 -->
    <div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="./images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
    </div>
    <!-- 背景切换结束 -->
    </body>
    </html>

    <?php
}else{
    header('Location:../background_login.html');
}
?>



