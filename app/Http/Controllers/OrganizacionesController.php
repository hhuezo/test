<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;

class OrganizacionesController extends Controller
{
   
    public function index()
    {
        //
        $organizaciones = Organizacion::get();
        //dd($egresos); //(verificar los datos de la variable)
        //en compact va el nombre de la variable $banco sin el signo dollar
        return view('organizacion.index', compact('organizaciones'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
