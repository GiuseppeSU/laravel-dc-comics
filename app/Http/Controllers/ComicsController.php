<?php

namespace App\Http\Controllers;

use App\Models\Comics;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comics::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();


        $newComics = new Comics;
        $newComics->fill($form_data);

        /* $newComics->title = $form_data["title"];
         $newComics->thumb = $form_data["thumb"];
         $newComics->description = $form_data["description"];
         $newComics->price = $form_data["price"];
         $newComics->series = $form_data["series"];
         $newComics->sale_date = $form_data["sale_date"];
         $newComics->type = $form_data["type"];*/

        $newComics->save();
        return redirect()->route('comics.show', ['comic' => $newComics->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comics = Comics::findOrFail($id);
        return view('comics.show', compact('comics'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comics = Comics::findOrFail($id);
        return view('comics.edit', compact('comics'));
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
        $comics = Comics::findOrFail($id);
        $form_data = $request->all();
        $comics->update($form_data);

        return redirect()->route('comics.show', ['comic' => $comics->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comics = Comics::findOrFail($id);
        $comics->delete();
        return redirect()->route('comics.index');


    }
}