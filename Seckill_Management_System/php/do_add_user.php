<?php
session_start();
if(isset($_SESSION['is_login'])&&$_SESSION['is_login']){
    $user_id=$_POST['user_id'];
    $password = $_POST['password'];
    $nickname = $_POST['nickname'];
    $salt = "1a2b3c4d";

    $from_pass = md5("".substr($salt , 0 , 1).substr($salt , 2 , 1).$password.substr($salt , 5 , 1).substr($salt , 4 , 1));
    $db_pass = md5("".substr($salt , 0 , 1).substr($salt , 2 , 1).$from_pass.substr($salt , 5 , 1).substr($salt , 4 , 1));;
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
    $res1=mysqli_query($con,'select * from t_user where id='."'{$user_id}';");
    $res1_num=$res1->num_rows;
    if($res1_num>0){
        ?>
        <script type="text/javascript">
            alert("该用户已存在");
            window.location.href="./index.php";
        </script>
        <?php
    }else{
        $sql2="insert into t_user(id,nickname,password,salt,register_date) values('$user_id','$nickname','$db_pass','$salt','$date')";
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

