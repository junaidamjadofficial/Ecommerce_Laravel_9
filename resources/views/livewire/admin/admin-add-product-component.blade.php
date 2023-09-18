<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
        
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Add New Product
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Add New Product
                                    </div>
                                    <div class="col-md-m6">
                                        <a href="{{ route('admin.product') }}" class="btn btn-success  float-end">All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="storeProduct" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                                    @endif
                                    <div class="mt-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter the Product name"  wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="Slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter the Product Slug" wire:model="slug">
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="short_description">Short Description</label>
                                        <textarea name="short_description" cols="30" class="form-control" placeholder="Enter the short Description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea name="description" cols="30" class="form-control" placeholder="Enter the Description"wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="regular_price">Regular Price</label>
                                        <input type="number" name="regular_price"class="form-control" wire:model="regular_price">
                                        @error('regular_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="sale_price">Sale Price</label>
                                        <input type="number" name="sale_price"  class="form-control"  wire:model="sale_price">
                                        @error('sale_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
        
                                    <div class="mt-3">
                                        <label class="form-label" for="sku">SKU</label>
                                        <input type="text" name="sku" class="form-control" placeholder="Enter the sku" wire:model="sku">
                                        @error('sku')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="stock_status">Stock Status</label>
                                        <select class="form-control" name="stock_status" wire:model="stock_status">
                                            <option value="instock">Instock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="featured">Featured</label>
                                        <select class="form-control" name="featured" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="quantity">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Enter the Product Quantity" wire:model="quantity">
                                        @error('quantity')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" name="image" class="form-control"  wire:model="image">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120" alt="">
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="category_id">Category</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary  btn-lg mt-3  float-end" type="submit">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>