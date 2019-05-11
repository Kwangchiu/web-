<?php 
    $name = $_POST["Cname"];
    $address = $_POST["Caddress"];
    $zip = $_POST["Czip"];
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
            <td><?php echo $WT_cost;?></td>
        </tr>
        <tr>
            <td>mathematics</td>
            <td>ACM press</td>
            <td>$6.2</td>
            <td><?php echo $MT_cost;?></td>
        </tr>
        <tr>
            <td>principle of OS</td>
            <td>Science press</td>
            <td>$10</td>
            <td><?php echo $PO_cost;?></td>
        </tr>
        <tr>
            <td>Theory of matrix </td>
            <td>High education press</td>
            <td>$7.8</td>
            <td><?php echo $TM_cost;?></td>
        </tr>
        </table>
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


