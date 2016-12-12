<?php 
    $_AS_ADMIN = FALSE;
    $_AS_MARKETING = FALSE;
    $_AS_GUDANG = FALSE;
    $_AS_PURCHASING = FALSE;
    $_AS_PRODUKSI = FALSE; 
    $_AS_GM = FALSE;
    $_AS_KURIR = FALSE;

  switch ($_SESSION['group']) {
    case 1:
      $_AS_ADMIN = TRUE; 
      $_AS_MARKETING = TRUE;
      $_AS_GUDANG = TRUE;
      $_AS_PRODUKSI = TRUE; 
      $_AS_PURCHASING = TRUE;
      $_AS_GM = TRUE;
      $_AS_KURIR = TRUE;
      break;
    case 2:
      $_AS_MARKETING = TRUE;
      break;
    case 4:
      $_AS_GUDANG = TRUE;
      break;
    case 5:
      $_AS_PRODUKSI = TRUE;
      break;
    case 6:
      $_AS_GM = TRUE;
      break;
    case 7:
      $_AS_PURCHASING = TRUE;
      break;
    case 8:
      $_AS_KURIR = TRUE;
      break;
    default:
        $_AS_ADMIN = FALSE;
        $_AS_MARKETING = FALSE;
        $_AS_GUDANG = FALSE;
        $_AS_PRODUKSI = FALSE; 
        $_AS_GM = FALSE;
        $_AS_PURCHASING = FALSE;
        $_AS_KURIR = FALSE;
      break;
  } 
?>