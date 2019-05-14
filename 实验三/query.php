<?php
    /*
    $dbhost = 'localhost';//主机端口
    $dbuser = 'root';//mysql用户名
    $dbpass = '123456';//mysql用户名密码
    */
    $name = $_POST["name1"];
    $con = mysqli_connect("localhost" , "root", "");
    if(!$con)
    {
        die('Could not connect:'.mysqli_error());
    }
    mysqli_select_db($con, "my_db");
    $result = mysqli_query($con,"select name,x.book,publisher,x.quantity
                            from orderInfo x,bookInfo y
                            where name = '$name' and x.book = y.book");
    /*if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            var_dump($row);
        }
    }
    else{
        echo "0结果";
    }*/
   
?>  

<html lang = "en">
    <head>
        <meta charset = "utf-8">
    </head>
    <style>
        body
        {
            background-image:url("b.jpg");
            background-repeat:no-repeat;
        }
    </style>

    <body>
        <p><h1> 人物信息表 </h1></p>
        <table border = "5">
            <tr>
                <td>name</td>
                <td>book</td>
                <td>publisher</td>
                <td>quantity</td>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result))
            {
                //var_dump($row);
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['book']; ?></td>
                <td><?php echo $row['publisher']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
            <?php
            }        
            
            ?>
        </table>
    </body>
</html>

<?php

mysqli_close($con);
?>
