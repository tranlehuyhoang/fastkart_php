<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function insert_product($data)
    {
        $name = $data['name'];
        $category = $data['category'];
        $price = $data['price'];

        // Handle file upload


        // Handle file upload
        if ($_FILES['image']['error'] === 0) {
            $uploadDir = __DIR__ . '/../public/images/';
            $fileName = $_FILES['image']['name'];
            $tempFile = $_FILES['image']['tmp_name'];
            $targetFile = $uploadDir . $fileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($tempFile, $targetFile)) {
                // File uploaded successfully, save the category information in the database
                $imagePath = 'images/' . $fileName; // Relative path to the image file

                // Insert the category into the database
                $query = "INSERT INTO product (name, category, price, image) VALUES ('$name', '$category', '$price', '$imagePath')";
                $this->db->insert($query);

                echo "<script>window.location.href = './product.php';</script>";
            } else {
                // Failed to move the uploaded file
                echo "Failed to upload file.";
            }
        }
    }
    public function show_product()
    {
        $query = "SELECT product.*, category.name AS category_name 
                  FROM product 
                  INNER JOIN category ON product.category = category.id 
                  ORDER BY product.id DESC";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_category($data, $id)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
            return $arlet;
        } else {
            $query = "UPDATE tbl_category SET categoryname = '$categoryname' WHERE categoryid = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                return $arlet;
            }
        }
    }
    public function delete_category($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_category WHERE categoryid = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";

            return $arlet;
        }
    }

    public function getProductsByCategoryId($id)
    {
        $query = "SELECT * FROM product WHERE category = '$id'";
        $result = $this->db->select($query);


        return $result;
    }
    public function getProductsByid($id)
    {
        $query = "SELECT * FROM product WHERE id = '$id'";
        $result = $this->db->select($query);


        return $result;
    }
}
