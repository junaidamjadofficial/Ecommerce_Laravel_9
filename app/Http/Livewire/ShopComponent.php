<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;


class ShopComponent extends Component
{
    use WithPagination;
    // public $product_name;
    // public function __construct($product_name)
    // {
    //     // $this->product->id = $product_id;
    //     $this->product->name = $product_name;
        
    // }
    public function store($product_id,$product_name,$product_Price)
    {
        Cart::add($product_id,$product_name,1, $product_Price)->associate('\App\Models\product');
        return redirect()->route('shop.cart')->with('success','item has been added in a Cart');
    }
    public function render()
    {
        $products=product::paginate(12);
        return view('livewire.shop-component',['products' => $products]);
    }
}
