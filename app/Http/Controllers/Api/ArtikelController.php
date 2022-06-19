<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;
use Validator;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = artikel::all();
        return response()->json([
            "success" => 200,
            "message" => "Product List",
            "data" => $artikels
        ]);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'judul' => 'required',
            'cover' => 'required',
            'deskripsi' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $artikels = artikel::create($input);
        return response()->json([
            "success" => 200,
            "message" => "Artikel Created Successfully",
            "data"=>$artikels
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikels = artikel::find($id);
        if (is_null($artikels)) {
            return response()->json([
                "code" => 404,
                "message" => "Article Not Found"
            ]);
        }
        return response()->json([
            "success" => 200,
            "message" => "Artikel Retrivied Successfully",
            "data" => $artikels
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artikel $artikel)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(artikel $artikel)
    {
        
    }
}
