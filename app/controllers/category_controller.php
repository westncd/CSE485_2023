<?php
    require_once(__DIR__ . '/../models/category.php');
    require_once(__DIR__ . '/../../config/database.php');

    class CategoryController {
        public function CategoryList() {
            $conn = ConnectToDatabase();
            $result = Category::getCategoryList($conn);
            return $result;
        }

        public function CategoryDel(){
            $conn = ConnectToDatabase();
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                Category::deleteCategory($conn, $id);
                unset($_GET['id']);
            }
        }

        public function CategoryAdd(){
            $conn = ConnectToDatabase();
            if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["txtCatName"])){
                Category::addCategory($conn, $_GET['txtCatName']);
            }
        }

        public function CategoryEdit($ma_tloai, $ten_tloai){
            $conn = ConnectToDatabase();
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['txtCatId']) && isset($_POST['txtCatName'])) {
                $ma_tloai = mysqli_real_escape_string($conn, $_POST['txtCatId']);
                $ten_tloai = mysqli_real_escape_string($conn, $_POST['txtCatName']);
                Category::updateCategory($conn, $ma_tloai, $ten_tloai);
            }
            return $ma_tloai;
        }

        public function getCatID(){
            $conn = ConnectToDatabase();
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']); 
                $result = Category::getCategoryByID($conn, $id);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $ma_tloai = $row['ma_tloai'];
                }
            }
            return $ma_tloai;
        }

        public function getCatNameByID(){
            $conn = ConnectToDatabase();
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']); 
                $result = Category::getCategoryByID($conn, $id);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $ten_tloai = $row['ten_tloai'];
                }
            }
            return $ten_tloai;
        }
    }
    
?>