<?php


namespace App;


class Cart
{
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    function add($product) {

        $storeProduct = [
            "item" => $product,
            "price" => 0,
            "quantity" => 0
        ];

        //kiem tra san pham ton tai trong gio hang chua
        if (array_key_exists($product->id, $this->items)) {
            $storeProduct = $this->items[$product->id];
        }

        //tang san pham len 1 don vi
        $storeProduct['quantity']++;
        $storeProduct['price'] += $product->price;

        $this->items[$product->id] = $storeProduct;

        //tang so luong sp trong gio hang
        $this->totalQuantity++;
        $this->totalPrice += $product->price;

    }

    function delete($product) {
        //kiem tra san pham ton tai trong gio hang chua
        if (array_key_exists($product->id, $this->items)) {
            $storeProductDelete = $this->items[$product->id];
            //giam tien
            $this->totalPrice -= $storeProductDelete['price'];
            //giam so luong
            $this->totalQuantity -= $storeProductDelete['quantity'];
            // xoa phan tu o vi tri $product->id
            unset($this->items[$product->id]);
        }
    }

    function update() {

    }
}
