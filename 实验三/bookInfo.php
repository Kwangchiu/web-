<?php
    /*
    $dbhost = 'localhost';//主机端口
    $dbuser = 'root';//mysql用户名
    $dbpass = '123456';//mysql用户名密码
    */
    error_reporting(0);
    $book = $_POST["book"];
    $publisher = $_POST["publisher"];
    $price = $_POST["price"];

    $con = mysqli_connect("localhost" , "root", "");
    if(!$con)
    {
        die('Could not connect:'.mysqli_error());
    }


    //数据库中建表
    mysqli_select_db($con, "my_db");
    $bookInfo = "create table bookInfo
    (
        book varchar(25),
        publisher varchar(25),
        price varchar(15),
        quantity varchar(15)
    )";
   /* 
    $sql = "insert into bookInfo(book, publisher, price)
    values ('Web technology', 'Springer press', 5.0);";
    $sql .= "insert into bookInfo(book, publisher, price)
    values ('mathematics','ACM press', 6.2);";
    $sql .= "insert into bookInfo(book, publisher, price)
    values ('principle of OS','Science press', 10);";
    $sql .= "insert into bookInfo(book, publisher, price)
    values ('heory of matrix','High education press', 7.8)";
    */
    if (mysqli_multi_query($con, $sql)) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

   mysqli_query($con, $bookInfo);

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