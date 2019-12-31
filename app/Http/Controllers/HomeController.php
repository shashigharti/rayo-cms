<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Robust\Core\Helpage\Site;
use Robust\Core\Models\Media;
use Robust\Core\Repositories\MediaRepository;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(Site::templateResolver('real-estate::website.home'), [
            'page' => 'home'
        ]);
    }

    // /**
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function getMedia()
    // {
    //     $medias = Media::get();
    //     return response()->json($medias);
    // }

    // /**
    //  * @param Request $request
    //  * @param MediaRepository $model
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function uploadMedia(Request $request, MediaRepository $model)
    // {

    //     $validator = Validator::make($request->all(),[
    //         'file' => 'required',
    //     ]);
    //     if($validator->fails()){
    //         return response()->json(['errors' => $validator->errors()],422);
    //     }
    //     $data = $request->files;
    //     $model->store($data);
    //     return response()->json(['success' =>true]);
    // }

    // /**
    //  * @param $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function getThumbnail($id)
    // {
    //     $thumbnail = Media::where('id',$id)->first();
    //     return response()->json($thumbnail);
    // }

    // /**
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    //  */
    // public function backend(){
    //     return view('backend');
    // }
}
