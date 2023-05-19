<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'thumb' => 'required|max:250',
            'description' => 'required|max:220',
            'price' => 'required|max:10',
            'series' => 'required|max:10',
            'sale_date' => 'required|max:10',
            'type' => 'required|max:65535',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "AAA NON TI SCORDARE IL TITOLO",
            'title.max' => "Massimo(non tuo cugino) 50 caratteri",
            'thumb.required' => "metti una foto ricordo ",
            'thumb.max' => "L'url dell'immagine deve essere al massimo di 250 caratteri",
            'description.required' => "Non scrivere la storia della tua vita",
            'description.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",
            'price.required' => "Vojo i sordiiiiiiiii",
            'price.max' => "Il prezzo deve essere al massimo di 10 caratteri",
            'series.required' => "Che serie?",
            'series.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
            'sale_date.required' => "I migliori anni della nostra vita",
            'sale_date.max' => "Il campo data deve essere al massimo di 10 caratteri",
            'type.required' => "non ti scordare il tipooooooo",
            'type.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",

        ];
    }
}