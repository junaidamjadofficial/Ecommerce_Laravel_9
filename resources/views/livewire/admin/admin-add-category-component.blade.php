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
                    <span></span> Add New Category
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
                                        Add New Category
                                    </div>
                                    <div class="col-md-m6">
                                        <a href="{{ route('admin.categories') }}" class="btn btn-success  float-end">All Category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="storeCategory">
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
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" name="image" class="form-control" wire:model="image">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="100">
                                        @endif()
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3 mb-3 ">
                                        <label class="form-label" for="is_popular">Popular</label>
                                        <select name="is_popular" class="form-select" wire:model="is_popular">
                                            <option value="0" selected="selected">no</option>
                                            <option value="1">yes</option>
                                        </select>
                                        @error('is_popular')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary  float-end" type="submit">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>