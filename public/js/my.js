$(document).ready(function () {

    let location = window.location.origin;

    $('.quantity-product').change(function () {
        let idProduct = $(this).attr('data-id');
        let value = $(this).val();

        if (value == 0) {
            deleteProductToCart(idProduct)
        } else {
            updateProductToCart(idProduct, value)
        }
    });

    function deleteProductToCart(idProduct) {
        // su ly ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: location + '/cart/' + idProduct + '/delete-to-cart',
            method: 'GET',
            success: function (response) {
                // su ly du lieu tra ve
                $('#product-' + idProduct).remove();
            },

            error: function (error) {
                console.log(error);
            }
        })
    }

    function updateProductToCart(idProduct, value) {
        // su ly ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: location + '/cart/' + idProduct + '/update-to-cart',
            method: 'POST',
            data: {
                newQuantity: value
            },
            success: function (response) {
                // su ly du lieu tra ve
                $('#product-total-price-' + idProduct).html(response.productUpdate.price);
                $('#total-price-cart').html(response.totalPriceCart);
            },

            error: function (error) {
                console.log(error);
            }
        })
    }

    $('.delete-product').click(function () {
        let idProduct = $(this).attr('data-id');
        deleteProductToCart(idProduct);
    });

    $('.add-to-cart').click(function () {
        let productId = $(this).attr('data-id');
        $.ajax({
            url: location + 'cart/' + productId + '/add-to-cart',
            method: 'GET',
            type: 'json',
            success: function (res) {
                let totalQuantityProduct = res.totalQuantityProduct;
                $('#total-quantity-product').html(totalQuantityProduct)
            }
        })
    })


})

//cu phap
/*

$(selector).action()
 */
