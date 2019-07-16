<?php

namespace App\Http\Controllers;
use App\Pets;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Pets::get();

      return view('home',compact('data'));

    }

    public function edit($id)
    {
      $data = Pets::where('id',$id)->get();

      return view('edit',compact('data'));

    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'nama' => 'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('images'), $input['image']);
      $input['nama'] = $request->nama;
      $input['jenis'] = $request->jenis;
      $input['pemilik'] = $request->pemilik;
      Pets::create($input);

      

      return back()->with('success','Image Uploaded successfully.');
    }

    public function update(Request $request)
    {
      $this->validate($request, [
      'nama' => 'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('images'), $input['image']);
      $input['nama'] = $request->nama;
      $input['jenis'] = $request->jenis;
      $input['pemilik'] = $request->pemilik;
      Pets::create($input);
      $data = Pets::get();

      return view('home',compact('data'));
    }

    public function destroy($id)
    {
      Pets::find($id)->delete();
      return back()->with('success','Image removed successfully.');
    }

}
