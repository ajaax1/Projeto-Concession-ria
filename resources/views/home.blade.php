@extends('layout')
@section('title','Home')
@section('content')
<style>
   @media (min-width:900px){
    body{
        overflow:auto;
    }
}
body{
        overflow: hidden;
    }
</style>
<main style="height: 90vh;">
    <section style="
    background-image: url({{ asset('back/images/homeCar.jpg') }});
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 100%;
    display:flex;
    align-items:center;
    justify-content: center;
    flex-direction: column;
    ">
    <h1 style="color:#0000ff;">Welcome to the</h1>
    <h1 style="color:#0000ff;">Concessionaire</h1>
    <div>
        <a href="/newsVehicles"><button style="width: 11rem;color:white;" type="button" class="btn btn-outline-primary ">New Vehicles</button></a>
        <a href="/usedVehicles" ><button type="button" style="width: 11rem;color:white;" class="btn btn-outline-primary ">Used Vehicles</button></a>
    </div>
    </section>
</main>
@endsection

