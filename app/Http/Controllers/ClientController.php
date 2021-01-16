<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Civilite' => 'string|required',
            'Password' => 'string|required',
            'Nom' => 'string|required',
            'Prenom' => 'string|required',
            'Email' => 'required|email',
            'Mobile' => 'string|required',
            'Adresse' => 'string|required',
            'CodePostal' => 'string|required',
            'Ville' => 'string|required'

          ]);
          if(Client::where('Civilite', $request->get('Civilite'))->first()){
            return redirect('inscription')
            ->withErrors(['msg', 'Reservation not Canceled']);
        }else{
          Client::create($request->all());
          return redirect()->route('welcome')
          ->with('success', 'Inscription succés');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
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

            'Civilite' => 'required',
            'Nom' => 'required',
            'Prenom' => 'required',
            'Email' => 'required|email',
            'Mobile' => 'required',
            'Adresse' => 'required',
            'CodePostal' => 'required',
            'Ville' => 'required',
            'Id_Hotel' => 'required'
          ]);
          $client = Client::find($id);
          $client->Civilite = $request->get('Civilite');
          $client->Nom = $request->get('Nom');
          $client->Prenom = $request->get('Prenom');
          $client->Email = $request->get('Email');
          $client->Mobile = $request->get('Mobile');
          $client->Adresse = $request->get('Adresse');
          $client->CodePostal = $request->get('CodePostal');
          $client->Ville = $request->get('Ville');
          $client->Id_Hotel = $request->get('Id_Hotel');
          $client->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
    }
}
