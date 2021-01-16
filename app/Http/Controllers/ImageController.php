<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->paginate();
        return view('Admin/Image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = DB::table('hotels')->get();
        return view('Admin/Image.create',['hotels'=>$hotels]);
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

            'Nom' => 'required',
            'Path' => 'required',
            'Id_Hotel' => 'required'

          ]);

          $image=new Image();
          $image->Nom=request('Nom');
          $image->Path = request('Path');
          $image->Id_Hotel = request('Id_Hotel');

          $image->save();
         $lastid=$image->Id_Image;
        $fileInfo=$request->file('Path');

        $fileName=$lastid.$fileInfo->getClientOriginalName();
        $folder="uploads/";
        $fileInfo->move($folder,$fileName);
        $fileUrl=$fileName;
        $fichierFile=Image::find($lastid);
        $fichierFile->Path=$fileUrl;
        $fichierFile->save();

        return redirect()->route('Image.index')
        ->with('success', 'Image  Ajouter avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
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
        $image = Image::find($id);
        return view('Admin/Image.edit',compact('image','hotels'));
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
            'Path' => 'required',
            'Id_Hotel' => 'required'

          ]);


          $image=Image::find($id);
          $image->Nom=request('Nom');
          $image->Path = request('Path');
          $image->Id_Hotel = request('Id_Hotel');

          $image->save();
         $lastid=$image->Id_Image;
        $fileInfo=$request->file('Path');

        $fileName=$lastid.$fileInfo->getClientOriginalName();
        $folder="uploads/";
        $fileInfo->move($folder,$fileName);
        $fileUrl=$fileName;
        $fichierFile=Image::find($lastid);
        $fichierFile->Path=$fileUrl;
        $fichierFile->save();
        return redirect()->route('Image.index')
        ->with('success', 'Image modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();

       /* return redirect()->route('Image.index')
        ->with('success', 'Image supprimer avec succés');*/
    }
}
