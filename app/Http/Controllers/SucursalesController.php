<?php

namespace App\Http\Controllers;

use App\Http\Resources\SucursalResource;
use App\Models\Sucursales;
use App\Models\Domicilio;
use App\Models\Mesas;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales=Sucursales::all();
        
        return Inertia::render('Sucursales/Index',['sucursales'=>$sucursales]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Sucursales/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Sucursales::class],
            'telefono' => ['required', 'string'],
            'mesas' => ['required', 'integer', 'min:1'],
            'colonia' => ['required', 'string'],
            'calle' => ['required', 'string'],
            'numero' => ['required','string'],
            'estado' => ['required', 'string'],
            'pais' => ['required', 'string'],
        ]);
        $sucursal = Sucursales::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);
        for ($i = 1; $i <= $request->mesas; $i++) {
            Mesas::create([
                'ocupantes'=>0,
                'estatus'=> 'activa',
                'sucursales_id'=>$sucursal->id,
                'nombre'=>'Mesa'.$i
            ]);
        }
        $sucursal->domicilio()->create([
            'calle'=> $request->calle,
            'numero'=> $request->numero,
            'colonia'=> $request->colonia,
            'cp'=> $request->cp,
            'estado'=> $request->estado,
            'pais'=> $request->pais
        ]);

        return redirect()->route("panel.sucursales.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursales $sucursales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sucursales $sucursale)
    {   
        
        return Inertia::render('Sucursales/Edit', ['item'=>new SucursalResource($sucursale)]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Sucursales $sucursale)
    {
        $sucursale->domicilio;
        //dd($sucursale);
        return Inertia::render('Sucursales/Edit',$sucursale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursales $sucursale)
    {
        $sucursale->delete();
        return redirect()->route("panel.sucursales.index");
    }
    public function dashboard(){
        $sucursales=Auth::user()->sucursales()->with('mesas')->first();
        return Inertia::render('Dashboard', ['sucursales'=>$sucursales]);
    }
}
