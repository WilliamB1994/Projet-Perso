<?php

class CartModel {
    function decrease_product($product_id) {
        $productModel = new ProductModel();
        $product = $productModel->getProduct($product_id);

        $userSession = new UserSession();

        // récupération de la liste
        $cart = $userSession->getCart();

        if (array_key_exists($product_id, $cart) && $cart[$product_id] > 0) {
            // si l'élément existe déjà dans la panier on l'incrémente
            $cart[$product_id]--;
        } else {
            // gestion des quantités négatives
            $cart[$product_id] = 0;
        }

        // enregistrement de la liste
        $userSession->saveCart($cart);
    }

    function increase_product($product_id) {
        $productModel = new ProductModel();
        $product = $productModel->getProduct($product_id);

        $userSession = new UserSession();

        // récupération de la liste
        $cart = $userSession->getCart();

        if (!array_key_exists($product_id, $cart)) {
            // si le produit est fraichement ajouté au panier
            // on crée une ligne
            $cart[$product_id] = 0;
        }

        if ($product['quantityInStock'] < $cart[$product_id] + 1) {
            // si je n'ai pas assez de produit en stock
            $cart[$product_id] = $product['quantityInStock'];

        } else if (array_key_exists($product_id, $cart)) {
            // si l'élément existe déjà dans la panier on l'incrémente
            $cart[$product_id]++;
        }

        // enregistrement de la liste
        $userSession->saveCart($cart);
    }

    function clear_cart() {
        $userSession = new UserSession();
        $userSession->saveCart([]);
    }

    function remove_product($product_id) {
        $userSession = new UserSession();

        // récupération de la liste
        $cart = $userSession->getCart();

        // suppression de la ligne;
        unset($cart[$product_id]);

        // enregistrement de la liste
        $userSession->saveCart($cart);

    }

    function update_product($product_id, $quantity) {
        $userSession = new UserSession();

        // récupération de la liste
        $cart = $userSession->getCart();

        // on empèche les quantités négative
        $quantity = $quantity < 0 ? 0 : $quantity;

        // on vérifie qu'on a suffisement en stock sinon on met le maximum
        $productModel = new ProductModel();
        $quantityInStock = $productModel->getProduct($product_id)['quantityInStock'];
        $quantity = $quantityInStock < $quantity ? $quantityInStock : $quantity;

        // mise à jour de la valeur
        $cart[$product_id] = $quantity;

        // enregistrement de la liste
        $userSession->saveCart($cart);

        return $quantity;
    }

    function get_quantity_in_cart($product_id) {
        $userSession = new UserSession();
        $cart = $userSession->getCart();

        if (!array_key_exists($product_id, $cart))
            return 0;

        return $cart[$product_id];
    }

    function get_total_price() {
        $cart = $this->get_cart();
        $total_price = 0;

        foreach ($cart as $product) {
            $total_price += $product['quantity'] * $product['price'];
        }

        return $total_price;
    }

    function get_cart() {
        $userSession = new UserSession();
        $productModel = new ProductModel();

        // récupération du panier
        $cart = $userSession->getCart();

        // on régénère le tableau $cart avec toutes les infos des produits
        foreach ($cart as $product_id => $quantity) {
            $product_infos = $productModel->getProduct($product_id);
            $cart[$product_id] = $product_infos;
            $cart[$product_id]['quantity'] = $quantity;
        }

        return $cart;
    }
}

