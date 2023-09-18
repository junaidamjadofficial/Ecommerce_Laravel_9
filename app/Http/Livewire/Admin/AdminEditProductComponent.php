<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;



class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $product_id;
    public $slug;
    public $regular_price;
    public $sku;
    public $category_id;
    public $description;
    public $short_description;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $sale_price;
    public $image;
    public $newimage;

    public function mount($product_id){
        $product=product::find($product_id);
         $this->name=$product->name;
         $this->product_id=$product->id;
         $this->slug=$product->slug;
         $this->regular_price=$product->regular_price;
         $this->sku=$product->SKU;
         $this->category_id=$product->category_id;
         $this->description=$product->description;
         $this->short_description=$product->short_description;
         $this->stock_status = $product->stock_status;
         $this->featured = $product->featured;
         $this->quantity=$product->quantity;
         $this->sale_price=$product->sale_price;
         $this->image=$product->image;
    }

    public function UpdateProduct(Request $request)
    {
        $validator=Validator::make($request->serverMemo['data'],[
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
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
        if($validator->passes())
        {
            $product =product::find($this->product_id);
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
            if($this->newimage)
            {
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('products', $imageName);
                $product->image = $imageName;
                $product->save();
                session()->flash('message', 'Product has been updated successfully!');
                return redirect()->route('admin.product');
            }
        }
        else
        {
            return redirect()->route('admin.product');
        }
        
       
    }
    public function generateSlug()
    {
        $this->slug = Str::Slug($this->name);
    }
    public function render()
    {
        $categories = category::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-edit-product-component',compact('categories'));
    }
}
