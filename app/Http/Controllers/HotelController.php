<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::latest()->paginate();
        return view('Admin/Hotel.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = DB::table('hotels')->get();
        $categorys = DB::table('categories')->get();
        $villes = DB::table('villes')->get();
        return view('Admin/Hotel.create',compact('hotels','categorys','villes'));

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
            'Nom' => 'string|required',
            'Id_Ville' => 'required',
            'Id_Category' => 'required'
          ]);

          Hotel::create($request->all());

          return redirect()->route('Hotel.index')
          ->with('success', 'Hotel  ajouter avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categorys = DB::table('categories')->get();
        $villes = DB::table('villes')->get();
        $hotel = Hotel::find($id);
        return view('Admin/Hotel.edit',compact('hotel','villes','categorys'));
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

            'Nom' => 'required',
            'Id_Ville' => 'required',
            'Id_Category' => 'required'

          ]);
          $hotel = Hotel::find($id);
          $hotel->Nom = $request->get('Nom');
          $hotel->Id_Ville = $request->get('Id_Ville');
          $hotel->Id_Category = $request->get('Id_Category');
          $hotel->save();

          return redirect()->route('Hotel.index')
          ->with('success', 'Hotel  modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
       /*return redirect()->route('Hotel.index')
        ->with('success', 'Hotel  supprimer avec succés');*/
    }
}
