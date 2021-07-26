@extends('shop.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <h3>Cart</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart->items as $key => $value)
                <tr>
                    <td class="col-sm-6 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"> {{ $value['item']->name }}</a></h4>
{{--                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>--}}
                            </div>
                        </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control quantity-product" data-id="{{ $value['item']->id }}" value="{{ $value['quantity'] }}">
                    </td>
                    <td class="col-sm-2 col-md-2 text-center"><strong id="product-price-{{$value['item']->id}}">${{ number_format($value['item']->price) }}</strong></td>
                    <td class="col-sm-2 col-md-2 text-center"><strong id="product-total-price-{{$value['item']->id}}">${{ number_format($value['price']) }}</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <a onclick="return confirm('Are you sure?')" href="{{ route('cart.deleteToCart', $key) }}" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong id="total-price-cart">${{ number_format($cart->totalPrice) }}</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
