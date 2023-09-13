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
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','item has been removed');
    }
    public function increaseQuantity($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function clearAll(){
        Cart::destroy();
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','item has been clear');
    }
    
    public function decreaseQuantity($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty-1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }
    

    
}
