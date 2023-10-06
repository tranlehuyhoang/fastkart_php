<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<?php
class invoice
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function updateorder($id)
    {
        $query = "UPDATE `order` SET payment = 1 WHERE id = $id order by id desc";
        $result = $this->db->update($query);

        return $result;
    }
    public function getOrdersByUser($id)
    {
        $query = "SELECT * FROM `order` WHERE user = $id order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    // public function getbill($id)
    // {
    //     $query = "SELECT cart.*, category.name AS category_name, product.price, product.name, product.image, cart.quantity, SUM(product.price * cart.quantity) AS total_price
    //     FROM cart
    //     JOIN product ON product.id = cart.product
    //     JOIN order ON order.id = cart.status
    //     JOIN category ON category.id = product.category

    //     WHERE cart.status = $id AND `order`.payment = 0
    //     ORDER BY cart.id DESC;
    //     ";
    //     $result = $this->db->select($query);
    //     return $result;
    // }
    public function getbill($id)
    {
        $querys = "SELECT * FROM `order` WHERE id = $id AND payment = 0 ORDER BY id DESC";
        $results = $this->db->select($querys);

        if ($results && $results->num_rows > 0) {
            $a = $results->fetch_assoc();
            $check = $a['id'];

            $query = "SELECT cart.*, product.name, product.image, product.price, category.name AS category_name, (cart.quantity * product.price) AS total_price
            FROM cart
            JOIN product ON cart.product = product.id
            JOIN category ON product.category = category.id
            WHERE cart.status = $check
            ORDER BY cart.id DESC";
            $result = $this->db->select($query);
            return $result;
        }
    }
    public function re_payment($code, $totalprice)
    {

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/dam/client/user.php";
        $vnp_TmnCode = "D15NVMKJ"; //Mã website tại VNPAY 
        $vnp_HashSecret = "ZXFYJFBDTZTNQYUUHJZCOTWBVBJVAIWW"; //Chuỗi bí mật

        $vnp_TxnRef = $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'thanh toan';
        $vnp_OrderType = 'bank';
        $vnp_Amount = floatval($totalprice) * 100 * 23000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = "http://localhost/dam/client/user.php";

        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }

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
            "vnp_TxnRef" => $vnp_TxnRef

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
            echo "<script>window.location.href = '$vnp_Url';</script>";
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
    public function get_invoice($user, $invoiid)
    {

        $querys = "SELECT * FROM `order` WHERE id = $invoiid AND payment = 1 AND user = $user ORDER BY id DESC";
        $results = $this->db->select($querys);

        if ($results && $results->num_rows > 0) {
            $a = $results->fetch_assoc();
            $check = $a['id'];

            $query = "SELECT cart.*, product.name, product.image, product.price,users.email, category.name AS category_name, (cart.quantity * product.price) AS total_price
            FROM cart
            JOIN product ON cart.product = product.id
            JOIN category ON product.category = category.id
            JOIN users ON cart.user = users.id
            WHERE cart.status = $check
            ORDER BY cart.id DESC";
            $result = $this->db->select($query);
            return $result;
        } else {
            echo "<script>window.location.href = './login.php';</script>";
        }
    }
    public function get_order_user_bill($id, $user)
    {
        $query = "SELECT `order`.*, users.*
        FROM `order`
        JOIN users ON users.id = `order`.user
        WHERE `order`.id = $id AND `order`.payment = 1 AND `order`.user = $user";
        $result = $this->db->update($query);

        return $result;
    }
    public function get_order_admin()
    {
        $query = "SELECT `order`.*,  users.id as users_id,users.email as users_email
        FROM `order`
        JOIN users ON users.id = `order`.user
        order by `order`.id desc;";
        $result = $this->db->update($query);

        return $result;
    }


    public function sendmail($id, $user)
    {
        require '../PHPMailer-master/src/Exception.php';
        require '../PHPMailer-master/src/PHPMailer.php';
        require '../PHPMailer-master/src/SMTP.php';

        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 0; // Đặt giá trị này thành 0 để tắt thông báo debug của SMTP
            $mail->isSMTP(); // Sử dụng SMTP để gửi mail
            $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
            $mail->SMTPAuth = true; // Bật xác thực SMTP
            $mail->Username = '2509roblox@gmail.com'; // Tài khoản email
            $mail->Password = 'y j z n l q a u o e u x z m m l'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
            $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
            $mail->Port = 465; // Cổng kết nối SMTP là 465

            // Recipients
            $mail->setFrom('2509roblox@gmail.com', 'name'); // Địa chỉ email và tên người gửi
            $mail->addAddress('2509roblox@gmail.com', 'name'); // Địa chỉ mail và tên người nhận

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Fastkart Shop'; // Tiêu đề

            $emailContent = file_get_contents('http://localhost/dam/client/email.php?bill=' . $user . '&user=' . $id);
            if ($emailContent !== false) {
                $searchArr = ["YOUR-PLACEHOLDER-FIRST", "YOUR-PLACEHOLDER-SECOND"];
                $replaceArr = [$id, $user];
                $mail->Body = str_replace($searchArr, $replaceArr, $emailContent);
            } else {
                throw new Exception('Failed to retrieve email content.');
            }

            $mail->send();
            // Ẩn thông báo gửi mail thành công
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // Ẩn thông báo gửi mail lỗi
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    public function get_invoice_admin($invoiid)
    {

        $querys = "SELECT * FROM `order` WHERE id = $invoiid   ORDER BY id DESC";
        $results = $this->db->select($querys);

        if ($results && $results->num_rows > 0) {
            $a = $results->fetch_assoc();
            $check = $a['id'];

            $query = "SELECT cart.*, product.name, product.image, product.price,users.email, category.name AS category_name, (cart.quantity * product.price) AS total_price
            FROM cart
            JOIN product ON cart.product = product.id
            JOIN category ON product.category = category.id
            JOIN users ON cart.user = users.id
            WHERE cart.status = $check
            ORDER BY cart.id DESC";
            $result = $this->db->select($query);
            return $result;
        }
    }
}