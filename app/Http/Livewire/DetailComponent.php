<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class DetailComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug=$slug;
    }
  
    public function render()
    {
        $product=product::where('slug',$this->slug)->first();
        $rproducts=product::where('category_id',$product->category_id)->inRandomorder()->limit(4)->get();
        $nproducts=product::latest()->take(4)->get();
        return view('livewire.detail-component',['product'=>$product,'rproducts'=> $rproducts,'nproducts'=>$nproducts]);
    }

    public function store($product_id,$product_name,$product_Price)
    {
        Cart::add($product_id,$product_name,1,$product_Price)->associate('\App\Models\product');
        return redirect()->route('shop.cart')->with('success','item has been added in a Cart');
    }
}
