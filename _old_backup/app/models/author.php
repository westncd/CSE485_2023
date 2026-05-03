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
        $conn->query($query);
    }

    public static function updateAuthor($conn, $ma_tgia , $ten_tgia){
        $query = "UPDATE tacgia SET ten_tgia = '$ten_tgia' WHERE ma_tgia = '$ma_tgia'";
        mysqli_query($conn, $query);
    }


    public static function getAuthorByID($conn, $id){
        $query = "SELECT * FROM tacgia WHERE ma_tgia = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public static function getAuthorByName($conn, $ten_tgia){
        $query = "SELECT * FROM tacgia WHERE ma_tgia = '$ten_tgia'";
        $result = mysqli_query($conn, $query);
        return $result;
    }


    public static function getAuthorNamebyID($conn, $id){
        $query = "SELECT ten_tgia FROM tacgia WHERE ma_tgia = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    
    public static function checkTgia($conn, $ten_tgia){
        $query = "SELECT EXISTS(SELECT 1 FROM tacgia WHERE ten_tgia = '$ten_tgia') AS is_exists";
        $result = $conn->query($query);
        return $result;
    }

    public static function getAuthorID($conn, $ten_tgia){
        $query = "SELECT ma_tgia FROM tacgia WHERE ten_tgia = '$ten_tgia'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return $row['ma_tgia'];
    }
}
?>