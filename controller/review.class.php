<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class review
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_review($data, $id)
    {
        $rate = mysqli_real_escape_string($this->db->link, $data['rating']);
        $product = mysqli_real_escape_string($this->db->link, $data['product']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);


        // Sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
        $query = "INSERT INTO review ( user, rate, product , description) VALUES ('$id', '$rate', '$product', '$description')";
        $result = $this->db->insert($query);


        return $result;
    }

    public function getReviewByProduct($id)
    {
        $query = "SELECT review.*, users.* 
                  FROM review 
                  INNER JOIN users ON review.user = users.id 
                  WHERE review.product = '$id'
                  order by review.id desc";
        $result = $this->db->select($query);

        return $result;
    }
    public function show_review()
    {
        $query = "SELECT  review.*, users.* ,product.name as product_name
        FROM review
        JOIN users ON users.id = review.user
        JOIN product ON product.id = review.product
        ORDER BY review.id DESC;
        ";
        $result = $this->db->select($query);

        return $result;
    }
}