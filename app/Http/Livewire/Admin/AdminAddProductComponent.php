<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $regular_price;
    public $sku;
    public $category_id;
    public $description;
    public $short_description;
    public $stock_status = 'instock';
    public $featured;
    public $quantity;
    public $sale_price;
    public $image;
    public function storeProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'sku' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'short_description' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'sale_price' => 'required',
            'stock_status' => 'required',
        ]);

        $product = new product();
        $product->name = $this->name;
        $product->category_id = $this->category_id;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);

        $product->image = $imageName;
        $product->save();
        session()->flash('message', 'Product has been added successfully!');
    }
    public function generateSlug()
    {
        $this->slug = Str::Slug($this->name);
    }

    public function render()
    {
        $categories = category::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-add-product-component', compact('categories'));
    }
}
