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
                    <span></span> Add New Categories
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
                                        Add New Categories
                                    </div>
                                    <div class="col-md-m6">
                                        <a href="{{ route('admin.categories') }}" class="btn btn-success">All Categories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="mt-3 mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter the Category name">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="Slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter the Category Slug">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div><div>
    {{-- The whole world belongs to you. --}}
</div>
