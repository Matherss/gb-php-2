<?
include_once('config/config.php');



class M_Admin {
    function get_orders(){
        try {
            
            $sql = "SELECT * FROM orders";
            $result = db::getInstance()->Select($sql);
            return $result;
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function order_change($status,$id){
        try {
            $sql = "UPDATE `orders` SET `id_order_status`='$status' WHERE id_order=$id";
            $result = db::getInstance()->Query($sql);
            if($result){
                return true;
            }
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}