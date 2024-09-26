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
}
?>