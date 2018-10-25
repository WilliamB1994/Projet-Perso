<?php

class CartController {
    function httpGetMethod(Http $http, $queryFields) {

        $userSession = new UserSession();
        if ($userSession->isLogged() == false) {
            $http->redirectTo('user/login');
        }

        $cartModel = new CartModel();

        if (array_key_exists('action', $queryFields)) {
            switch ($queryFields['action']) {
                case 'update_quantity':
                    $product_id = intval($queryFields['product_id']);
                    $quantity = intval($queryFields['quantity']);
                    $cartModel->update_product($product_id, $quantity);
                    break;
                case 'increase_quantity':
                    $product_id = intval($queryFields['product_id']);
                    $cartModel->increase_product($product_id);
                    break;
                case 'decrease_quantity':
                    $product_id = intval($queryFields['product_id']);
                    $cartModel->decrease_product($product_id);
                    break;
                case 'clear_cart':
                    $cartModel->clear_cart();
                    break;
                case 'remove_product':
                    $product_id = intval($queryFields['product_id']);
                    $cartModel->remove_product($product_id);
                    break;
            }
        }

        // pas besoin de renvoyer la vue en mode ajax
        if (array_key_exists('ajax', $queryFields)) {
            $productModel = new PoductModel();

            $product = [
                'product_id' => $product_id,
                'price' => floatval($productModel->getPrice($product_id)),
                'quantity' => $cartModel->get_quantity_in_cart($product_id),
                'total_price' => $cartModel->get_total_price()
            ];

            echo json_encode($product);
            // on fait un exit pour ne pas renvoyer la vue en ajax
            exit;
        }

        return [
            'cart' => $cartModel->get_cart(),
            'total_price' => $cartModel->get_total_price()
        ];
    }
}