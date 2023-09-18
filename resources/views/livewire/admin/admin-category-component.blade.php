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
                    <span></span> All Categories
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
                                    <div class="col-md-6">  All Categories</div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.categories.add')}}" class="btn btn-success float-end">Add new Category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=($categories->currentPage()-1)*$categories->perPage();
                                        @endphp
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td><a href="{{ route('admin.categories.edit',['category_id'=> $category->id]) }}" class="text-info">Edit</a>
                                                <a href="#" class="text-danger" style="margin-left: 20px" onclick="deleteConfirmation({{ $category->id }})">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pt-30 pd-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to delete this record?</h4>
                        <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button class="btn btn-danger" type="button" onclick="deleteCategory()" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('category_id',id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCategory(){
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush