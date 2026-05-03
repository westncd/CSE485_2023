<?php
    function GetNum($conn){
        $sql_theloai = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $sql_tacgia = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $sql_baiviet = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";

        $result_theloai = $conn->query($sql_theloai);
        $result_tacgia = $conn->query($sql_tacgia);
        $result_baiviet = $conn->query($sql_baiviet);

        $count_theloai = $result_theloai->fetch_assoc()['count_theloai'];
        $count_tacgia = $result_tacgia->fetch_assoc()['count_tacgia'];
        $count_baiviet = $result_baiviet->fetch_assoc()['count_baiviet'];
        

        $result = [$count_theloai, $count_tacgia, $count_baiviet];

        return $result;
    }
?>