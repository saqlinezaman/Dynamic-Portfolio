 @extends('layouts.dashboardmaster')

 @section('content')
 <div class="row p-4">
    {{-- catagory insert table --}}
    <div class="col-sm-4 col-lg-7">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle mb-0 bg-white " >
                    <thead class="bg-light">
                      <tr>
                        <th>Category image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                              <img
                                  src="{{ asset('uploads/category/') }}/{{$category->image}}"
                                  alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                                  />
                            </div>
                          </td>
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$category->title}} </p>
                            <p class="text-muted mb-0"> {{$category->slug}}</p>
                          </td>
                          <td>
                            <span class="badge bg-success rounded-pill d-inline">Active</span>
                          </td>
                          <td>
                            <a href="{{route('category.edit',$category->slug)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    {{-- catagory form --}}
    <div class="col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Category insert</h4>
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category title</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your category titel " value="" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category slug</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your category slug " value="" name="slug">
                    </div>
                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/default/default.png')}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category image</label>
                        <input onchange="document.querySelector('#masudMama').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="validationCustom01" value="" name="image">
                        @error('image')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">insert</button>
                </form>
            </div>
        </div>
    </div>
 </div>
 @endsection

 @section('script')
 {{-- category create --}}
 @if (session('cat_success'))

 <script>
    Toastify({
   text: "{{session('cat_success')}}",
   duration: 4000,
   newWindow: true,
   close: true,
   gravity: "top", // `top` or `bottom`
   position: "right", // `left`, `center` or `right`
   stopOnFocus: true, // Prevents dismissing of toast on hover
   style: {
     background: "linear-gradient(to right, #00b09b, #96c93d)",
   },
   onClick: function(){} // Callback after click
 }).showToast();
 </script>

 @endif
 @endsection
