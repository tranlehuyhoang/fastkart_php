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
}