<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{
    public $slide_id;
    public function deleteSlide(){
        $slide=HomeSlider::find($this->slide_id);
        $slide->delete();
        session()->flash('message','Slide has been deleted');
    }
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-home-slider-component',compact('slides'));
    }
}
