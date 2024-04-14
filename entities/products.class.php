<?php // IDEA:
require_once("config/db.class.php");

class Product{
    public $product_id;
    public $product_title;
    public $product_category;
    public $product_desc;
    public $product_img;
    public $product_price;
    public $product_status;

    public function __construct($product_title, $product_category, $product_desc, $product_img, $product_price, $product_status) {
        $this->product_title = $product_title;
        $this->product_category = $product_category;   
        $this->product_desc = $product_desc;
        $this->product_img = $product_img;
        $this->product_price = $product_price;
        $this->product_status = $product_status;
    }

    public static function list_product(){
        $db = new Db();
        $sql = "SELECT * FROM products";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function list_category(){
        $db = new Db();
        $sql = "SELECT * FROM categories";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function list_product_by_status($status){
        $db = new Db();
        $sql = "SELECT * FROM products WHERE product_status = '$status'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function getProductDetail($product_id) {
        $db = new Db();
        $sql = "SELECT * FROM products WHERE product_id = $product_id";
        $result = $db->select_to_array($sql);
        if ($result && count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
}

?>