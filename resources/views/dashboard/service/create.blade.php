@extends('layouts.dashboardmaster')
@section('content')

{{-- form  --}}
<div class="row p-4 d-flex justify-content-center " >
    <div class="col-lg-8 col-sm-12 ">
        <div class="card">
            <div class="card-body ">
                <h4 class="header-title">Service Create</h4>
                <form action="{{route('service.store')}}" method="POST">
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Service title</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="Input your Blog titel " value="" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Service description</label>
                        <textarea type="text" class="form-control @error('description') is_invalid @enderror" value="Input your description" id="short_description" name="description"> </textarea>
                        @error('description')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Upload</button>
                </form>
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


