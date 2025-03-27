@extends('layouts.dashboardmaster')
@section('content')

<div class="row p-2">
    <div class="col-sm-4 col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle mb-0 bg-white " >
                    <thead class="bg-light text-center">
                      <tr>
                        <th>Testimonal thumbnail</th>
                        <th>Name & Occupation</th>
                        <th>Ratting</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @forelse ($testimonials as $testimonial)
                    <tbody class="text-center">
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                              <img
                                  src="{{ asset('uploads/testimonial/') }}/{{$testimonial->thumbnail}}"
                                  alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                                  />
                            </div>
                          </td>
                          {{-- Name and occu pation --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$testimonial->name}} </p>
                            <p class="fw-normal mb-1 fw-bold"> {{$testimonial->occupation}} </p>
                          </td>
                          {{-- category --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$testimonial->stars}} </p>
                          </td>

                          <td>
                            {{-- <form id="halamadrid{{$category->id}}" action="{{route('category.status',$category->id)}}" method="POST">
                                @csrf
                            <div class="form-check form-switch">
                                <input onchange="document.querySelector('#halamadrid{{$category->id}}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{$category->status == 'active' ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault"> {{$category->status}} </label>
                              </div>
                            </form> --}}
                            <form id="halamadrid{{ $testimonial->id }}" action="{{ route('category.status',$testimonial->id) }}" method="POST">
                                @csrf
                            <div class="form-check form-switch justify-item-center d-flex">
                                <input onchange="document.querySelector('#halamadrid{{ $testimonial->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $testimonial->status == 'active' ? 'checked' : '' }}>
                              </div>
                            </form>
                          </td>
                          {{-- edit --}}
                          <td class="d-flex">
                            <a href="{{route('testimonial.edit',$testimonial->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            <a href="{{route('blog.delete',$testimonial->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">
                                You don't create any Testimonials
                            </td>
                        </tr>
                    </tbody>
                    @endforelse
                  </table>
                  {{-- pagination --}}
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
