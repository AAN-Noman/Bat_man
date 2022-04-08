<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Banner::all();
        $DataTrashed = Banner::onlyTrashed()->get();
        return view('backend.banner.index', compact('datas','DataTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'banner_title' => "required",
            "photo" => "required|mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);

        $photo = $request->file('photo');

        $photo_name = Str::slug($request->banner_title)."_".time(). ".".$photo->getClientOriginalExtension();
        $uploads_photo = $photo->move(public_path("/storage/banner/"),$photo_name);

        if($uploads_photo){
            $insert = new Banner();
            $insert->banner_title = $request->banner_title;
            $insert->description = $request->description;
            $insert->photo = $photo_name;
            $insert->save();
            return redirect(route('backend.banner.index'))->with("success", "Banner Insert Successfull!");
        };

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request,[
            'banner_title' => "required",
            "photo" => "mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);

        $photo = $request->file('photo');
        if(!empty($photo)){
                $photo_name = Str::slug($request->banner_title)."_".time(). ".".$photo->getClientOriginalExtension();
                $uploads_photo = $photo->move(public_path("/storage/banner/"),$photo_name);
                $path = public_path('storage/banner/'.$banner->photo);
                if(file_exists($path)){
                    unlink($path);
                }


        }else{
            $photo_name = $banner->photo;
        }

            $banner->banner_title = $request->banner_title;
            $banner->description = $request->description;
            $banner->photo = $photo_name;
            $banner->save();
            return back()->with("success", "Banner Insert Successfull!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        // $path = public_path('storage/banner/'.$banner->photo);
        //     if(file_exists($path)){
        //         unlink($path);
        //     };
        $banner->delete();
        $banner->status = 2;
        $banner->save();
        return back()->with('success', "Banner successfully deleted!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function status(Banner $banner)
    {
        if($banner->status == 1){
            $banner->status = 2;
            $banner->save();
        }else{
           $banner->status = 1;
           $banner->save();
        }
        return back()->with('success', 'Status Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $data = Banner::onlyTrashed()->where('id', $id)->first();
        $data->status = 1;
        $data->save();
        $data->restore();
        return back()->with('success', 'Status Updated!');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function harddelete($id)
    {
        $data = Banner::onlyTrashed()->where('id', $id)->first();
        $path = public_path('storage/banner/'.$data->photo);
        if(file_exists($path)){
            unlink($path);
        };
        $data->forceDelete();
        return back()->with('success', 'Delete Successfull!');
    }
}
