<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

    public function information(): View
    {
        $migrantTotal = DB::select('SELECT COUNT(*) AS migrantTotal FROM `migrants`;');
        $migrantTotal = $migrantTotal[0]->migrantTotal;

        $pshTotal = DB::select('SELECT COUNT(*) AS pshTotal FROM `p_s_h_s`;');
        $pshTotal = $pshTotal[0]->pshTotal;

        $regionTotal = DB::select('SELECT COUNT(DISTINCT nom) AS regionTotal FROM regions;');
        $regionTotal = $regionTotal[0]->regionTotal;

        $competenceTotal = DB::select('SELECT COUNT(DISTINCT competences_migrant) AS competenceTotal FROM `migrants`;');
        $competenceTotal = $competenceTotal[0]->competenceTotal;

        $migrantRegion = DB::select("SELECT region_id, COUNT(*) AS nombre_migrants FROM migrants GROUP BY region_id;");
        $migrantRegion = (array) $migrantRegion;

        $migrantCompentence = DB::select('SELECT competences_migrant, COUNT(*) AS nombre_migrants FROM migrants GROUP BY competences_migrant;');
        $migrantCompentence = (array) $migrantCompentence;

        $migrantNationalite = DB::select('SELECT nationalite, COUNT(*) as total_migrants FROM migrants GROUP BY nationalite;');
        $migrantNationalite = (array) $migrantNationalite;

        $migrantNationaliteNKTT = DB::select('SELECT nationalite, COUNT(*) as total_migrants FROM migrants WHERE region_id = 1 GROUP BY nationalite;');
        $migrantNationaliteNKTT = (array) $migrantNationaliteNKTT;

        $migrantCompentenceNKTT = DB::select('SELECT competences_migrant, COUNT(*) AS nombre_migrants FROM migrants WHERE region_id = 1 GROUP BY competences_migrant;');
        $migrantCompentenceNKTT = (array) $migrantCompentenceNKTT;

        return view('reporting',compact('migrantTotal','pshTotal','regionTotal','competenceTotal','migrantRegion','migrantCompentence','migrantNationalite','migrantNationaliteNKTT','migrantCompentenceNKTT'));
    }



}
