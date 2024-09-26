<?php
class Article {
    public static function getArticleBySongName($conn, $songName) {
        $query = "SELECT * FROM baiviet 
                  JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                  JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
                  WHERE ten_bhat = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $songName);
        $stmt->execute();
        return $stmt->get_result();
    }

    public static function getArticleList($conn){
        $query = "SELECT * FROM baiviet 
                  JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                  JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                  ORDER BY ma_bviet ASC";
        $result = $conn->query($query);
        return $result;
    }

    public static function deleteArticle($conn, $id){
        $query = "DELETE FROM baiviet WHERE ma_bviet = '$id'";
        if(mysqli_query($conn, $query)){
            header('../views/admin/article_view.php');
        }
    }

    public static function checkTloai($conn, $ten_tloai) {
        $query = "SELECT EXISTS (SELECT 1 FROM theloai WHERE ten_tloai = $ten_tloai) AS is_exists";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return (bool)$row['is_exists'];
    }

    // public static function checkTgia($conn, $ten_tgia) {
    //     $query = "SELECT EXISTS (SELECT 1 FROM tacgia WHERE ten_tloai = $ten_tgia) AS is_exists";
    //     $result = $conn->query($query);
    //     $row = $result->fetch_assoc();
    //     return (bool)$row['is_exists'];
    // }
    public static function checkTgia($conn, $ten_tgia) {
        // Sử dụng prepared statement để tránh SQL Injection
        $query = "SELECT EXISTS (SELECT 1 FROM tacgia WHERE ten_tgia = ?) AS is_exists";
        $stmt = $conn->prepare($query);
        
        // Kiểm tra nếu chuẩn bị câu lệnh không thành công
        if ($stmt === false) {
            die("Lỗi trong câu lệnh SQL: " . $conn->error);
        }
    
        // Gán tham số
        $stmt->bind_param("s", $ten_tgia);
        $stmt->execute();
        
        // Lấy kết quả
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        // Đóng statement
        $stmt->close();
        
        // Trả về giá trị boolean
        return (bool)$row['is_exists'];
    }
    

    public static function addArticle($conn, $tieude, $ten_bhat, $ten_tloai, $tomtat, $noidung, $ten_tgia, $ngayviet,$hinhanh){
        $query = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES('$tieude', '$ten_bhat', '$ten_tloai', '$tomtat', '$noidung', '$ten_tgia', '$ngayviet', '$hinhanh')";
        if($conn->query($query)){
        header("Location: ./article_view.php");
        exit;
        }
    }
}
?>