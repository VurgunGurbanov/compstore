<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSliderRequest;
use App\Models\Slider;
use App\Rules\UcfirstRequired;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){



        //$slider = Slider::where('id',12)->firstOrFail();

       // $slider = DB::table('sliders')->where('id',11)->firstOrFail();




        $slider = DB::table('sliders as S')
                    ->join('categories as C', 'S.category_id', '=', 'C.id' )
                    ->join('category_translations as CT', 'C.id', '=', 'CT.category_id')
                    ->join('slider_translations as ST', 'S.id', '=', 'ST.slider_id')
                    ->where([
                        'CT.locale' => app()->getLocale(),
                        'ST.locale' => app()->getLocale()
                    ])
                    ->select('ST.*','S.image','S.category_id','S.id','CT.title as ct_title')
                    ->get();


        //$arr = Str::of('Comp and Lap Accesr')->explode(' ');
        //$middle = last((array)$arr);
        //$title = //remove last element of array and combine elements


        return view('index',['sliders' => $slider]);


    }



    //Slider controller
    public function index_slider(){

        $sliders = DB::table('sliders as S')
            ->join('slider_translations as ST', 'S.id', '=', 'ST.slider_id')
            ->join('categories as C','S.category_id','C.id')
            ->join('category_translations as CT','C.id','CT.category_id')

//            ->join('slider_translations',function ($join){
//                $join->on('S.id = ST.slider_id')->where('locale',app()->getLocale());
//            })

//            ->where('CT.locale','>=', app()->getLocale())
//            ->where('ST.locale',app()->getLocale())

            ->where([
                'CT.locale' => app()->getLocale(),
                'ST.locale' => app()->getLocale()
            ])

            ->select('ST.*','S.image','S.category_id','CT.title as c_title','S.id')

            ->get();



       return view('admin.sliders.index',['sliders' => $sliders]);
    }

    public function create(){


        //dd('vasif' == 'vasif');




        $categories = DB::table('categories as C')
            ->join('category_translations as CT', 'C.id', 'CT.category_id')
            ->where('CT.locale', app()->getLocale())
            ->select(['CT.*'])
            ->get();

        return view('admin.sliders.create')->with([
            'categories' => $categories,
        ]);

//        return view('admin.sliders.create')->withCategories($categories);
    }

    public function store(/*StoreSliderRequest*/ Request $request){

        $validator = Validator::make($request->all(),[

            'category_id' => 'required',
            'title.*'     => ['required','max:100',new UcfirstRequired()],
            'description.*'     => 'required',
        ],[
            'image.required' => ' Sekil xanasi doldurulmalidir',
            //'image.mimes'    => 'Sekil formati jpg, png ,jpeg olmalidir',
        ]); // FOR API,


//        if($validator->fails()){
//            return  redirect()->route('admin.sliders.create')->withInput()->withErrors($validator);
//        }

        if($validator->fails()){
            return  back()->withInput()->withErrors($validator);
        }


//        $request->validate([
//
//        ]);

        $image = $request->file('image')->store('public/sliders');


//        $image = Storage::putFile('public/sliders',$request->file('image'));

//        $slider = \Illuminate\Support\Facades\DB::table('sliders')->insertGetId([
//            'image'  => $image,
//            'category_id'  => $request->category_id
//        ]);




        $slider = Slider::create([
            'image'  => $image,
            'category_id'  => $request->category_id
        ]);

//        $data = [];
//        foreach ($request->title as $locale => $title){
//            $data[] = [
//                'locale' => $locale,
//                'title'  => $title,
//                'slider_id' => $slider,
//                'description' => $request->description[$locale]
//            ];
//        }


        $data = [];
        foreach ($request->title as $locale => $title){
            $data[] = [
                'locale' => $locale,
                'title'  => $title,
                'description' => $request->description[$locale]
            ];
        }

        $slider->translations()->createMany($data);

        //DB::table('slider_translations')->insert($data);

        return  redirect()->route('admin.sliders');

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

//    public function dltimg($id){
//
//            $image = DB::table('sliders')
//                ->select('image')
//                ->where('id', '=', $id)
//                ->first();
//
//            dd($image);
//
//
//
//
//        redirect()->back();
//    }



}

