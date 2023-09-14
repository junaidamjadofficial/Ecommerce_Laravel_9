<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories=category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-category-component',compact('categories'));
    }
}
