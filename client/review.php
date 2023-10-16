<?php

include_once __DIR__ . '/../inc/_header.inc.php';
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewclass->insert_review($_POST, $_SESSION['userid']);
    echo "<script>location.href = '../client/product.php?product=" . $_POST['product'] . "';</script>";
}