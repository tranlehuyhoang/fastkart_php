<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function addToCart($data, $userid)
    {
        $productId = mysqli_real_escape_string($this->db->link, $data['product']);
        $userId = mysqli_real_escape_string($this->db->link, $userid);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        $query = "SELECT * FROM cart WHERE product = '$productId' AND user = '$userId' AND status = '0'";
        $existingItem = $this->db->select($query);

        if ($existingItem && $existingItem->num_rows > 0) {
            // Sản phẩm đã tồn tại trong giỏ hàng, bạn có thể xử lý theo ý của mình
            return "Product already exists in the cart.";
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
            $query = "INSERT INTO cart (product, user, quantity, status) VALUES ('$productId', '$userId', '$quantity', '0')";
            $result = $this->db->insert($query);

            if ($result) {
                return "Product added to the cart successfully.";
            } else {
                return "Failed to add product to the cart.";
            }
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