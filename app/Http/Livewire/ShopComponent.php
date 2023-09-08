<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products=product::paginate(12);
        return view('livewire.shop-component',['products' => $products]);
    }
}
