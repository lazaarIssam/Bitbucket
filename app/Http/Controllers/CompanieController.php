<?php

namespace App\Http\Controllers;

use App\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class CompanieController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Affiche tout les objects company avec une pagination de 10 objet par page
        //Show all of the company objects with a pagination of 10 objects per page
        $list = DB::table('companies')->paginate(10);
        return view('companies.index')->with('list', $list);
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
        //dd($request->input());
        $comapnie = new Companie();
        $comapnie->Name = $request->Name;
        $comapnie->Email = $request->Email;
        $comapnie->Address = $request->Address; 
        $comapnie->Phone = $request->Phone;
        $comapnie->Website = $request->Website;
        $comapnie->save();

        Session::flash('success', 'Bien enregister');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function show(Companie $companie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function edit(Companie $companie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $comapnie = Companie::find($request->id);
        $comapnie->Name = $request->Name;
        $comapnie->Email = $request->Email;
        $comapnie->Address = $request->Address; 
        $comapnie->Phone = $request->Phone;
        $comapnie->Website = $request->Website;
        $comapnie->save();
        Session::flash('success', 'Bien modifier');
        return redirect()->route('companies.index');
    }

    //Fonction de recherche avec le nom, l'email, l'addresse et le télephone
    //Search fonction using the name, the email, the address and the phone number
    public function recherche (Request $request){
        if($request->input('recherche') != ""){
        $list = DB::table('companies')
                        ->select('companies.*')
                        ->where('companies.Name','like','%'.$request->input('recherche').'%')
                        ->orWhere('companies.Email','like','%'.$request->input('recherche').'%')
                        ->orWhere('companies.Address','like','%'.$request->input('recherche').'%')
                        ->orWhere('companies.Phone','like','%'.$request->input('recherche').'%')
                        ->distinct()
                        ->paginate(10);
        //return view('materiel.index')->with('list', $list);
        return view('companies.index',['list' => $list]);
        }else{
            return redirect()->route('companies.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // On supprime l'objet avec son id
        //we delete the object using the id
        $companie = Companie::find($id);
        $companie->delete();
        Session::flash('success', 'Bien supprimer');
        return redirect()->route('companies.index');
    }
    
    //Return List of employes
    public function employeList($id){
        $list = DB::table('employees')
                        ->Join('companies', 'employees.companie_id', '=', 'companies.id')
                        ->select('employees.*')
                        ->where('companies.id','=',$id)
                        ->distinct()
                        ->paginate(10);
        return view('employees.index',['list' => $list]);
    }
}
