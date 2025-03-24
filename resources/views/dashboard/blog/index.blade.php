@extends('layouts.dashboardmaster')
@section('content')

<div class="row p-2">
    <div class="col-sm-4 col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle mb-0 bg-white " >
                    <thead class="bg-light text-center">
                      <tr>
                        <th>blog image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @forelse ($blogs as $blog)
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                              <img
                                  src="{{ asset('uploads/blog/') }}/{{$blog->thumbnail}}"
                                  alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                                  />
                            </div>
                          </td>
                          {{-- title and slug --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$blog->title}} </p>
                            <p class="text-muted mb-0"> {{$blog->slug}}</p>
                          </td>
                          {{-- category --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$blog->onecategory->title}} </p>
                          </td>

                          <td>
                            {{-- <form id="halamadrid{{$category->id}}" action="{{route('category.status',$category->id)}}" method="POST">
                                @csrf
                            <div class="form-check form-switch">
                                <input onchange="document.querySelector('#halamadrid{{$category->id}}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{$category->status == 'active' ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault"> {{$category->status}} </label>
                              </div>
                            </form> --}}
                            <form id="halamadrid{{ $blog->id }}" action="{{ route('category.status',$blog->id) }}" method="POST">
                                @csrf
                            <div class="form-check form-switch">
                                <input onchange="document.querySelector('#halamadrid{{ $blog->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $blog->status == 'active' ? 'checked' : '' }}>
                              </div>
                            </form>
                          </td>
                          {{-- edit --}}
                          <td class="d-flex">
                            <a href="{{route('blog.edit',$blog->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            <a href="{{route('category.destroy',$blog->slug)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#want_to_show{{$blog->id}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i style="color: rgb(27, 180, 27)" class="fa-regular fa-eye"></i>
                            </a>
                            </td>
                        </tr>
                        <!-- show blog -->
                            <div class="modal fade" id="want_to_show{{$blog->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> {{$blog->title}} </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Slug : {{$blog->slug}} <br>
                                    Category : {{$blog->onecategory->title}} <br>
                                    Description : {!!$blog->description!!} <br>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">
                                You don't create any category
                            </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{-- pagination --}}
                  <div class="pt-5 d-flex justify-content-center">
                    {{$blogs->links()}}
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('script')

@if (session('success'))

<script>
   Toastify({
  text: "{{session('success')}}",
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
