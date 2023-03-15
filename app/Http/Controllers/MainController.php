<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if ($request->ajax()) {
            if($request->status == "all_comments"){
                $data = comments::orderBy('created_at','ASC')->get();
                $response = array();
                if($data){
                    $response =[
                        'error' => false,
                        'comments'=>''
                    ];
                }
                $id = 0;
                foreach($data as $item){
                    $response ['comments'].= '<div class="comment-item aos-init aos-animate" id="comment'.$id.'" data-aos="fade-up" data-aos-duration="1200"> <div class="comment-head"> <h3 class="comment-name">'.$item->name.'</h3> <small class="comment-date">'.$item->created_at->diffForHumans().'</small> </div> <div class="comment-body"> <p class="comment-caption">'.$item->comment.'</p> </div> </div>';
                    $id++;
                }
                return json_encode($response);
            }
            if($request->post == "loadComment"){
                $data = comments::orderBy('created_at','DESC')->get();
                $response = array();
                if($data){
                    $response =[
                        'error' => false,
                        'commentItems'=>'',
                        'nextComment'=>''
                    ];
                }
                $id = 0;
                foreach($data as $item){
                    if($id <= 4){
                        $response ['commentItems'].= '<div class="comment-item aos-init aos-animate" id="comment'.$id.'" data-aos="fade-up" data-aos-duration="1200"> <div class="comment-head"> <h3 class="comment-name">'.$item->name.'</h3> <small class="comment-date">'.$item->created_at->diffForHumans().'</small> </div> <div class="comment-body"> <p class="comment-caption">'.$item->comment.'</p> </div> </div>';
                    }else{
                        $response ['nextComment'] = $id;
                    }
                    $id++;
                }
                return json_encode($response);
            }
            if($request->post == "moreComment"){
                $count = comments::count();
                $data = comments::orderBy('created_at','DESC')->skip(5)->take($count-5)->get();
                $response = array();
                if($data){
                    $response =[
                        'error' => false,
                        'commentItems'=>'',
                        'nextComment'=>''
                    ];
                }
                $id = 0;
                foreach($data as $item){
                        $response ['commentItems'].= '<div class="comment-item aos-init aos-animate" id="comment'.$id.'" data-aos="fade-up" data-aos-duration="1200"> <div class="comment-head"> <h3 class="comment-name">'.$item->name.'</h3> <small class="comment-date">'.$item->created_at->diffForHumans().'</small> </div> <div class="comment-body"> <p class="comment-caption">'.$item->comment.'</p> </div> </div>';
                    $id++;
                }
                return json_encode($response);
            }
            if($request->post == "newComment"){
                $data = comments::create([
                    'name'=>$request->name,
                    'comment'=>$request->comment
                ]);
                if($data){
                    $response =[
                        'error' => false,
                        'message'=>'Terimakasih Atas Doa Restu & Ucapan Anda'
                    ];
                }
                return json_encode($response);
            }
        //    return request()->all();
        }
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
