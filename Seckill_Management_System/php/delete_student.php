<?php
session_start();
if(isset($_SESSION['is_login'])&&$_SESSION['is_login']){
    $goods_id=$_GET['goods_id'];

    //连接数据库
    $db_host="localhost";
    $db_user="root";        //数据库用户名
    $db_pwd="rootroot";         //数据库密码
    $db_name="seckill";        //数据库库名
    $db_port=3306;          //数据库端口号
    $con=mysqli_connect($db_host,$db_user,$db_pwd,$db_name,$db_port);
    if(!$con){
        die("error:".mysqli_connect_error());
    }
    $res1=mysqli_query($con,'select * from t_seckill_goods where goods_id='."'{$goods_id}';");
    $res1_num=$res1->num_rows;
    if($res1_num==0){
        ?>
        <script type="text/javascript">
            alert("该商品不存在");
            window.location.href="user_management.php";
        </script>
        <?php
    }else{
        $sql2='DELETE FROM t_seckill_goods WHERE goods_id='."'{$goods_id}';";
        $res2=mysqli_query($con,$sql2);
        if($res2){
            ?>
            <script type="text/javascript">
                alert("删除成功");
                window.location.href="user_management.php";
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("删除失败");
                window.location.href="user_management.php";
            </script>
            <?php
        }
    }
}else{
    header('Location:../background_login.html');
}
?>
