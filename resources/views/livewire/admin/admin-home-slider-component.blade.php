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
                    <span></span> All Slides
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
                                    <div class="col-md-6">  All Slides</div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slide.add')}}" class="btn btn-success float-end">Add new Slides </a>
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
                                            <th>Image</th>
                                            <th>TopTitle</th>
                                            <th>title</th>
                                            <th>subTitle</th>
                                            <th>offer</th>
                                            <th>link</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=0;
                                            // $i=($slides->currentPage()-1)*$slides->perPage();
                                        @endphp
                                        @foreach ($slides as $slide)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="{{ asset('assets/imgs/slider')}}/{{ $slide->image }}" width="80px"></td>
                                            <td>{{ $slide->top_title }}</td>
                                            <td>{{ $slide->title }}</td>
                                            <td>{{ $slide->sub_title }}</td>
                                            <td>{{ $slide->offer }}</td>
                                            <td>{{ $slide->link }}</td>
                                            <td>{{ $slide->status==1 ?'Active':'Inactive' }}</td>
                                            <td><a href="{{ route('admin.home.slide.edit',['Slide_id'=>  $slide->id ]) }}" class="text-info">Edit</a>
                                                <a href="#" class="text-danger" style="margin-left: 20px" onclick="deleteConfirmation({{ $slide->id }})">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $slides->links('pagination::bootstrap-5') }} --}}
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
                        <button class="btn btn-danger" type="button" onclick="deleteSlide()" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('slide_id',id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteSlide(){
            @this.call('deleteSlide');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush