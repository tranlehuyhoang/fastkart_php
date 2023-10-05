<?php
session_start();
include_once __DIR__ .  '/../controller/invoice.class.php';
include_once __DIR__ .  '/../controller/checkout.class.php';
$checkoutclass = new checkout();
$invoiceclass = new invoice();
if (!isset($_SESSION['userid'])) {
    echo "<script>window.location.href = './login.php';</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bill'])) {
    $get_invoice = $invoiceclass->get_invoice($_GET['user'], $_GET['bill']);
    $get_invoice1 = $invoiceclass->get_invoice($_GET['user'], $_GET['bill']);
    $get_user_orderss = $invoiceclass->get_order_user_bill($_GET['bill'], $_GET['user']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Chi tiết hóa đơn #{{ $code_order }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets_client/logo.png') }}" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
    body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
    }

    body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
    }

    body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
    }

    body a {
        color: #06f;
    }

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    </style>
</head>

<?php
if (isset($get_user_orderss)) {
    if ($get_user_orderss && $get_user_orderss->num_rows > 0) {
        $i = 0;
        while ($resultsss = $get_user_orderss->fetch_assoc()) {
            # code...
?>

<body>
    <h1> Xin gửi chi tiết hóa đơn thanh toán số #<?php echo $resultsss['code'] ?></h1>


    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/logo/1.png"
                                    alt="Company logo" style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Invoice #: <?php echo $resultsss['code'] ?><br />
                                Created: January 1, 2023<br />
                                Due: February 1, 2023
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sparksuite, Inc.<br />
                                12345 Sunny Road<br />
                                Sunnyville, TX 12345
                            </td>

                            <td>
                                Acme Corp.<br />
                                John Doe<br />
                                <?php echo $resultsss['email'] ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Check #</td>
            </tr>

            <tr class="details">
                <td>Check</td>

                <td>VNPAY</td>
            </tr>

            <tr class="heading">
                <td>Item</td>

                <td>Price</td>
            </tr>
            <?php
                        if (isset($get_invoice)) {
                            if ($get_invoice && $get_invoice->num_rows > 0) {
                                $i = 0;
                                while ($result = $get_invoice->fetch_assoc()) {
                                    # code...
                        ?>

            <tr class="item">
                <td><?php echo $result['name'] ?> x<?php echo $result['quantity'] ?></td>

                <td>$<?php echo $result['quantity'] * $result['price'] ?>.00</td>
            </tr>

            <?php
                                    $i++;
                                }
                            } else {
                                ?>
            <?php
                            }
                        } else {
                            ?>
            <?php
                        }
                        ?>
            <tr class="total">
                <td></td>
                <?php


                            if (isset($get_invoice1)) {
                                if ($get_invoice1 && $get_invoice1->num_rows > 0) {
                                    $totals = 0;
                                    $z = 0;
                                    while ($result = $get_invoice1->fetch_assoc()) {
                                        // print_r($result);
                                        $totals += $result['total_price'];
                                        // echo $totals;
                                        $z = $result['user'];
                                    }
                                }
                            }
                            ?>
                <td>Total: $<?php echo $totals ?>.00</td>
            </tr>
        </table>
    </div>
</body>
<?php
            $i++;
        }
    } else {
        ?>
<?php
    }
} else {
    ?>
<?php
}
?>
<?php

?>

</html>