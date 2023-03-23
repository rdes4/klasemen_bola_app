<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Club::orderBy('point', 'desc')->orderBy('main', 'asc')->orderBy('menang', 'desc')->orderBy('goal_menang', 'desc')->get();
        return view('klasemen')->with('data', $data);
    }

   
    public function create()
    {
        //
        $data = Club::all();
        return view('tambahKlub')->with('data', $data);
    }

  
    public function store(Request $request)
    {
        //
        Session::flash('nama_klub', $request->nama_klub);
        Session::flash('kota_klub', $request->kota_klub);

        $request->validate([
            'nama_klub'=>'required|unique:clubs,nama_klub',
            'kota_klub'=>'required'
        ],[
            'nama_klub.required'=>'Nama klub wajib diisi',
            'kota_klub.required'=>'Kota asal klub wajib diisi',
            'nama_klub.unique' => 'Nama klub sudah terdaftar'
        ]);

        $data = [
            'nama_klub'=>$request->nama_klub,
            'kota_klub'=>$request->kota_klub
        ];
        Club::create($data);
        return redirect()->to('club/create')->with('success', 'Berhasil menambahkan klub');
    }

    public function result(){
        $data = Club::all();
        return view('hasilPertandingan')->with('data', $data);
    }

    public function saveResult(Request $request){
        $request->validate([
            'skor_1.*' => 'required'
        ],[
            'skor_1.*.required'=>'Skor wajib diisi'
        ]);
        $array_count = count($request->nama_klub1);

        for ($i=0; $i < $array_count; $i++) {
            $data_need['nama_klub1'][]=$request->nama_klub1[$i];
            $data_need['nama_klub2'][]=$request->nama_klub2[$i];

        }
        for ($i=0; $i < $array_count; $i++) {
            if ($data_need['nama_klub1'][$i] == $data_need['nama_klub2'][$i]) {
                return redirect("/hasil_pertandingan")->with('errorr', 'Tim yang bermain harus berbeda!!');
            }
            for ($j=$i+1; $j < $array_count; $j++) { 
                if ($data_need['nama_klub1'][$i] == $data_need['nama_klub1'][$j] && $data_need['nama_klub2'][$i] == $data_need['nama_klub2'][$j]) {
                    return redirect("/hasil_pertandingan")->with('errorr', 'Ada pertandingan yang sama!!');
                }
            }
        }

        $i = 0;
        foreach ($request->nama_klub1 as $key => $value) {
            $data1 = [
                'id' => $request->nama_klub1[$i],
                'goal' => $request->skor_1[$i]
            ];
            $data2 = [
                'id' => $request->nama_klub2[$i],
                'goal' => $request->skor_2[$i]
            ];
            $club1 = Club::find($data1['id']);
            $club2 = Club::find($data2['id']);
    
    
            $club1->main = $club1->main+1;
            if ($data1['goal']>$data2['goal']) {
                $club1->menang = $club1->menang+1;
                $club1->point = $club1->point+3;
            }elseif ($data1['goal']<$data2['goal']) {
                $club1->kalah = $club1->kalah+1;
            }elseif($data1['goal']==$data2['goal']){
                $club1->seri = $club1->seri+1;
                $club1->point = $club1->point+1;
            }
            $club1->goal_menang = $club1->goal_menang+$request->skor_1[$i];
            $club1->goal_kalah = $club1->goal_kalah+$request->skor_2[$i];
            $club1->save();
    
    
            $club2->main = $club2->main+1;
            if ($data2['goal']>$data1['goal']) {
                $club2->menang = $club2->menang+1;
                $club2->point = $club2->point+3;
            }elseif ($data2['goal']<$data1['goal']) {
                $club2->kalah = $club2->kalah+1;
            }elseif($data2['goal']==$data1['goal']){
                $club2->seri = $club2->seri+1;
                $club2->point = $club2->point+1;
            }
            $club2->goal_menang = $club2->goal_menang+$request->skor_2[$i];
            $club2->goal_kalah = $club2->goal_kalah+$request->skor_1[$i];
            $club2->save();
            $i++;
        }

        return redirect()->to('club');
    }

    public function destroy($id)
    {
        //
    }
}
