</div>
        <!-- /row -->
 
    </div>
    <!-- /container -->
 
<!-- jQuery library -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/jQuery/holder.js"></script>
<script>
// update quantity button listener
$('.update-quantity-form').on('submit', function(){
 
    // get basic information for updating the cart
    var id = $(this).find('.product-id').text();
    var quantity = $(this).find('.cart-quantity').val();
 
    // redirect to update_quantity.php, with parameter values to process the request
    window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
    return false;
});
</script>
</body>
</html>