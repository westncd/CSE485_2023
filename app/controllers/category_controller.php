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
                // header('../views/admin/category_view.php');
                unset($_GET['id']);
            }
        }
    }
    
?>