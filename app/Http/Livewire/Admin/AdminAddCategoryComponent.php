<?php

namespace App\Http\Livewire\Admin;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public function generateSlug(){
        $this->slug=Str::Slug($this->name);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
        'name'=>'required',
        'slug' => 'required',            
        ]);
    }
    public function storeCategory(Request $request){
        $this->validate([
            'name'=>'required',
            'slug' => 'required',            
            ]);
       $category=new category();
       $category->name=$this->name;
       $category->slug=$this->slug;
       $category->save();
       session()->flash('message','Category has been added successfully!');
       return redirect()->back();
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
