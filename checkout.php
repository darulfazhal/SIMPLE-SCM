<?php
// start session
session_start();
 
include 'config/koneksi.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
$page_title="Checkout";
  include 'template/user_template_header.php';
 
if(count($_SESSION['cart'])>0){
 
    // get the product ids
    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value){
        array_push($ids, $id);
    }
  $id_produks = implode(",",$ids);
    
    $total=0;
    $item_count=0;
    $sql = mysql_query("SELECT * FROM produk where id_produk IN($id_produks)") or die(mysql_error());
    
     
 
    while ($row = mysql_fetch_assoc($sql)){
        
        $price = $row['harga_produk'];
        $name = $row['nama_produk'];
        $quantity=$_SESSION['cart'][$id]['quantity'];
        $sub_total=$price*$quantity;
    
        echo "<div class='product-id' style='display:none;'>{$id}</div>";
        echo "<div class='product-name'>{$name}</div>";
 
        // =================
        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";
 
                echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
 
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>Rp. " . number_format($price, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
        // =================
 
        $item_count += $quantity;
        $total+=$sub_total;
    }
 
    // echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-12 text-align-center'>";
        echo "<div class='cart-row'>";
            if($item_count>1){
                echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
            }else{
                echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
            }
            echo "<h4>Rp. " . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Order";
            echo "</a>";
        echo "</div>";
    echo "</div>";
 
}
 
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "No products found in your cart!";
        echo "</div>";
    echo "</div>";
}
 
 include 'template/user_template_footer.php';
?>