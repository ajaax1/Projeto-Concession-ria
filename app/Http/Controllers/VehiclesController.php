<?php
namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{

    public function add(){
        if(auth()->check()) {
            return view('addVehicles');
        }
        return view('home');
    }

    public function send(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'price'=>'required|decimal',
            'image'=>'required',
            'brand'=>'required',
            'description'=>'required'
        ]);
    }

    public function home(Request $request){
        $vehicles = Vehicles::paginate(9);
        return view('home',compact('vehicles'));
    }

    public function vehicles($slug){
        $vehicles = Vehicles::where('slug', $slug)->firstOrFail();
        return view('vehicle', compact('vehicles'));
    }

    public function vehiclesUsed(){
        $vehicles = Vehicles::where('condition', 'used')->paginate(9);
        return view('used', compact('vehicles'));;
    }

    public function vehiclesNews(){
        $vehicles = Vehicles::where('condition', 'new')->paginate(9);
        return view('news', compact('vehicles'));;
    }

    public function newsSearch(Request $request){
        $searchTerm = $request->search;
        $vehicles = Vehicles::where('condition', 'new')
                            ->where(function($query) use ($searchTerm) {
                                $query->where('name', 'LIKE', "%{$searchTerm}%")
                                      ->orWhere('brand', 'LIKE', "%{$searchTerm}%");
                            })
                            ->paginate(9);
        return view('news', compact('vehicles'));
    }

    public function usedSearch(Request $request){
        $searchTerm = $request->search;
        $vehicles = Vehicles::where('condition', 'used')
                            ->where(function($query) use ($searchTerm) {
                                $query->where('name', 'LIKE', "%{$searchTerm}%")
                                      ->orWhere('brand', 'LIKE', "%{$searchTerm}%");
                            })
                            ->paginate(9);
        return view('used', compact('vehicles'));
    }

    public function searchByPriceUsed()
    {
        $maxPrice = Vehicles::max('price');
        $minPrice = Vehicles::min('price');
        $vehiclesMax = Vehicles::where('price', $maxPrice)->get();
        $vehiclesMin = Vehicles::where('price', $minPrice)->get();

        return view('used', compact('vehiclesMax', 'vehiclesMin'));
    }

public function usedSearchMinPrice(Request $request)
{
    $vehicles = Vehicles::where('condition', 'used')
                    ->orderBy('price', 'asc')
                    ->paginate(9);
    return view('used', compact('vehicles'));
}
public function usedSearchMaxPrice(Request $request)
{
    $vehicles = Vehicles::where('condition', 'used')
                    ->orderBy('price', 'desc')
                    ->paginate(9);
    return view('used', compact('vehicles'));
}

public function newsSearchMaxPrice(Request $request)
{
    $vehicles = Vehicles::where('condition', 'new')
                    ->orderBy('price', 'desc')
                    ->paginate(9);
    return view('news', compact('vehicles'));
}
public function newsSearchMinPrice(Request $request)
{
    $vehicles = Vehicles::where('condition', 'new')
    ->orderBy('price', 'asc')
    ->paginate(9);
    return view('news', compact('vehicles'));
}
}
