


//this increment decrement parts will works when try to increase or decrease qty
//at the shopping cart page
$(document).ready(function () {
    cartload();
    //increment decrement button actions in shopping cart page
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        //------------------------

        //------------------------
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 250) {
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

    //increment decrement button actions
});



//when user clicks the add to cart button the cartload will executes.
//helps to provide total number of cart items in shopping cart.
function cartload() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/load-cart-data',
        method: "GET",
        success: function (response) {
            $('.basket-item-count').html('');
            var parsed = jQuery.parseJSON(response)
            var value = parsed; //Single Data Viewing
            $('.basket-item-count').append($('<span class="badge rounded-pill bg-danger">' + value['totalcart'] + '</span>'));
        }
    });
}
//this will display the count of items in front of cart icon



//update shopping cart when increment button or decrement button
//presses the subtotal updates(this will work at shopping cart page)
$(document).ready(function () {

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var thisClick = $(this);

        var quantity = $(this).closest(".cartpage").find('.qty-input').val();
        var product_id = $(this).closest(".cartpage").find('.product_id').val();
        var num_of_items = $(this).closest(".cartpage").find('.num_of_items').val();
        var total_price = $(this).closest(".cartpage").find('.grandtotal').val();
        //get the product qty from db
        var qty_from_db_into_cart_list = $(this).closest(".cartpage").find('.db_qty').val();


        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity': quantity,
            'product_id': product_id,
            'num_of_items': num_of_items,
            'total_price': total_price,

        };


        //------------------------TESTING UPDATE TO CART ALERT------------------------------
        if (quantity < 250) { //my method if starts
            //this if condition is used to alert the stock is ran out.
            if (250 <= (qty_from_db_into_cart_list - quantity)) {
                $.ajax({
                    url: '/update-to-cart',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        //window.location.reload();
                        //console.log(response.gtprice);
                        thisClick.closest(".cartpage").find('.cart-grand-total-price').text(response.gtprice);
                        $('#totalajaxcall').load(location.href + ' .totalpricingload');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);

                    }
                });
            } else {
                swal({
                    title: "We can't provide this quantity. Stock is runnning out.",
                    text: "Please reduce the quantity",
                    icon: "warning",
                    dangerMode: true,

                });
            }

        } else {

            swal({
                title: "Order quantity must be less than 250 at a time.",
                text: "Please reduce the quantity",
                icon: "warning",
                dangerMode: true,

            });

        } //my method if ends
        //------------------------TESTING UPDATE TO CART ALERT------------------------------

    });

});
//update to cart





//my method for UPDATE BUTTON
$(document).ready(function () {

    $('.my_update_btn').click(function (e) {
        e.preventDefault();

        var thisClick = $(this);

        var quantity = $(this).closest(".cartpage").find('.qty-input').val();
        var product_id = $(this).closest(".cartpage").find('.product_id').val();
        var num_of_items = $(this).closest(".cartpage").find('.num_of_items').val();
        //get the product qty from db
        var qty_from_db_into_cart_list = $(this).closest(".cartpage").find('.db_qty').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity': quantity,
            'product_id': product_id,
            'num_of_items': num_of_items,


        };

        if (quantity < 250) { //my method if starts
            //this if condition is used to alert the stock is ran out.
            if (250 <= (qty_from_db_into_cart_list - quantity)) {
                //-----------------------------------------
                $.ajax({
                    url: '/update-to-cart',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        window.location.reload();
                        //console.log(response.gtprice);
                        thisClick.closest(".cartpage").find('.cart-grand-total-price').text(response.gtprice);
                        $('#totalajaxcall').load(location.href + ' .totalpricingload');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);

                    }

                });
                //-------------------------------------------
            } else {
                swal({
                    title: "We can't provide this quantity. Stock is runnning out",
                    text: "Please reduce the quantity",
                    icon: "warning",
                    dangerMode: true,

                });
            }

         

        } else {

            swal({
                title: "Order quantity must be less than 250 at a time.",
                text: "",
                icon: "warning",
                dangerMode: true,

            });

        } //my method if ends
    });

});
//my method for UPDATE BUTTON


// Delete Cart Data
$(document).ready(function () {

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();

        var thisDeletearea = $(this);
        var product_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            "product_id": product_id,
        };

        // $(this).closest(".cartpage").remove();

        $.ajax({
            url: '/delete-from-cart',
            type: 'DELETE',
            data: data,
            success: function (response) {
                //product removes with refreshing page
                window.location.reload();
                thisDeletearea.closest(".cartpage").remove();
                $('#totalajaxcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
            }
        });
    });

});
// Delete Cart Data

// Clear Cart Data
$(document).ready(function () {
    $('.clear_cart').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/clear-cart',
            type: 'GET',
            success: function (response) {
                window.location.reload();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
            }
        });
    });

});
// Clear Cart Data


//see more page increment decrement button actions
$(document).ready(function () {
    $('.plus-btn').click(function (e) {
        e.preventDefault();

        var incre_value = $(this).parents('.my-quantity').find('.enter-qty').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 250) {
            value++;
            $(this).parents('.my-quantity').find('.enter-qty').val(value);
        }
    });

    $('.minus-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.my-quantity').find('.enter-qty').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).parents('.my-quantity').find('.enter-qty').val(value);
        }
    });
});

//my Add to cart code (See more page add to cart button)
$(document).ready(function () {
    $('.add-to-mycart').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var quantity = $(this).closest('.product_data').find('.enter-qty').val();


        //--------------------------------------
        if (quantity < 250) { //my method if starts

            if (250 <= (prod_qty_fetched_into_see_more_page - quantity)) {
                //---previous if body part---
                $.ajax({
                    url: "/add-to-cart",
                    method: "POST",
                    data: {
                        'quantity': quantity,
                        'product_id': product_id,
                    },
                    success: function (response) {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                        cartload();
                    },

                });
                //---previous if body part---
            } else {
                swal({
                    title: "We can't provide this quantity. Stock is runnning out.",
                    text: "Please reduce the Quantity.",
                    icon: "warning",
                    dangerMode: true,

                });
            }

        } else {

            swal({
                title: "Order quantity must be less than 250 at a time.",
                text: "Please reduce the Quantity.",
                icon: "warning",
                dangerMode: true,

            });


        } //my method if ends
        //--------------------------------------

    });
});
//my add to cart code end









