<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    public function render()
    {
        return view('livewire.cart-component');
    }
    public function destroy($id){
        Cart::remove($id);
        session()->flash('success_message','item has been removed');
    }
    public function increaseQuantity($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId,$qty);
    }

    public function clearAll(){
        Cart::destroy();
        session()->flash('success_message','item has been clear');
    }
    
    public function decreaseQuantity($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty-1;
        Cart::update($rowId,$qty);
    }
    

    
}
