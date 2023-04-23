<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function add(Request $request) {
        // get base64 text
        $base64 = explode(",", $request->base64);

        // convert base64 text as a image
        $image = base64_decode($base64[1]);

        // generate file name
        $file_name = uniqid() . '.png';

        // define image path
        $file_path = 'public/news/' . $file_name;
    
        // store image in the storage/app/public/news directory
        Storage::put($file_path, $image);
    
        // check image saved or not
        if(Storage::exists($file_path)) {
            // if image saved, save news details on news collection
            $news = new News();
            $news->header = $request->newsHeader;
            $news->description = $request->newsDescription;
            $news->image_path = $file_name;
            $news->grades = $request->grades;
            $newsAdded = $news->save();

            // check news details save in database or not
            if($newsAdded) {
                return 'success';
            }
            //if image not save in database remove image file 
            else {
                Storage::delete($file_path);
                return 'notSaveToDatabase';
            }
        }
        // if image not saved this will return
        else {
            return 'imageNotSaved';
        }
    }
    
    public function navigateToNews() {
        return view('admin.news', ["news" => News::all()]);
    }
    
    public function remove(Request $request) {
        // find specific news for given passing id from view
        $news = News::find($request->id);
        
        // if no any record for given details, redirect to admin.news view
        if($news == null) {
            return redirect()->route('admin.news', [ "news" => News::all()]);
        } else {
            // delete image from files
            Storage::delete("public/news/$news->image_path");

            // delete image from database
            $news->delete();

            // return news view with all news data
            return view('admin.news', ["news" => News::all()]);
        }
    }
}
