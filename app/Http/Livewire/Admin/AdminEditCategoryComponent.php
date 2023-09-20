<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $is_popular;
    public $newimage;

    public function mount($category_id){
        $category=category::findOrFail($category_id);
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;
        $this->image=$category->image;
        $this->is_popular=$category->is_popular;
    }
    public function generateSlug(){
        $this->slug=Str::Slug($this->name);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
        'name'=>'required',
        'slug' => 'required',  
        'image' => 'required',
        'is_popular' => 'required',           
        ]);
    }
    public function UpdatedCategory(Request $request){
        $validator=Validator::make($request->serverMemo['data'],[
        'name'=>'required',
        'slug' => 'required',   
        'image' => 'required',
        'is_popular' => 'required',         
        ]);
        $category=category::find($this->category_id);
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->is_popular=$this->is_popular;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('categories', $imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message','Category has been updated successfully!');
        return redirect()->route('admin.categories');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
