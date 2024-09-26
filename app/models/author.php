<?php
class Author {
    public static function getAuthorList($conn) {
        $query = "SELECT * FROM tacgia";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public static function deleteAuthor($conn, $id){
        $query = "DELETE FROM tacgia WHERE ma_tgia = '$id'";
        if(mysqli_query($conn, $query)){
            header('../views/admin/author_view.php');
        }
    }
    
    public static function addAuthor($conn, $ten_tgia) {
        $query = "INSERT INTO tacgia(ten_tgia) VALUES ('$ten_tgia')";
        
        if ($conn->query($query)) {
            header('Location: ./author_view.php');
            exit; 
        }
    }

    public static function updateAuthor($conn, $ma_tgia , $ten_tgia){
        $query = "UPDATE tacgia SET ten_tgia = '$ten_tgia' WHERE ma_tgia = '$ma_tgia'";
        if (mysqli_query($conn, $query)) {
            header("Location: ./author_view.php");
            exit;
        }
    }

    public static function getAuthorByID($conn, $id){
        $query = "SELECT * FROM tacgia WHERE ma_tgia = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    
}
?>