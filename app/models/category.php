<?php
class Category {
    public static function getCategoryList($conn) {
        $query = "SELECT * FROM theloai";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public static function deleteCategory($conn, $id){
        $query = "DELETE FROM theloai WHERE ma_tloai = '$id'";
        if(mysqli_query($conn, $query)){
            header('../views/admin/category_view.php');
        }
    }
    
    public static function addCategory($conn, $ten_tloai) {
        $query = "INSERT INTO theloai(ten_tloai) VALUES ('$ten_tloai')";
        $conn->query($query);
    }

    public static function updateCategory($conn, $ma_tloai , $ten_tloai){
        $query = "UPDATE theloai SET ten_tloai = '$ten_tloai' WHERE ma_tloai = '$ma_tloai'";
        if (mysqli_query($conn, $query)) {
            header("Location: ./category_view.php");
        }
    }

    public static function getCategoryByID($conn, $id){
        $query = "SELECT * FROM theloai WHERE ma_tloai = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public static function getCategoryByName($conn, $ten_tloai){
        $query = "SELECT * FROM theloai WHERE ma_tloai = '$ten_tloai'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public static function checkTloai($conn, $ten_tloai){
        $query = "SELECT EXISTS(SELECT 1 FROM theloai WHERE ten_tloai = '$ten_tloai') AS is_exists";
        $result = $conn->query($query);
        return $result;
    }

    public static function getCategoryID($conn, $ten_tloai){
        $query = "SELECT ma_tloai FROM theloai WHERE ten_tloai = '$ten_tloai'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return $row['ma_tloai'];
    }
    
}
?>