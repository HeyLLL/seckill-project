<?php
session_start();
if(isset($_SESSION['is_login'])&&$_SESSION['is_login']){
    $username=$_POST['username'];
    $password = md5($_POST['password']);
    $date = date('Y-m-d H:i:s');

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
    $res1=mysqli_query($con,'select * from t_admin where username='."'{$username}';");
    $res1_num=$res1->num_rows;
    if($res1_num>0){
        ?>
        <script type="text/javascript">
            alert("该管理员已存在");
            window.location.href="./index.php";
        </script>
        <?php
    }else{
        $sql2="insert into t_admin(username,password,last_login_date) values('$username','$password','$date');";

        $res2=mysqli_query($con,$sql2);
        if($res2){
            ?>
            <script type="text/javascript">
                alert("添加成功");
                window.location.href="./index.php";
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("添加失败");
                window.location.href="./index.php";
            </script>
            <?php
        }
    }
}else{
    header('Location:../background_login.html');
}
?>

