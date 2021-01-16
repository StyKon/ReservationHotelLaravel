<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Chambre;
use App\Category;
use App\Hotel;
use App\Image;
use App\Promotion;
use App\Reservation;
use App\Ville;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // Admin methode Login
    public function ShowAdminLogin(Request $request) {
        if($request->session()->exists("AdminLogin")) {

            return redirect("/Admin/Category");
        } else {

              return view('login1');
        }
    }


    public function AdminLogin(Request $request) {
        if($request->session()->exists("AdminLogin")) {

         $admin = $request->session()->get("AdminLogin")[0];
         $value = object_get($admin, 'Id_Administrateur');

            return view("Admin/Category");
        }
        $Login =$request->get('Login');
        $Password =$request->get('Password');

        $admin = DB::table('administrateurs')->where('Login', $Login)->where('Password', $Password)->get();


        if(count($admin) > 0) {
            $request->session()->put("AdminLogin", $admin);
            $admin = $admin[0];
            return redirect("/Admin/Category");
        } else {

           return view("login1");

        }

    }


//Client Methode Login

    public function ShowClientLogin(Request $request) {
        if($request->session()->exists("ClientLogin")) {
            return redirect()->route('welcome');
        } else {
            return view('login');
        }
    }

    public function ShowClientLoginins(Request $request) {
        if($request->session()->exists("ClientLogin")) {

            return redirect()->route('welcome');
        } else {

              return view('User.inscription');
        }
    }

    public function ClientLogin(Request $request) {
        if($request->session()->exists("ClientLogin")) {

         $client = $request->session()->get("ClientLogin")[0];
         $value = object_get($client, 'Id_Client');

         return redirect()->route('welcome');
        }
        $Civilite =$request->get('Civilite');
        $Password =$request->get('Password');

        $client = DB::table('clients')->where('Civilite', $Civilite)->where('Password', $Password)->get();


        if(count($client) > 0) {
            $request->session()->put("ClientLogin", $client);
            $client = $client[0];
            return redirect()->route('welcome');
        } else {

            return view('login');

        }

    }







    public function getLogout(){

        Session::flush();
        return Redirect::to('/login1');
    }

    public function search(Request $request)
    {

        $cat=$request->get('category');
        $vil=$request->get('ville');
        if (($request->get('ville'))==("All Ville")) {
          $vil="";
        }

        if (($request->get('category'))==("All Categories")) {
          $cat="";
        }
$value="false";
$name=$request->input('name');
$adult=$request->input('adult');
$kids=$request->input('kids');
    if (is_array($name)){


        for ($i = 0; $i < count($name); $i++) {
        $new[$i]=$adult[$i]+$kids[$i];
        if ($new[$i]>4) $cat="error";
        }


        $p1=0;
        $p2=0;
        $p3=0;
        $p4=0;
        if (array_key_exists('1', array_count_values($new)))
        {
        $p1=   array_count_values($new)[1];
        }
        if (array_key_exists('2', array_count_values($new)))
        {
        $p2=   array_count_values($new)[2];
        }
        if (array_key_exists('3', array_count_values($new)))
        {
         $p3=   array_count_values($new)[3];
        }
        if (array_key_exists('4', array_count_values($new)))
        {
        $p4=   array_count_values($new)[4];
        }


        /*        [1,2,3,4]
          [2,5,7,1]
        $Category = DB::table('hotels')->select('Id_Hotel')
        ->join('categories', 'hotels.Id_Category', '=', 'categories.Id_Category')
       ->where('categories.Type',"=","4")->get()->pluck('Id_Hotel')->toArray();;
       $Ville = DB::table('hotels')->select('Id_Hotel')
       ->join('villes', 'hotels.Id_Ville', '=', 'villes.Id_Ville')
      ->where('villes.Nom',"=","Tunisie")->get()->pluck('Id_Hotel')->toArray();

      $new = DB::table('hotels')->select()
      ->whereIn('Id_Hotel', $Category)
     ->orderByRaw(\DB::raw("FIELD(Id_Hotel, ".implode(",",$Category).")"))
         ->get()
      ; */
           // ->whereRaw('chambres.NbPlace>2')
      /*
         if (!Gate::allows('find_room_access')) {
            return abort(401);
        }
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');

        if ($request->isMethod('POST')) {
            $rooms = Hotels::with('chambres')->whereHas('chambre', function ($q) use ($etat) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->where('time_from', '>=', $time_to)
                       ->orWhere('time_to', '<=', $time_from);
                });
            })->orWhereDoesntHave('booking')->get();
        } else {
            $rooms = null;
        }
        return view('admin.find_rooms.index', compact('rooms', 'time_from', 'time_to'));
      */
      $NbCh = array(
        "NbCh1P" => $p1,
        "NbCh2P" => $p2,
        "NbCh3P" => $p3,
        "NbCh4P" => $p4
      );
      $NbPersonne=array_sum($kids)+array_sum($adult);
      $NbKids=array_sum($kids);
      $NbAdult=array_sum($adult);
      $DateDebut=$request->get('DateDebut');
      $DateFin=$request->get('DateFin');
      $Nb = array(
         "NbPersonne" => $NbPersonne,
         "NbKids" => $NbKids,
         "NbAdult" => $NbAdult,
         "DateDebut" => $DateDebut,
         "DateFin" => $DateFin
       );
      $hotels = DB::table('hotels')
        ->join('categories', 'hotels.Id_Category', '=', 'categories.Id_Category')
        ->join('villes', 'hotels.Id_Ville', '=', 'villes.Id_Ville')
        ->join('chambres', 'hotels.Id_Hotel', '=', 'chambres.Id_Hotel')
      ->join('images', 'hotels.Id_Hotel', '=', 'images.Id_Hotel')
        ->when((! empty($vil)),function ($query) use ($vil) {
            return $query->where('villes.Id_Ville', '=', $vil);
           })
        ->when((! empty($cat)),function ($query) use ($cat) {
            return $query->where('categories.Id_Category', '=', $cat);
           })
        ->where('chambres.Etat',"=",$value)
        ->selectRaw("hotels.Id_Hotel")
        ->selectRaw("hotels.Id_Category")
        ->selectRaw("hotels.Id_Ville")
        ->selectRaw("hotels.Nom")
        ->selectRaw("villes.Nom AS NomVille")
        ->selectRaw("chambres.Prix *$NbPersonne as PrixTot")
        ->selectRaw("categories.Type")
        ->selectRaw("images.Path")
        ->selectRaw("count(case when chambres.NbPlace = '1' then 1 end) as count1")
        ->selectRaw("count(case when chambres.NbPlace = '2' then 1 end) as count2")
        ->selectRaw("count(case when chambres.NbPlace = '3' then 1 end) as count3")
        ->selectRaw("count(case when chambres.NbPlace = '4' then 1 end) as count4")
        ->groupBy('hotels.Id_Hotel')
        ->having('count1', '>=', $p1)
        ->having('count2', '>=', $p2)
        ->having('count3', '>=', $p3)
        ->having('count4', '>=', $p4)
        ->get()   ;

       // ->pluck('Id_Hotel')
        //$image = DB::table('images')->where($hotels['0'])->get();
        //$idhotel = $hotels->pluck('Id_Hotel');
       $villes = DB::table('villes')->get();
       $categorys = DB::table('categories')->get();
        // $images=DB::table('images')->whereIn('Id_Hotel', $idhotel)->get();
        // $images=Listing::with('hotels','images')->get(['Id_Hotel','Path']);
        //  echo ($images);
        // echo ($idhotel);

     return view('User.welcome',compact('hotels','villes','categorys','NbCh','Nb'));
    }else{
    $villes = DB::table('villes')->get();
    $categorys = DB::table('categories')->get();
    return view ('User.welcome',compact('villes','categorys'));
    }
    }



    public function reservation(Request $request)
    {

       $hoteljson= $request->get('hotel');
       $hotels = json_decode($hoteljson, true);
       $NbChjson= $request->get('NbCh');
       $NbCh = json_decode($NbChjson, true);
       $Nbjson= $request->get('Nb');
       $Nb = json_decode($Nbjson, true);
       $client = $request->session()->get("ClientLogin")[0];
       $value = object_get($client, 'Id_Client');


      $Chambre1Id=  DB::table('chambres')
        ->where("Id_Hotel", '=',  $hotels['Id_Hotel'])
        ->where("NbPlace", '=',  "1")
        ->where("Etat", '=',  "false")
        ->take($NbCh['NbCh1P'])
        ->pluck('Id_Chambre')->toArray();
        if(!empty($Chambre1Id))
        {
        $Ch1=Chambre::whereIn('Id_Chambre',$Chambre1Id)
        ->update(['Etat' => 'true']);
        foreach ($Chambre1Id as $Chambre1id) {
        $reservation =new Reservation();
        $reservation->DateDebut = $Nb['DateDebut'];
        $reservation->DateFin = $Nb['DateFin'];
        $reservation->Id_Client = $value;
        $reservation->Id_Hotel = $hotels['Id_Hotel'];
        $reservation->Id_Chambre = $Chambre1id ;
        $reservation->save();
        }

        }
        $Chambre2Id=DB::table('chambres')
        ->where("Id_Hotel", '=',  $hotels['Id_Hotel'])
        ->where("NbPlace", '=',  "2")
        ->where("Etat", '=',  "false")
        ->take($NbCh['NbCh2P'])
        ->pluck('Id_Chambre')->toArray();
        if(!empty($Chambre2Id))
        {
        $Ch2=Chambre::whereIn('Id_Chambre',$Chambre2Id)
        ->update(['Etat' => 'true']);
        foreach ($Chambre2Id as $Chambre2id) {
        $reservation =new Reservation();
        $reservation->DateDebut = $Nb['DateDebut'];
        $reservation->DateFin = $Nb['DateFin'];
        $reservation->Id_Client = $value;
        $reservation->Id_Hotel = $hotels['Id_Hotel'];
        $reservation->Id_Chambre = $Chambre2id ;
        $reservation->save();
         }

        }
        $Chambre3Id=  DB::table('chambres')
        ->where("Id_Hotel", '=',  $hotels['Id_Hotel'])
        ->where("NbPlace", '=',  "3")
        ->where("Etat", '=',  "false")
        ->take($NbCh['NbCh3P'])
        ->pluck('Id_Chambre')->toArray();
        if(!empty($Chambre3Id))
        {
        $Ch3=Chambre::whereIn('Id_Chambre',$Chambre3Id)
        ->update(['Etat' => 'true']);
        foreach ($Chambre3Id as $Chambre3id) {
        $reservation =new Reservation();
        $reservation->DateDebut = $Nb['DateDebut'];
        $reservation->DateFin = $Nb['DateFin'];
        $reservation->Id_Client = $value;
        $reservation->Id_Hotel = $hotels['Id_Hotel'];
        $reservation->Id_Chambre = $Chambre3id ;
        $reservation->save();
        }
        }

        $Chambre4Id= DB::table('chambres')
        ->where("Id_Hotel", '=',  $hotels['Id_Hotel'])
        ->where("NbPlace", '=',  "4")
        ->where("Etat", '=',  "false")
        ->take($NbCh['NbCh4P'])
        ->pluck('Id_Chambre')->toArray();
        if(!empty($Chambre4Id))
        {
        $Ch4=Chambre::whereIn('Id_Chambre',$Chambre4Id)
        ->update(['Etat' => 'true']);
        foreach ($Chambre4Id as $Chambre4id) {
        $reservation =new Reservation();
        $reservation->DateDebut = $Nb['DateDebut'];
        $reservation->DateFin = $Nb['DateFin'];
        $reservation->Id_Client = $value;
        $reservation->Id_Hotel = $hotels['Id_Hotel'];
        $reservation->Id_Chambre = $Chambre4id ;
        $reservation->save();
        }

        }
        return redirect()->route('welcome')
        ->with('success', 'Reservation Done!!');




        /*
                   if authen name_user _ adr _ tel

        $request->session()->put('reservation', $table_id); */
    }

    public function myreservation(Request $request)
    {
        $client = $request->session()->get("ClientLogin")[0];
        $value = object_get($client, 'Id_Client');
        $reservations = Reservation::where('Id_Client', '=', $value)->get();
        return view('User.myreservation',compact('reservations'));

    }
    public function annulerreservation($Id_Reservation,$Id_Chambre)
    {
        $reservation = Reservation::find($Id_Reservation);
       if($reservation->delete()){
       $s= DB::table('chambres')
       ->where('Id_Chambre', $Id_Chambre)
       ->update(['Etat' => "false"]);
       return redirect()->route('myreservation')
       ->with('success', 'Reservation Canceled sucess!!');
       }else{
       return redirect()->route('myreservation')
       ->withErrors(['msg', 'Reservation not Canceled']);
      }

    }

}
