<?php 
    $name = $_POST["cname"];
    $address = $_POST["caddress"];
    $zip = $_POST["czip"];
    $WT = $_POST["WT"];
    $MT = $_POST["MT"];
    $PO = $_POST["PO"];
    $TM = $_POST["TM"];
    $Payment = $_POST["payment"];

    if($WT == "") $WT == 0;
    if($MT == "") $MT == 0;
    if($PO == "") $PO == 0;
    if($TM == "") $TM == 0;

    $WT_cost = 5.0 * $WT;
    $MT_cost = 6.2 * $MT;
    $PO_cost = 10 * $PO;
    $TM_cost = 7.8 * $TM;

    $total_price = $WT_cost + $MT_cost + $PO_cost + $TM_cost;
    $total_items = $WT + $MT + $PO + $TM;  
    $con = mysqli_connect("localhost" , "root", "");
    if(!$con)
    {
        die('Could not connect:'.mysqli_error());
    }

    //创建数据库
  /*  $sql = "create database book_db";
    if(mysqli_query($con,$sql))
    {
        echo "Database created";
    }
    else
    {
        echo "Error creating database:".mysqli_error($con);
    }
    */
    //数据库中建表
    mysqli_select_db($con, "my_db");
    $personInfo = "create table personInfo
    (
        name varchar(15),
        address varchar(15),
        zip varchar(15)
    )";

    mysqli_query($con, $personInfo);

    $sql = "insert into personInfo(name, address, zip)
    values ('$name', '$address', '$zip');";

  
    $sql = "insert into orderInfo(name, book, quantity)
    values ('$name', 'Web technology', '$WT');";
    $sql .= "insert into orderInfo(name, book, quantity)
    values ('$name', 'mathematics', '$MT');";
    $sql .= "insert into orderInfo(name, book, quantity)
    values ('$name', 'principle of OS', '$PO');";
    $sql .= "insert into orderInfo(name, book, quantity)
    values ('$name', 'Theory of matrix  ', '$TM')";
    

    
   
    if (mysqli_multi_query($con, $sql)) 
    {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
?>

<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <title></title>
    </head>
    <style>
        body
        {
            background-image:url("b.JPG");
            background-repeat:no-repeat;
        }
    </style>

    <body>
        <h1>提交后的界面：</h1>
        <p>
            Name:<?php echo $name; ?>
        </p>
        <p>
            address:<?php echo $address;?>
        </p>
        <p>
            zip:<?php echo $zip;?>
        </p>
        <table border = "5">
        <tr>
            <td>book</td>
            <td>publisher</td>
            <td>price</td>
            <td>quantity</td>
        </tr>
        <tr>
            <td>Web technology</td>
            <td>Springer press</td>
            <td>$5.0</td>
            <td><?php echo $WT;?></td>
        </tr>
        <tr>
            <td>mathematics</td>
            <td>ACM press</td>
            <td>$6.2</td>
            <td><?php echo $MT;?></td>
        </tr>
        <tr>
            <td>principle of OS</td>
            <td>Science press</td>
            <td>$10</td>
            <td><?php echo $PO;?></td>
        </tr>
        <tr>
            <td>Theory of matrix </td>
            <td>High education press</td>
            <td>$7.8</td>
            <td><?php echo $TM;?></td>
        </tr>
        </table>

    <form action = "query.php" method = "post">
    <p>
        <h1> please input customer name:</h1>
        <input = "text" name = "name1" size = "30"/>
    </p>
    <p>
        <input type = "submit" value = "Submit"/>
    </p>
    </form>
    </body>
</html>

<br>
<?php 
    print "$name has bought $total_items";
?>
<br>
<br>

<?php
    print "$name paid $total_price.";
?>
<br>
<br>

<?php
    print "paid by $Payment.";
?>


