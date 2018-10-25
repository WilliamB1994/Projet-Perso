<?php


class ProductModel {

    function getProducts() {
        $db = new Database();
        return $db->query("
            SELECT id, title, buyPrice, price, description, pictureUrl, quantityInStock, category_id 
            FROM products
            ");
    }
    function getCategorys() {
        $db = new Database();
        return $db->query("SELECT id, name, contents,pictureUrl FROM productcategory");
    }

    function getPromos() {
        $db = new Database();
        return $db->query("
            SELECT products.id, products.title, buyPrice, price, description,pictureUrl, quantityInStock,promo_id, promodetails
            FROM products
            INNER JOIN promo ON products.promo_id = promo.id
            WHERE promo_id = 1 
            ");
    }

    function getPrice($product_id) {
        $product = $this->getProduct($product_id);
        return $product['price'];
    }

    function getProduct($product_id) {
        $db = new Database();
        $sql = "SELECT id, ref, title, buyPrice, price, description,pictureUrl, quantityInStock FROM products WHERE id = ?";
        return $db->queryOne($sql, [$product_id]);
    }

    function createProduct($title, $description, $quantity, $price) {
    }

    function deleteProduct($product_id) {
    }
}