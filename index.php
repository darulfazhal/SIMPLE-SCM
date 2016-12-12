<?php
// start session
session_start();
 include 'config/koneksi.php';
$page_url = 'list_product';
 // to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
// $records_per_page = 0; // set records or rows of data per page
// $from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause


// set page title
$page_title="Daftar Produk";
 
// page header html
include 'template/user_template_header.php';
 
// contents will be here
// $sql = mysql_query("SELECT * FROM produk LIMIT $from_record_num,$records_per_page") or die(mysql_error());
$sql = mysql_query("SELECT * FROM produk") or die(mysql_error());
$num = mysql_num_rows($sql);

$all_data_produk = mysql_query("SELECT * FROM produk") or die(mysql_error());
$total_rows = mysql_num_rows($all_data_produk);
 
// if products retrieved were more than zero
if($num>0){
    // needed for paging
    $page_url="index.php?";
   
    // show products
 
 
while ($row = mysql_fetch_assoc($sql)){ ?>
   
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
        <?php if(empty($row['url_gambar'])) $row['url_gambar'] = "default.png";?>
          <img src='assets/produk/<?php echo $row['url_gambar']?>'   style="max-height: 200px;">
          <div class="caption">
            <h3><?php echo $row['nama_produk']; ?></h3>
            <p><?php echo $row['harga_produk']; ?></p>

            <?php 
                if(array_key_exists($row['id_produk'], $_SESSION['cart'])){
                    echo "<a href='cart.php' class='btn btn-success  '>";
                        echo "Detail";
                    echo "</a>";
                }else{
                    echo "<a href='add_cart.php?id={$row['id_produk']}&page={$page}' class='btn btn-primary '>Beli</a>";
                }
            ?>

          </div>
        </div>
      </div> 
  <!--   // creating box
    echo "<div class='col-md-4 m-b-20px'>";
 
        // product id for javascript access
        echo "<div class='product-id display-none'>{$row['id_produk']}</div>";
 
        echo "<a href='index.php?id={$row['id_produk']}' class='product-link'>"; 
            echo "<div class='product-name m-b-10px'>{$row['nama_produk']}</div>";
        echo "</a>";
        if(empty($row['url_gambar'])) $row['url_gambar'] = "default.png";
        echo "<img src='assets/produk/".$row['url_gambar']."' width='200px'>";
        // add to cart button
        echo "<div class='m-b-10px'>";
            
        echo "</div>";
 
    echo "</div>"; -->
<?php } 
 
}
 
// tell the user if there's no products in the database
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}


 
// layout footer code
include 'template/user_template_footer.php';
?>