@extends('layout')
@section('title','Add Vehicles')
@section('content')
<body>
<div  style="width: 100%; min-height:90vh; display: flex;align-items: center;justify-content: center;">
    <div class="container-scroller">
        <h3>Add Vehicles</h3>
        <form action="http://127.0.0.1:8000/admin/send" class="pt-3" method="POST">
          <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                <input type="text" id="form3Example1" name="name" placeholder="Vehicle Name"  class="form-control" />
                <label class="form-label" for="form3Example1">Vehicle Name</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline">
                <input type="text" id="form3Example1" name="price" placeholder="Price" class="form-control" />
                <label class="form-label" for="form3Example1" name="price">Price</label>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                <input type="text" id="form3Example1" name="brand" placeholder="Brand" class="form-control" />
                <label class="form-label" for="form3Example1"  >Brand</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline">
                <input type="text" id="form3Example1" name="year"placeholder="Vehicle Name" class="form-control" />
                <label class="form-label" for="form3Example1" >Year</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                <input type="text" id="form3Example1" name="fuel" placeholder="Fuel" class="form-control" />
                <label class="form-label" for="form3Example1" >Fuel</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline">
                <input type="text" id="form3Example1"  name="mileage" placeholder="Mileage" class="form-control" />
                <label class="form-label" for="form3Example1" >Mileage</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                <textarea type="text" id="form3Example1"   name="description"  placeholder="Description" class="form-control"></textarea>
                <label class="form-label" for="form3Example1" >Description</label>
                </div>
            </div>
        </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background-color:blue;border-color:blue">SIGN UP</button>
          </div>
        </form>
      </div>
</div>
</body>
@endsection
