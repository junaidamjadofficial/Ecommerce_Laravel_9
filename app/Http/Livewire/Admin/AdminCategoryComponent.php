<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    public $category_id;
    use WithPagination;
    public function deleteCategory(){
        $category=category::find($this->category_id);
        $category->delete();
        session()->flash('message','Category has been deleted');
    }
    public function render()
    {
        $categories=category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-category-component',compact('categories'));
    }
}
