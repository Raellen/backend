<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Frontcontroller extends Controller
{

    public function index()
    {
       $news_list = DB::table('news')->OrderBy('id','desc')->take(3)->get();

        return view('front/index',compact('news_list'));
    }

    public function news()
    {
        $news_list = DB::table('news')->OrderBy('id','desc')->get();
        return view('front/news',compact('news_list'));
    }

    public function contact_us()
    {
        return view('front/contact_us');
    }

    public function news_info($news_id)
    {
        $news_which = DB::table('news')->Where('id','=',$news_id)->first();

        return view('front/news_info',compact('news_which'));

    }

    public function profile(Request $request)
    {

        // dd($request->all());

        //Data-Base

        // DB::table('location_info')->insert(
        //     ['email' => $request->email,
        //     'location' =>$request->location,
        //     'img_url' =>'',
        //     'location_name' =>$request->location_name,
        //     'location_description' => $request->location_description
        //     ]
        // );

        Location::create($request->all());

        return '成功!';

    }


}
