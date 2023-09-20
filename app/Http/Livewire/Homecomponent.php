<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\category;
use App\Models\HomeSlider;
use Gloudemans\Shoppingcart\Facades\Cart;

class Homecomponent extends Component
{
    public function store($product_id,$product_name,$product_Price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1, $product_Price)->associate('\App\Models\product');
        $this->emitTo('cart-icon-component','refreshComponent');
        // return redirect()->route('shop.cart')->with('success','item has been added in a Cart');
    }
    public function render()
    {
        $slides=HomeSlider::where('status',1)->get();
        $lproducts=product::orderBy('created_at','DESC')->get()->take(8);
        $fproducts=product::where('featured',1)->inRandomOrder()->get()->take(8);
        $pCategories=category::where('is_popular',1)->InRandomOrder()->get()->take(8);
        return view('livewire.homecomponent',compact('slides','lproducts','fproducts','pCategories'));
    }
}
