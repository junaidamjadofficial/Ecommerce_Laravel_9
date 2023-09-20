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

    public $min_value=0;
    public $max_value=1000;

    public function removefromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }
    public function store($product_id,$product_name,$product_Price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1, $product_Price)->associate('\App\Models\product');
        $this->emitTo('cart-icon-component','refreshComponent');
        // return redirect()->route('shop.cart')->with('success','item has been added in a Cart');
    }
    public function changePageSize($Size){
        $this->pageSize=$Size;
    }
    public function changeOrderBy($order)
    {
        $this->orderby=$order;
    }
    public function AddtoWishlist($product_id,$product_name,$product_Price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_Price)->associate('\App\Models\product');

        $this->emitTo('wishlist-icon-component','refreshComponent');
    }
   
    public function render()
    {
        if($this->orderby == 'Price: Low to High'){
            $products=whereBetween('regular_price',[$this->min_value,$this->max_value])->product::orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderby == 'Price: High to Low'){
            $products=product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderby == 'latest'){
            $products=product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products=product::whereBetween('regular_price',[$this->min_value,$this->max_value])->paginate($this->pageSize);
        }
        $categories=category::orderBy('name','ASC')->get();
        return view('livewire.shop-component',compact('products','categories'));
    }
}
