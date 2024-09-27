<?php
    require_once(__DIR__ . '/../models/Author.php');
    require_once(__DIR__ . '/../../config/database.php');

    class AuthorController {
        public function AuthorList() {
            $conn = ConnectToDatabase();
            $result = Author::getAuthorList($conn);
            return $result;
        }

        public function AuthorDel(){
            $conn = ConnectToDatabase();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                Author::deleteAuthor($conn, $id);
                unset($_GET['id']);
                header('Location: ./author_view.php');
                exit;
            }
        }

        public function AuthorAdd(){
            $conn = ConnectToDatabase();
            if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["txtAuthName"])){
                Author::addAuthor($conn, $_GET['txtAuthName']);
                header('Location: ./author_view.php');
                exit;
            }
        }

        public function AuthorEdit($ma_tgia, $ten_tgia){
            $conn = ConnectToDatabase();
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['txtAuthId']) && isset($_POST['txtAuthName'])) {
                $ma_tgia = mysqli_real_escape_string($conn, $_POST['txtAuthId']);
                $ten_tgia = mysqli_real_escape_string($conn, $_POST['txtAuthName']);
                Author::updateAuthor($conn, $ma_tgia, $ten_tgia);
                header("Location: ./author_view.php");
                exit;
            }
            // return $ma_tgia;
        }

        public function getAuthorID(){
            $conn = ConnectToDatabase();
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']); 
                $result = Author::getAuthorByID($conn, $id);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $ma_tgia = $row['ma_tgia'];
                }
            }
            return $ma_tgia;
        }

        public function getAuthorNameByID(){
            $conn = ConnectToDatabase();
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']); 
                $result = Author::getAuthorByID($conn, $id);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $ten_tgia = $row['ten_tgia'];
                }
            }
            return $ten_tgia;
        }
    }
    
?>