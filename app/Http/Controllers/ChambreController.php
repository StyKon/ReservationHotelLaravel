<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Chambre;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chambres = Chambre::latest()->paginate();
        return view('Admin/Chambre.index',compact('chambres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = DB::table('hotels')->get();
        return view('Admin/Chambre.create',compact('hotels'));
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
            'Num' => 'string|required',
            'NbPlace' => 'string|required',
            'Prix' => 'string|required',
            'Id_Hotel' => 'required'
          ]);

          $chambre =new Chambre();
          $chambre->Num = $request->get('Num');
          $chambre->NbPlace = $request->get('NbPlace');
          $chambre->Prix = $request->get('Prix');
          $chambre->Etat = "false";
          $chambre->Id_Hotel = $request->get('Id_Hotel') ;
          $chambre->save();

          return redirect()->route('Chambre.index')
          ->with('success', 'Chambre  ajouter avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chambre = Chambre::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels = DB::table('hotels')->get();
        $chambre = Chambre::find($id);
        return view('Admin/Chambre.edit',compact('hotels','chambre'));
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

            'Num' => 'required',
            'NbPlace' => 'required',
            'Prix' => 'required',
            'Etat' => 'required',
            'Id_Hotel' => 'required'
          ]);
          $chambre = Chambre::find($id);
          $chambre->Num = $request->get('Num');
          $chambre->NbPlace = $request->get('NbPlace');
          $chambre->Prix = $request->get('Prix');
          $chambre->Etat = $request->get('Etat');
          $chambre->Id_Hotel = $request->get('Id_Hotel');
          $chambre->save();

          return redirect()->route('/')
          ->with('success', 'Chambre  modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chambre = Chambre::find($id);
        $chambre->delete();

        /*return redirect()->route('Chambre.index')
        ->with('success', 'Chambre  supprimer avec succés');*/
    }
}
