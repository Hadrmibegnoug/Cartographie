<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class DataMigrantController extends Controller
{
    public function index(): View
    {
        $regions = DB::select('SELECT id, nom,longitude, latitude FROM `regions`;');
        $regions = (array) $regions;
        $psh = DB::select('SELECT * FROM `p_s_h_s`;');
        $psh = (array) $psh;
        $migrant= DB::select('SELECT * FROM `migrants`;');
        $migrants = (array) $migrant;
        $competence = DB::select('SELECT m.competences_migrant AS competence, r.nom AS region, COUNT(*) AS nombre_migrants FROM migrants m JOIN regions r ON m.region_id = r.id GROUP BY competence, region ORDER BY competence, region;');
        $sexe = DB::select('SELECT region_id, sexe, COUNT(*) AS nombre_migrants FROM migrants GROUP BY region_id, sexe;');
        return view('regions',compact('regions','psh','migrants','competence','sexe'));
    }

    public function accueil(): View
    {
        $regions = DB::select('SELECT id, nom,longitude, latitude FROM `regions`;');
        $regions = (array) $regions;
        $psh = DB::select('SELECT * FROM `p_s_h_s`;');
        $psh = (array) $psh;
        $migrants = DB::select('SELECT * FROM `migrants`;');
        $migrants = (array) $migrants;
        $competence = DB::select('SELECT m.competences_migrant AS competence, r.nom AS region, COUNT(*) AS nombre_migrants FROM migrants m JOIN regions r ON m.region_id = r.id GROUP BY competence, region ORDER BY competence, region;');
        $competence = (array) $competence;
        $sexe = DB::select('SELECT region_id, sexe, COUNT(*) AS nombre_migrants FROM migrants GROUP BY region_id, sexe;');
        return view('index',compact('regions','psh','migrants','competence','sexe'));
    }

}
