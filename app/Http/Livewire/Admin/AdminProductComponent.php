<?php

namespace App\Http\Livewire\Admin;

use App\Models\product;
use Livewire\Component;
use livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $product_id;

    public function deleteProduct(){
        $product=product::find($this->product_id);
        $product->delete();
        session()->flash('message','Product has been deleted');
    }
    public function render()
    {
        $products=product::orderBy('created_at','desc')->paginate(10);
        return view('livewire.admin.admin-product-component',compact('products'));
    }
}
