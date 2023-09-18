<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;
    public $Slide_id;
    public $newimage;

    public function mount($Slide_id){
        $slide=HomeSlider::find($Slide_id);
        $this->top_title=$slide->top_title;
        $this->sub_title=$slide->sub_title;
        $this->title=$slide->title;
        $this->offer=$slide->offer;
        $this->status=$slide->status;
        $this->image=$slide->image;
        $this->link=$slide->link;
        $this->Slide_id=$slide->id;
    }
    public function UpdateSlide()
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
        $slide=HomeSlider::find($this->Slide_id);
        $slide->top_title=$this->top_title;
        $slide->title=$this->title;
        $slide->sub_title=$this->sub_title;
        $slide->offer=$this->offer;
        $slide->status=$this->status;
        $slide->link=$this->link;
        if($this->newimage){
            $slide_image=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('slider',$slide_image);
            $slide->image=$slide_image;
        }
       
        $slide->save();
        session()->flash('message','Slide has been Updated Successfully!');
        return redirect()->route('admin.home.slider');
    }
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-edit-home-slide-component',compact('slides'));
    }
}
