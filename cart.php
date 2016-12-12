<?php
session_start();
include 'config/koneksi.php';
 $page_url = 'list_order';
 $page_title = 'Daftar Belanja';
$action = isset($_GET['action']) ? $_GET['action'] : "";
 include 'template/user_template_header.php';

echo "<div class='col-md-12'>";
    if($action=='removed'){
        echo "<div class='alert alert-info'>";
            echo "Produk berhasil di hapus dari daftar belanja!";
        echo "</div>";
    }
 
    else if($action=='quantity_updated'){
        echo "<div class='alert alert-info'>";
            echo "Jumlah Produk berhasil di ubah!";
        echo "</div>";
    }
echo "</div>";
if(count($_SESSION['cart'])>0){
 
    // get the product ids
    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value){
        array_push($ids, $id);
    }
    $id_produks = implode(",",$ids);
    $sql = mysql_query("SELECT * FROM produk where id_produk IN($id_produks)") or die(mysql_error());
    
     
 
    $total=0;
    $item_count=0;
    $i = 0;
    while ($row = mysql_fetch_assoc($sql)){
       $price = $row['harga_produk']; 
        $quantity=$_SESSION['cart'][$row['id_produk']]['quantity'];
        $sub_total=$price*$quantity;
 
        // =================
        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";
 
                echo "<div class='product-name m-b-10px'><h4>{$row['nama_produk']}</h4></div>";
 
                // update quantity
                echo "<form class='update-quantity-form'>";
                    echo "<div class='product-id' style='display:none;'>{$row['id_produk']}</div>";
                    echo "<div class='input-group'>";
                        echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default update-quantity' type='submit'>Ubah</button>";
                            echo "</span>";
                    echo "</div>";
                echo "</form>";
 
                // delete from cart
                echo "<a href='remove_cart.php?id={$id}' class='btn btn-default'>";
                    echo "Hapus";
                echo "</a>";
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>Rp. " . number_format($price, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
        // =================
 
        $item_count += $quantity;
        $total+=$sub_total;
        $i ++;
    }
 
    echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-4'>";
        echo "<div class='cart-row'>";
            echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
            echo "<h4>Rp. " . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Lanjutkan Pemesanan";
            echo "</a>";
        echo "</div>";
    echo "</div>";
 
}
 
// no products were added to cart
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Tidak ada produk pada daftar belanja!";
        echo "</div>";
    echo "</div>";
}
 include 'template/user_template_footer.php';
?>