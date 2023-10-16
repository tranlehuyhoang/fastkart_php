<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($data)
    {
        $name = $data['name'];

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
                $query = "INSERT INTO category (name, image) VALUES ('$name', '$imagePath')";
                $this->db->insert($query);

                echo "<script>window.location.href = './category.php';</script>";
            } else {
                // Failed to move the uploaded file
                echo "Failed to upload file.";
            }
        }
    }
    public function show_category()
    {
        $query = "SELECT * FROM category order by id desc";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_category($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $id = mysqli_real_escape_string($this->db->link, $id);

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
                $query = "UPDATE category SET name = '$name', image = '$imagePath' WHERE id = '$id'";
                $result = $this->db->update($query);
            }
        } else {
            // No image uploaded, only update the name
            $query = "UPDATE category SET name = '$name' WHERE id = '$id'";
            $result = $this->db->update($query);
        }

        echo "<script>window.location.href = './category.php';</script>";
    }
    public function delete_category($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM category WHERE id = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";

            return $arlet;
        }
    }

    public function getcatbyId($id)

    {
        $query = "SELECT * FROM category WHERE id = '$id'";
        $result = $this->db->select($query);

        return $result;
    }
}
