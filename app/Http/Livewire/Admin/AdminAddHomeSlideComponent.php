<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;

    public function addSlide()
    {
        $this->validate([ 
            'top_title'=> 'required',
            'title'=> 'required',
            'sub_title'=> 'required',
            'offer'=> 'required',
            'status'=> 'required',
            'image'=> 'required',
            'link'=> 'required',
        ]);
        $slide=new HomeSlider();
        $slide->top_title=$this->top_title;
        $slide->title=$this->title;
        $slide->sub_title=$this->sub_title;
        $slide->offer=$this->offer;
        $slide->status=$this->status;
        $slide->link=$this->link;
        $slide_image=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider',$slide_image);
        $slide->image=$slide_image;
        $slide->save();
        session()->flash('message','Slide has been Added Successfully!');
        return redirect()->route('admin.home.slider');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-component');
    }
}
