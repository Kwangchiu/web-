<?php
    /*
    $dbhost = 'localhost';//主机端口
    $dbuser = 'root';//mysql用户名
    $dbpass = '123456';//mysql用户名密码
    */

    error_reporting(0);
    $name = $_POST["cname"];
    $WT = $_POST["WT"];
    $MT = $_POST["MT"];
    $PO = $_POST["PO"];
    $TM = $_POST["TM"];

    if($WT == "") $WT == 0;
    if($MT == "") $MT == 0;
    if($PO == "") $PO == 0;
    if($TM == "") $TM == 0;
    
    $con = mysqli_connect("localhost" , "root", "");
    if(!$con)
    {
        die('Could not connect:'.mysqli_error());
    }


    //数据库中建表
    mysqli_select_db($con, "my_db");
    $orderInfo = "create table orderInfo
    (
        name varchar(15),
        book varchar(25),
        quantity varchar(15)
    )";

    /*
    $sql = "insert into orderInfo(name, book, quantity)
    values ('$name', 'Springer press', 5.0)";
   */

    $sql = "insert into orderInfo(name, book, quantity)
    values ('$name', 'Web technology', '$WT');";
    $sql .= "insert into oderInfo(name, book, quantity)
    values ('$name', 'mathematics', '$MT');";
    $sql .= "insert into bookInfo(name, book, quantity)
    values ('$name', 'principle of OS', '$PO');";
    $sql .= "insert into bookInfo(name, book, quantity)
    values ('$name', 'Theory of matrix', '$TM')";
    
    
    if (mysqli_multi_query($con, $sql)) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

   mysqli_query($con, $orderInfo);

    mysqli_close($con);
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
        <p><h1> 书籍信息表 </h1></p>
        <table border = "5">
            <tr>
                <td>book</td>
                <td>publisher</td>
                <td>price</td>
            </tr>
            <tr>
                <td>
                    <?php echo $book;?>
                </td>   
                <td>
                    <?php echo $publisher;?>
                </td>
                <td>
                    <?php echo $price;?>
                </td>
            </tr>
        </table>
    </body>
</html>