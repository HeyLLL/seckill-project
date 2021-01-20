<?php
session_start();
if(isset($_SESSION['is_login'])&&$_SESSION['is_login']){
    $username=$_SESSION['username'];
    $srcpassword=md5($_POST['srcpassword']);
    $password=md5($_POST['password']);
    $assertpassword=md5($_POST['assertpassword']);
    if($password!=$assertpassword){
        ?>
        <script type="text/javascript">
            alert("两次输入密码不一致，请重新输入！");
            window.location.href="./change_password.php";
        </script>
        <?php
    }else{
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
        $sql='select * from t_admin where username='."'{$username}'and password="."'{$srcpassword}';";
        $res=mysqli_query($con,$sql);
        $row=$res->num_rows;
        if($row==0){
            ?>
            <script type="text/javascript">
                alert("初始密码错误，请重新输入！");
                window.location.href="./change_password.php";
            </script>
            <?php
        }else{
            $sql1='update t_admin set password='."'{$password}' where username="."'{$username}';";
            $res1=mysqli_query($con,$sql1);
            if($res1){
                ?>
                <script type="text/javascript">
                    alert("密码修改成功");
                    window.location.href="../background_login.html";
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert("密码修改失败");
                    window.location.href="./change_password.php";
                </script>
                <?php
            }
        }
    }
}else{
    header('Location:../background_login.html');
}
?>
