<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class checkout
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function addToOrder($data, $userid)
    {
        $code = $this->generateUniqueCode(16);
        $code = mysqli_real_escape_string($this->db->link, $code);
        $user = mysqli_real_escape_string($this->db->link, $_SESSION['userid']);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        $query = "INSERT INTO `order` (code, user, payment) VALUES ('$code', '$user', '0')";
        $result = $this->db->insert($query);

        if ($result) {
            $query = "SELECT  * FROM  `order` WHERE code = '$code'";
            $result = $this->db->select($query);
            $order = $result->fetch_assoc();
            $orderid = $order['id'];
            $usreid = $order['user'];
            $payment = $order['code'];

            // Update carts with status = 0 and user = $userid
            $query = "UPDATE cart SET status = '$orderid' WHERE status = '0' AND user = '$userid'";
            $this->db->update($query);
            $this->payment($code);
        }
    }

    public function generateUniqueCode($length)
    {
        $characters = '0123456789';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Check if the generated code already exists in the database and regenerate if needed
        $query = "SELECT COUNT(*) AS count FROM `order` WHERE code = '$code'";
        $result = $this->db->select($query);

        if ($result && $result->num_rows > 0) {
            $a = $result->fetch_assoc();
            $count = $a['count'];
            echo $count;
            if ($count > 0) {
                // Code already exists, regenerate
                $code = $this->generateUniqueCode($length);
            }
        } else {
            $alert = "<div class='alert alert-danger' role='alert'>Invalid Email</div>";
        }



        return $code;
    }
    public function payment($code)
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/dam/client/user.php";
        // $vnp_Returnurl = "http://localhost:1001/ordersuccess/" . $orderId . "";
        $vnp_TmnCode = "D15NVMKJ"; //Mã website tại VNPAY 
        $vnp_HashSecret = "ZXFYJFBDTZTNQYUUHJZCOTWBVBJVAIWW"; //Chuỗi bí mật

        $vnp_TxnRef =  $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        echo $code;
        return;
        // dd($totalPrice * 100 * 23000);
        $vnp_OrderInfo = 'Thanh Toán đơn hàng tại Fastkart';
        $vnp_OrderType = 'bank';
        $vnp_Amount = 1000 * 100 * 23000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = "http://localhost/dam/client/user.php";

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (true) {
            // after payment is completed





            echo "<script>window.location.href = '$vnp_Url';</script>";
            die();
        } else {
            echo json_encode($returnData);
        }



        // return redirect('/');
    }
    public function re_payment($vnp_TxnRef)
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/dam/client/user.php";
        // $vnp_Returnurl = "http://localhost:1001/ordersuccess/" . $orderId . "";
        $vnp_TmnCode = "D15NVMKJ"; //Mã website tại VNPAY 
        $vnp_HashSecret = "ZXFYJFBDTZTNQYUUHJZCOTWBVBJVAIWW"; //Chuỗi bí mật

        $vnp_TxnRef =  $vnp_TxnRef; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        // dd($totalPrice * 100 * 23000);
        $vnp_OrderInfo = 'Thanh Toán đơn hàng tại Fastkart';
        $vnp_OrderType = 'bank';
        $vnp_Amount = 1000 * 100 * 23000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = "http://localhost/dam/client/user.php";

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (true) {
            // after payment is completed



            echo "<script>window.location.href = '$vnp_Url';</script>";


            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function show_cart($userid)
    {

        $userId = mysqli_real_escape_string($this->db->link, $userid);

        $query = "SELECT cart.*, product.name AS product_name, product.price, category.name AS category_name ,product.image, cart.quantity * product.price AS total_cost
        FROM cart
        JOIN product ON product.id = cart.product
        JOIN category ON category.id = product.category
        WHERE cart.user = '$userId' AND cart.status = '0'
        ORDER BY cart.id DESC;
        ";
        $result = $this->db->select($query);

        return $result;
    }
}