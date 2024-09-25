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
}
?>