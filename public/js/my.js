$(document).ready(function () {
    $('.quantity-product').change(function () {
        let value = $(this).val();
        let idProduct = $(this).attr('data-id');
        let location = window.location.origin;

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
    });


})

//cu phap
/*

$(selector).action()
 */
