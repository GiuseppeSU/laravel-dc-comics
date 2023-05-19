<?php

namespace App\Http\Controllers;

use App\Models\Comics;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        /*$request->validate([
            'title' => 'required|max:4',
            'thumb' => 'required|max:250',
            'description' => 'required|max:220',
            'price' => 'required|max:10',
            'series' => 'required|max:10',
            'sale_date' => 'required|max:65535',
            'type' => 'required|max:65535',
        ]);*/
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
        /*$request->validate([
            'title' => 'required|max:4',
            'thumb' => 'required|max:250',
            'description' => 'required|max:220',
            'price' => 'required|max:10',
            'series' => 'required|max:10',
            'sale_date' => 'required|max:65535',
            'type' => 'required|max:65535',
        ]);*/
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

    private function validation($data)
    {

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:50',
                'thumb' => 'required|max:250',
                'description' => 'required|max:220',
                'price' => 'required|max:10',
                'series' => 'required|max:10',
                'sale_date' => 'required|max:10',
                'type' => 'required|max:65535',
            ],
            [
                'title.required' => "Il titolo è richiesto",
                'title.max' => "Il titolo deve essere al massimo di 50 caratteri",
                'thumb.required' => "Url dell'immagine richiesta",
                'thumb.max' => "L'url dell'immagine deve essere al massimo di 250 caratteri",
                'description.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",
                'price.required' => "Il prezzo è richiesto",
                'price.max' => "Il prezzo deve essere al massimo di 10 caratteri",
                'series.required' => "La serie  è richiesta",
                'series.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
                'sale_date.required' => "La data è richiesta",
                'sale_date.max' => "Il campo data deve essere al massimo di 10 caratteri",
                'type.required' => "La data è richiesta",
                'type.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",

            ]
        )->validate();

        return $validator;



    }
}