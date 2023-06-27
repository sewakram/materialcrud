<?php

namespace App\Http\Controllers;
use App\Material;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $materials =DB::table('material')
         ->select('category_maste.cat_name', 'material.id', 'material.category_id','material.mat_name','material.open_balance')
        ->join('category_maste', 'category_maste.id', '=', 'material.category_id')
        ->Where('category_maste.deleted_at',null)
        ->Where('material.deleted_at',null)
        ->get()->toArray();
        // dd($materials);
         // Material::latest()->paginate(5);
        
        return view('material.index',compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all();
         return view('material.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'mat_name' => 'required',
            'open_balance' => 'required'
        ]);
    
        Material::create($request->all());
     
        return redirect()->route('materials.index')
                        ->with('success','Material added successfully.');
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
       $materials =DB::table('material')
       ->select('category_maste.cat_name', 'material.id', 'material.category_id','material.mat_name','material.open_balance')
        ->join('category_maste', 'category_maste.id', '=', 'material.category_id')
        ->where('material.id',$id)
        ->get()->toArray();
        $categories = Category::all()->toArray();
        // dd(['materials'=>$materials,'categories'=>$categories]);
        return view('material.edit',['materials'=>$materials,'categories'=>$categories]);
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
        // dd($request->category_id);
        // $materials =DB::table('material')
       // ->select('category_maste.cat_name', 'material.id', 'material.category_id','material.mat_name','material.open_balance')
        // ->join('category_maste', 'category_maste.id', '=', 'material.category_id')
        // ->where('material.id',$id)
        // ->get();
        // dd($materials);
        // $materials->update(['category_id' =>$request->category_id,'mat_name' =>$request->mat_name,'open_balance' =>$request->open_balance]);
        $material = Material::findOrFail($id);
        $material->update($request->all());
        return redirect()->route('materials.index')
        ->with('success','Material updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('materials.index')
        ->with('success','Material deleted successfully.');
    }
}
