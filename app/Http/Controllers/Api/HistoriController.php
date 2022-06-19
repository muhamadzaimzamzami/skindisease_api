<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\histori;
use Validator;
use Image;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validateData = $request->validate([
            'id_class' => 'required',
            'id_users' => 'required',
            'prosentase' => 'required',
            'face' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $faceName = $request->file('face')->getClientOriginalName();
        $facePath = $request->file('face')->store('public/images/histori');
        $id_class = $request->id_class;
        $id_users = $request->id_users;
        $prosentase = $request->prosentase;

        $save = new histori;
        $save->id_class = $id_class;
        $save->id_users = $id_users;
        $save->prosentase = $prosentase;
        $save->face = $faceName;
        $save->path = $facePath;

        $save->save();
        return response()->json([
            "success" => 200,
            "message" => "Histori Created Successfully",
            "data"=>$save
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
