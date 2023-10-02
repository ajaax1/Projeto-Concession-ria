@extends('layout')
@section('title', $vehicles->name)
@section('content')
@php
    $characteristics = $vehicles->characteristics;
@endphp
<style>
    @media (max-width: 990px) {
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #section1{
        width: 100%!important;
    }
    #section2{
        width: 100%!important;
    }
}
</style>
<main  style="width: 100%; padding-left: 3%;padding-right: 3%;padding-top: 1%;" class="d-flex">
    <section id="section1" style="width: 50%;">
        <h1>{{$vehicles->name}}</h1>
        <img src="{{ asset('storage/' . $vehicles->image) }}" class="img-fluid rounded" alt="Responsive image" style="width: 100%;height: 25rem; margin-bottom: 1rem;">
        <div style="width: 100%; margin-bottom: 1rem; overflow-wrap: break-word;">
            <h6 class="text-justify">Description: {{$vehicles->description}}</h6>
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 1rem;">
            <button class="btn btn-outline-primary text-nowrap">Year: {{$vehicles->year}} </button>
            <button class="btn btn-outline-primary text-nowrap">KM: {{$vehicles->mileage}} </button>
            <button class="btn btn-outline-primary text-nowrap">Fuel: {{$vehicles->fuel}} </button>
        </div>
        <h6>Items:</h6>
        <div class="row" style="max-width:40vw;  margin-bottom: 1rem;">
            @foreach($characteristics as $item)
                <div class="col-md-6">
                    <button class="btn btn-outline-secondary text-nowrap" style="margin-bottom: 0.5rem;">{{ $item }}</button>
                    <br>
                </div>
            @endforeach
        </div>
    </section>
    <section id="section2" class="d-flex flex-column align-items-center justify-content-center" style="width: 50%;max-height:100vh;">
        <h1>I'm interested</h1>
        <h5>Make contact</h5>
        <button style="width:20rem;height: 4rem;margin-bottom: 1rem;" class="btn btn-outline-info">Price ${{ number_format($vehicles->price, 2, ',', '.') }}</button>
        <button style="width:20rem;height: 4rem;margin-bottom: 1rem;" type="button" class="btn btn-outline-success text-nowrap">Proposal via Whatsapp</button>
        <button style="width:20rem;height: 4rem;margin-bottom: 1rem;" type="button" class="btn btn-outline-dark text-nowrap">Proposal via Email</button>
    </section>
</main>
@endsection
