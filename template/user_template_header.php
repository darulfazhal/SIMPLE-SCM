<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title><?php echo isset($page_title) ? $page_title : ""; ?></title> 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
    <link href="plugins/cart/cart.css" rel="stylesheet" media="screen"> 
</head>
<body>
 
    <?php include 'user_template_navigation.php'; ?>
 
    <!-- container -->
    <div class="container">
        <div class="row">
        <?php
            echo "<div class='col-md-12'>";
                if($action=='added'){
                    echo "<div class='alert alert-info'>";
                        echo "Produk Berhasil di tambahkan!";
                    echo "</div>";
                }
             
                if($action=='exists'){
                    echo "<div class='alert alert-info'>";
                        echo "Produk sudah ada di daftar belanaj!";
                    echo "</div>";
                }
            echo "</div>";
        ?>
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : " "; ?></h1>
            </div>
        </div>