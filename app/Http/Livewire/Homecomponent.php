<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\HomeSlider;

class Homecomponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::where('status',1)->get();
        $lproducts=product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.homecomponent',compact('slides','lproducts'));
    }
}
