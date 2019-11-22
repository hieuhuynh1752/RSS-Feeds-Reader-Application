<?php

namespace App\Http\Controllers;

use App\Sample_feed;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Sample_feed::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data)
                {
                    $button = '<button type="button" name ="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>';
                    $button .=  '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('sample_feed');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=array(
            'title'=>'required',
            'category'=>'required',
            'link'=>'required',
            'description'=>'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors'=>$error->errors()->all()]);
        }

        $form_data = array(
            'title'=>$request->title,
            'category'=>$request->category,
            'link'=>$request->link,
            'description'=>$request->description
        );

        Sample_feed::create($form_data);

        return response()->json(['success'=>'Feed Added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample_feed  $sample_feed
     * @return \Illuminate\Http\Response
     */
    public function show(Sample_feed $sample_feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Sample_feed::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sample_feed  $sample_feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample_feed $sample_feed)
    {
        $rules=array(
            'title'=>'required',
            'category'=>'required',
            'link'=>'required',
            'description'=>'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors'=>$error->errors()->all()]);
        }

        $form_data = array(
            'title'=>$request->title,
            'category'=>$request->category,
            'link'=>$request->link,
            'description'=>$request->description
        );

        Sample_feed::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>'Feed updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample_feed  $sample_feed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sample_feed::findOrFail($id);
        $data->delete();
    }
}
