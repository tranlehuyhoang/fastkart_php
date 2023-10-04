<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';
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
    public function getbill($id)
    {
        $query = "SELECT *
        FROM product
        JOIN cart ON product.id = cart.product
        WHERE cart.status = $id
         order by cart.id desc";
        $result = $this->db->select($query);
        return $result;
    }
}
