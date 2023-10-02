<?php

include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../helpers/format.php';

?>

<?php
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_user($data)
    {
        $user_username = mysqli_real_escape_string($this->db->link, $data['user_username']);
        $user_email = mysqli_real_escape_string($this->db->link, $data['user_email']);
        $user_password = mysqli_real_escape_string($this->db->link, md5($data['user_password']));

        // Kiểm tra xem user_username đã tồn tại trong cơ sở dữ liệu chưa
        $check_query = "SELECT * FROM clone_user WHERE user_username = '$user_username'";
        $check_result = $this->db->select($check_query);

        if ($check_result) {
            $alert = "400";
            return $alert;
        }

        // Tiếp tục thêm mới người dùng
        $query = "INSERT INTO clone_user(user_username, user_email, user_password) VALUES ('$user_username', '$user_email', '$user_password')";
        $result = $this->db->insert($query);

        if ($result) {
            $alert = "200";
            return $alert;
        } else {
            $alert = "404";
            return $alert;
        }
    }

    public function show_user()
    {
        $query = "SELECT * FROM clone_user order by userid desc";
        $result = $this->db->select($query);

        return $result;
    }
    public function get_asset_user()
    {
        $user_id =   $_SESSION['clone_user_id'];

        $query = "SELECT * FROM clone_user where user_id = '$user_id'";
        $result = $this->db->select($query);

        return $result;
    }



    // public function update_user($data, $id)
    // {
    //     $userroles = mysqli_real_escape_string($this->db->link, $data['userroles']);
    //     $id = mysqli_real_escape_string($this->db->link, $id);

    //     if ($userroles == '') {
    //         $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
    //         return $arlet;
    //     } else {
    //         $query = "UPDATE user_user SET userroles = '$userroles'  WHERE userid = '$id'";
    //         $result = $this->db->update($query);
    //         if ($result) {
    //             $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
    //             return $arlet;
    //         } else {
    //             $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

    //             return $arlet;
    //         }
    //     }
    // }


    // public function delete_user($id)
    // {
    //     $id = mysqli_real_escape_string($this->db->link, $id);
    //     $query = "DELETE FROM user_user WHERE userid = '$id'";
    //     $result = $this->db->delete($query);


    //     if ($result) {
    //         $arlet = "<div class='alert alert-success' role='alert'>Delete Code Successfully</div>";
    //         return $arlet;
    //     } else {
    //         $arlet = "<div class='alert alert-danger' role='alert'>Delete Code Successfully</div>";

    //         return $arlet;
    //     }
    // }
    public function getuserbyid($id)
    {


        $query = "SELECT * FROM clone_user WHERE user_id = '$id'";
        $result = $this->db->select($query);

        return $result;
    }
    public function checklogin($id)
    {


        $query = "SELECT * FROM user_user WHERE userid = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            if ($result && $result->num_rows > 0) {
                while ($resultss = $result->fetch_assoc()) {
                    if ($resultss['userroles'] == 2) {
                        header('Location:page/Home.php');
                    }
                }
            }
        }
    }

    public function login($data)
    {
        $user_username = mysqli_real_escape_string($this->db->link, $data['user_username']);
        $user_password = mysqli_real_escape_string($this->db->link, md5($data['user_password']));
        $query = "SELECT * FROM clone_user WHERE  user_username = '$user_username'AND user_password = '$user_password' ";
        $result = $this->db->select($query);

        if ($result) {
            if ($result && $result->num_rows > 0) {
                while ($resultss = $result->fetch_assoc()) {
                    $_SESSION['clone_user_id'] = $resultss['user_id'];
                    $alertss = "200";
                    return $alertss;
                }
            }
            $alertss = "200";
            return $alertss;
        } else {
            $alerts = "400";

            return $alerts;
        }
    }
    public function logout()
    {
        unset($_SESSION['clone_user_id']);
    }
    public function loginuser($data)
    {
        $userpass = mysqli_real_escape_string($this->db->link, md5($data['userpass']));
        $useremail = mysqli_real_escape_string($this->db->link, $data['useremail']);
        $query = "SELECT * FROM user_user WHERE  userpass = '$userpass'AND useremail = '$useremail' ";
        $result = $this->db->select($query);

        if ($result) {
            if ($result && $result->num_rows > 0) {
                while ($resultss = $result->fetch_assoc()) {
                    $_SESSION['userid'] = $resultss['userid'];
                }
            }
            $arlet = "<div class='alert alert-success' role='alert'>Login Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Login Error </div>";

            return $arlet;
        }
    }
    public function countusser()
    {

        $query = "SELECT COUNT(*) AS total_users FROM user_user; ";
        $result = $this->db->select($query);


        return $result;
    }
}