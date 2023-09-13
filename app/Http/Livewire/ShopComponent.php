<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;


class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderby="Default Sorting";
   
    public function store($product_id,$product_name,$product_Price)
    {
        Cart::add($product_id,$product_name,1, $product_Price)->associate('\App\Models\product');
        return redirect()->route('shop.cart')->with('success','item has been added in a Cart');
    }
    public function changePageSize($Size){
        $this->pageSize=$Size;
    }
    public function changeOrderBy($order)
    {
        $this->orderby=$order;
    }
    public function render()
    {
        if($this->orderby == 'Price: Low to High'){
            $products=product::orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderby == 'Price: High to Low'){
            $products=product::orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderby == 'latest'){
            $products=product::orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products=product::paginate($this->pageSize);
        }
        $categories=category::orderBy('name','ASC')->get();
        return view('livewire.shop-component',compact('products','categories'));
    }
}
