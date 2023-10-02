@extends('layout')
@section('title','News Cars')
@section('content')
<style>
    @media (max-width: 800px) {
    #filter{
        flex-direction:column!important;
    }
    #prices{
        margin-top: 1rem;
    }
}
</style>
<main style="width: 100%; display:flex;justify-content:center; ">
    <section style="width: 70%;">
        <div id="filter" class="d-flex justify-content-between align-items-center" style="width: 100%;margin-bottom: 2rem;margin-top: 2rem;">
            <form class="form d-flex" style="width: 20rem;" action="{{route('newsVehicles.search')}}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
              <div id="prices" class="d-flex align-items-center" style="gap:1rem;">
                <form action="{{ route('newsVehiclesMaxPrice.search') }}" method="get">
                    @csrf
                    <button class="btn btn-secondary btn-sm" type="submit" name="priceOrder" value="highest">Biggest price</button>
                </form>
                <form action="{{ route('newsVehiclesMinPrice.search') }}" method="get">
                    @csrf
                    <button class="btn btn-secondary btn-sm" type="submit" name="priceOrder" value="lowest">Lowest price</button>
                </form>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-bottom: 2rem;">
            @foreach ($vehicles as $vehicle)
            <div class="col">
                <div class="card" >
                    <img style="height:15rem;" src="{{ asset('storage/' . $vehicle->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ substr($vehicle->name, 0, 30) }}</h5>
                    <p class="card-text">{{ ($vehicle->brand) }}</p>
                    <div class="d-flex justify-content-between" >
                        <p class="card-text">${{ number_format($vehicle->price, 2, ',', '.') }}</p>
                        <p class="card-text">{{ number_format($vehicle->mileage, 0, '', '.') }} KM</p>
                    </div>
                    <a href="/vehicles/{{($vehicle->slug)}}" class="btn btn-dark">I'm interested</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $vehicles->links() }}
        </div>
    </section>
</main>
@endsection
