<?php
session_start();
//获取提交数据
$name = $_POST["username"];
$pwd = md5($_POST["password"]);

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

//数据库查询用户名和密码
$sql='select * from t_admin where username='."'{$name}'and password="."'{$pwd}';";
$res=mysqli_query($con,$sql);
$row=$res->num_rows;
if($row!=0)
{
    $_SESSION['is_login']=TRUE;
    $_SESSION['username']=$name;
    header('Location:./index.php');
}
else
{
    $_SESSION['is_login']=FALSE;
    ?>
    <script type="text/javascript">
        alert("用户名或密码错误，登录失败");
        window.location.href="../background_login.html";
    </script>
    <?php
}
?>

