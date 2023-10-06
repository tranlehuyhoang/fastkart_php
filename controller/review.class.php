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


    public function getReviewByProduct($id)
    {
        $query = "SELECT review.*, users.* 
                  FROM review 
                  INNER JOIN users ON review.user = users.id 
                  WHERE review.product = '$id'";
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
