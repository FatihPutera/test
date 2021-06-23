<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class DataController extends Controller
{
    
    
    public function index()
    {
        
      return view('home.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customerservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request->available);
        $file = $request->file('image');
        $x=M_CustomerService::count()+1;
        $image = $this->uploadImage($file);
        $customerservice = new M_CustomerService([
            'cs_name' => $request->cs_name,
            'cs_number' => $request->cs_number,
            'message' => $request->message,
            'display_status' => $request->display,
            'cs_image' => $image,
            'created_by' => auth()->user()->name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_by' => '',
            'updated_at' => null,
            'available' =>$request->available,
            'display_order'=>$x
        ]);
        $customerservice->save();

        return redirect()->route('customerservice.index')->withStatus(__('customerservice successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerservice = M_CustomerService::where('cs_id', $id)->first();

        return view('customerservice.edit', compact('customerservice'));
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
        $customerservice = M_CustomerService::where('cs_id', $id)->first();
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->has('image')) {
            $file = $request->file('image');
            $image = $this->uploadImage($file); //call function upload image
        } else {
            $image = $customerservice->cs_image;
        }
        
        if($id==1){
            $request->display_status="Yes";
            $request->available='{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59","saturday": "00:00-23:59","sunday": "00:00-23:59" }';
        }

        $customerservice->cs_name = $request->cs_name;
        $customerservice->cs_number = $request->cs_number;
        $customerservice->message = $request->message;
        $customerservice->display_status = $request->display_status;
        $customerservice->cs_image = $image;
        $customerservice->created_by = $customerservice->created_by;
        $customerservice->created_at = $customerservice->created_at;
        $customerservice->updated_by = auth()->user()->name;
        $customerservice->updated_at = date("Y-m-d H:i:s");
        $customerservice->available =$request->available;
        $customerservice->save();

        return redirect()->route('customerservice.index')->withStatus(__('customerservice successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cs = M_CustomerService::find($id);
        $imagePath = public_path() . '/img/' . $cs->cs_image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $cs->delete();
        return redirect()->route('customerservice.index')->withStatus(__('customerservice successfully deleted.'));
    }
    public function uploadImage($imageFile)
    {
        $fileName = $imageFile->getClientOriginalName();
        $folderUpload = 'img/team';
        $imageFile->move($folderUpload, $fileName);

        return $fileName;
    }
}
