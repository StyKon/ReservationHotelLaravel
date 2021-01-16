<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::latest()->paginate();
        return view('Admin/Promotion.index',compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = DB::table('hotels')->get();
        return view('Admin/Promotion.create',compact('hotels'));
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

            'DateDeb' => 'required',
            'DateFin' => 'required',
            'Remise' => 'required',
            'Id_Hotel'=>'required'

          ]);
        $i = 0;
        foreach($request->get('Id_Hotel') as $Id_Hotel){
            $idhotel = $request['Id_Hotel'][$i];

            $promotion =new Promotion();
            $promotion->DateDeb = $request->get('DateDeb');
            $promotion->DateFin = $request->get('DateFin');
            $promotion->Remise = $request->get('Remise');
            $promotion->Id_Hotel = $idhotel ;
            $promotion->save();
            $i ++;
       }

       return redirect()->route('Promotion.index')
       ->with('success', 'Promotion modifier avec succés');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        $hotels = DB::table('hotels')->get();
        return view('Admin/Promotion.edit',compact('promotion','hotels'));
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

            'DateDeb' => 'required',
            'DateFin' => 'required',
            'Remise' => 'required',
            'Id_Hotel'=>'required'

          ]);
          $promotion = Promotion::find($id);
          $promotion->DateDeb = $request->get('DateDeb');
          $promotion->DateFin = $request->get('DateFin');
          $promotion->Remise = $request->get('Remise');
          $promotion->Id_Hotel = $request->get('Id_Hotel');
          $promotion->save();
          return redirect()->route('Promotion.index')
          ->with('success', 'Promotion modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();

      /*  return redirect()->route('Promotion.index')
        ->with('success', 'Promotion supprimer avec succés');*/
    }
}
