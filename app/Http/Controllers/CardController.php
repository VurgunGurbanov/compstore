<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Rules\UcfirstRequired;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CardController
{

    public function index(){

        $cards = DB::table('cards')
            ->join('card_translations as card_T', 'cards.id', '=', 'card_T.card_id')
            ->where('card_T.locale', '=', app()->getLocale())
            ->select('cards.*', 'card_T.*')
            ->get();

            return view('admin.cards.index',['cards' => $cards]);

    }

    public function create(){

        $cards = DB::table('cards')
            ->join('card_translations as card_T', 'cards.id', '=', 'card_T.card_id')
            ->where('card_T.locale', '=', app()->getLocale())
            ->select('cards.*', 'card_T.*')
            ->get();

        return view('admin.cards.create',['cards' => $cards]);

    }

    public function store(Request $request){


        $image = $request->file('image')->store('/public/cards');

        //$image = Storage::putFile('public/cards',$request->file('image'));


        $card = Card::create([
                'image'  => $image,
                'card_id'  => $request->card_id
            ]);

        $data = [];
        foreach ($request->title as $locale => $title){
            $data[] = [
                'locale' => $locale,
                'title'  => $title,
                'description' => $request->description[$locale]
            ];
        }

        $card->translations()->createMany($data);

        //DB::table('slider_translations')->insert($data);

        return  redirect()->route('admin.cards');

    }

    public function edit($id){


        $slider = DB::table('sliders as S')
            ->join('slider_translations as ST', 'S.id', '=', 'ST.slider_id')
            ->select('ST.*','S.image','S.id')
            ->where([
                'S.id' => $id
            ])
            ->get();




        //$slider =   \App\Models\Slider::findOrFail($id);
        return view('admin.sliders.edit',['slider' => $slider, 'id' => $id]);
    }

    public function update(\Illuminate\Http\Request $request,$id){

        $slider = \Illuminate\Support\Facades\DB::table('sliders')->where('id',$id)->first();


        if(!$slider){
            return abort(404);
        }

        $data = [];
        foreach ($request->title as $locale => $title){
            $data[] = [
                'locale' => $locale,
                'title'  => $title,
                'slider_id' => $slider->id
            ];
        }


        \Illuminate\Support\Facades\DB::table('slider_translations')->where('slider_id',$slider->id)->delete();

        \Illuminate\Support\Facades\DB::table('slider_translations')->insert($data);


        return  redirect()->route('admin.sliders');

    }

    public function delete($id){

        $slider = Slider::findOrFail($id);

        Storage::delete($slider->image);
        $slider->delete();

        return  redirect()->route('admin.sliders');
    }



}
