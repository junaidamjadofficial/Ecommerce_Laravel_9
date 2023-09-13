<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;


class CategoryComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderby="Default Sorting";
    public $slug;
    public function mount($slug){
        $this->slug=$slug;
    }
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
        $category=category::where('slug',$this->slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        if($this->orderby == 'Price: Low to High'){
            $products=product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderby == 'Price: High to Low'){
            $products=product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderby == 'latest'){
            $products=product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products=product::where('category_id',$category_id)->paginate($this->pageSize);
        }
        $categories=category::orderBy('name','ASC')->get();
        return view('livewire.category-component',compact('products','categories','category_name'));
    }
}
