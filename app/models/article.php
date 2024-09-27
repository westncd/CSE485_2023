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
   
    public static function addArticle($conn, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
        $query = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
                  VALUES('$tieude', '$ten_bhat', '$ma_tloai', '$tomtat', '$noidung', '$ma_tgia', '$ngayviet', '$hinhanh')";
        $conn->query($query);

    }

    public static function updateArticle($conn, $ma_bviet , $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
        $query = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai', tomtat = '$tomtat', noidung = '$noidung', ma_tgia = '$ma_tgia', ngayviet = '$ngayviet', hinhanh = '$hinhanh' WHERE ma_bviet = '$ma_bviet'";
        mysqli_query($conn, $query);
    }

    public static function getArticleID($conn, $ma_bviet){
        $query = "SELECT ma_bviet FROM baiviet WHERE ten_tgia = '$ma_bviet'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return $row['ma_bviet'];
    }

    public static function getArticleDetail($conn, $ma_bviet){
        $query = "SELECT * FROM baiviet 
        JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
        JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE ma_bviet = '$ma_bviet'";
        $result = $conn->query($query);
        return $result;
    }
}
?>