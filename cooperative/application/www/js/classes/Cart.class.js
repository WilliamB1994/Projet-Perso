"use strict";
/* Créer une classe javascript avec ECMA Script 5.1
 // constructeur
 var Cart = function(){
 // déclaration des membres
 this.truc = 12;
 };

 //une méthode
 Cart.prototype.ma_fonction = function(){
 // blabalbla
 };
 */

class Cart {
    onAjaxUpdateQuantity(response) {
        let tr = $('#' + response['meal_id']);
        let price = (response['quantity'] * response['price']).toFixed(2) + ' €';
        let totalPrice = response['total_price'].toFixed(2) + ' €';

        tr.find('.price').text(price);
        tr.find('input').val(response['quantity']);
        $('#totalPrice').text(totalPrice)
    }

    onClickMinus(event) {
        event.preventDefault();
        let meal_id = $(event.currentTarget).closest('tr').attr('id');
        let queryString = '?action=decrease_quantity&ajax&meal_id=' + meal_id;
        $.get(getRequestUrl() + queryString, this.onAjaxUpdateQuantity, "json");
    }

    onClickPlus(event) {
        event.preventDefault();
        let meal_id = $(event.currentTarget).closest('tr').attr('id');
        let queryString = '?action=increase_quantity&ajax&meal_id=' + meal_id;
        $.get(getRequestUrl() + queryString, this.onAjaxUpdateQuantity, "json");
    }

    onChangeQuantity() {
        let meal_id = $(event.currentTarget).closest('tr').attr('id');
        let quantity = $(event.currentTarget).val();
        let queryString = '?action=update_quantity&ajax&meal_id=' + meal_id + '&quantity=' + quantity;

        $.get(getRequestUrl() + queryString, this.onAjaxUpdateQuantity, "json");
    }

    onClickRemoveMeal(event) {
        event.preventDefault();
        let tr = $(event.currentTarget).closest('tr');
        let meal_id = tr.attr('id');
        let queryString = '?action=remove_meal&ajax&meal_id=' + meal_id;
        $.get(getRequestUrl() + queryString, this.onAjaxUpdateQuantity, "json");
        tr.children('td').fadeOut();
    }

    onClickAddToCart(event) {
        event.preventDefault();
        // équivalent jquery : $(event.currentTarget).attr('href')
        $.get(event.currentTarget.href + '&ajax')
    }

    init() {
        $('.minusQuantity').click(this.onClickMinus.bind(this));
        $('.plusQuantity').click(this.onClickPlus.bind(this));
        $('.quantity').change(this.onChangeQuantity.bind(this));
        $('.removeMeal').click(this.onClickRemoveMeal.bind(this));
        $('.add-to-cart').click(this.onClickAddToCart.bind(this));
    }
}