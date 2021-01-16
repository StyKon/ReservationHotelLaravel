<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ville;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = Ville::latest()->paginate();
        return view('Admin/Ville.index',compact('villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Ville.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'Nom' => 'string|required'
          ]);

          Ville::create($request->all());

          return redirect()->route('Ville.index')
          ->with('success', 'Ville  ajouter avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ville = Ville::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ville = Ville::find($id);
        return view('Admin/Ville.edit',compact('ville'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required'

          ]);
          $ville = Ville::find($id);
          $ville->Nom = $request->get('Nom');
          $ville->save();

          return redirect()->route('Ville.index')
          ->with('success', 'Ville  modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ville = Ville::find($id);
        $ville->delete();

       /* return redirect()->route('Ville.index')
        ->with('success', 'Ville  supprimer avec succés');*/
    }
}
