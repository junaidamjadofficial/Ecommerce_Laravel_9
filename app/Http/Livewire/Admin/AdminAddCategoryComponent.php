<?php

namespace App\Http\Livewire\Admin;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $is_popular;
    
    public function generateSlug(){
        $this->slug=Str::Slug($this->name);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
        'name'=>'required',
        'slug' => 'required',
        'image' => 'required',            
        ]);
    }
    public function storeCategory(Request $request){
       
        $this->validate([
            'name'=>'required',
            'slug' => 'required',
            'image' =>'required',            
            ]);
       $category=new category();
       $category->name=$this->name;
       $category->slug=$this->slug;
       $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
       $this->image->storeAs('categories',$imageName);
       $category->image=$imageName;
       $category->is_popular=$this->is_popular;
       $category->save();
       session()->flash('message','Category has been added successfully!');
       return redirect()->back();
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
