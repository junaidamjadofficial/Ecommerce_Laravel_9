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
                    <span></span> Add New Slide
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
                                        Add New Slide
                                    </div>
                                    <div class="col-md-m6">
                                        <a href="{{ route('admin.home.slider') }}" class="btn btn-success  float-end">All Slide</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="addSlide">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                                    @endif
                                    <div class="mt-3">
                                        <label class="form-label" for="top_title">Top Title</label>
                                        <input type="text" name="top_title" class="form-control" placeholder="Enter the Slide Top title"  wire:model="top_title">
                                        @error('top_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter the Slide title" wire:model="title">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="sub_title">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" placeholder="Enter the Slide sub title" wire:model="sub_title">
                                        @error('sub_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> <div class="mt-3">
                                        <label class="form-label" for="offer">offer</label>
                                        <input type="text" name="offer" class="form-control" placeholder="Enter the Slide offer" wire:model="offer">
                                        @error('offer')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> <div class="mt-3">
                                        <label class="form-label" for="link">link</label>
                                        <input type="text" name="link" class="form-control" placeholder="Enter the Slide link" wire:model="link">
                                        @error('link')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="form-select" name="status" wire:model='status'>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" name="image" class="form-control"  wire:model="image">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="100">
                                        @endif
                                        @error('image')
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