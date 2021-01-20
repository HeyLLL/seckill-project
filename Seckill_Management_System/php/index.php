<?php
session_start();
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
    <?php
    if(isset($_SESSION['is_login'])&&$_SESSION['is_login']){?>
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
                    您已进入秒杀系统管理平台！
                    <span>在平台中，您可以进行以下操作</span>
                    <p># 普通用户与管理员用户的查看与管理</p>
                    <p># 秒杀商品的查看与管理</p>
                    <p># 秒杀订单的查看与管理</p>
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
    <?php }else{
        header('Location:../background_login.html');
    }
    ?>
</body>
</html>
