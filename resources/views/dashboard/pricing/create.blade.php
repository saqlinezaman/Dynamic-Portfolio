@extends('layouts.dashboardmaster')
@section('content')
{{-- form  --}}
<div class="row p-4 d-flex justify-content-center " >
    <div class="col-lg-8 col-sm-12 ">
        <div class="card">
            <div class="card-body ">
                <h4 class="header-title">Pricing Create</h4>
                <form action="{{route('pricing.store')}}" method="POST">
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Pricing title</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="Input your Blog titel " value="" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                     {{-- feature --}}
                     <div class="mb-3">
                        <label>Features</label>
                        <div class="mt-2">
                            <input type="checkbox" name="features[]" value="CustomWordPressDevelopment">Custom WordPress Development <br>

                            <input type="checkbox" name="features[]" value="Theme&PluginCustomization">Theme & Plugin Customization<br>

                            <input type="checkbox" name="features[]" value="BugFixing&Troubleshooting">Bug Fixing & Troubleshooting <br>

                            <input type="checkbox" name="features[]" value=" Authentication & Authorization Setup">  Authentication & Authorization Setup<br>

                            <input type="checkbox" name="features[]" value="WAPI Integration (Payment Gateway, 3rd Party Apps)"> API Integration (Payment Gateway, 3rd Party Apps) <br>

                            <input type="checkbox" name="features[]" value="Full Laravel Application Development"> Full Laravel Application Development <br>

                            <input type="checkbox" name="features[]" value="Payment Gateway Setup (Stripe, PayPal, SSLCommerz))">Payment Gateway Setup (Stripe, PayPal, SSLCommerz)<br>

                            <input type="checkbox" name="features[]" value="Role-Based Access Control">Role-Based Access Control <br>
                            <input type="checkbox" name="features[]" value="Custom Admin Dashboard">Custom Admin Dashboard <br>
                            <input type="checkbox" name="features[]" value="Advanced Security Setup">Advanced Security Setup<br>
                            <input type="checkbox" name="features[]" value="Malware & Security Updates">Malware & Security Updates<br>
                        </div>
                    </div>
                    {{-- price --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Price</label>
                        <input type="text" class="form-control @error('price') is_invalid @enderror" id="validationCustom01" placeholder="Input your price " value="" name="price">
                        @error('price')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- popular --}}
                    <div class="mb-3">
                        <input type="checkbox" name="is_popular"> Make this plan popular
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
