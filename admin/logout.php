<?php
session_start();
include('config/koneksi.php');
session_destroy();
header('Location: index.php');
