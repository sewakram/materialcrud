<?php

namespace App\Http\Controllers;
use App\Material;
use App\Category;
use App\InwardOutward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InwardOutwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $in_outs =DB::table('inward-outward')
         ->select('category_maste.cat_name', 'inward-outward.id', 'inward-outward.category_id', 'inward-outward.mat_id','material.mat_name','inward-outward.in_out_qty','inward-outward.entry_date')
        ->join('category_maste', 'category_maste.id', '=', 'inward-outward.category_id')
        ->join('material', 'inward-outward.mat_id', '=', 'material.id')
        ->where('inward-outward.deleted_at',null)
        ->Where('category_maste.deleted_at',null)
        ->Where('material.deleted_at',null)
        ->get()->toArray();
        // dd($in_outs);
         // Material::latest()->paginate(5);
        
        return view('inwardoutward.index',compact('in_outs'))
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
        $materials = Material::all();
         return view('inwardoutward.create',['materials'=>$materials,'categories'=>$categories]);

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
            'mat_id' => 'required',
            'entry_date' => 'required',
            'in_out_qty' => 'required'
        ]);
    
        InwardOutward::create($request->all());
     
        return redirect()->route('inward-outward.index')
                        ->with('success','Inward Outward details added successfully.');
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
        $in_outs =DB::table('inward-outward')
         ->select('category_maste.cat_name', 'inward-outward.id', 'inward-outward.category_id', 'inward-outward.mat_id','material.mat_name','inward-outward.in_out_qty','inward-outward.entry_date')
        ->join('category_maste', 'category_maste.id', '=', 'inward-outward.category_id')
        ->join('material', 'inward-outward.mat_id', '=', 'material.id')
        ->where('inward-outward.id',$id)
        ->get()->toArray();
        $categories = Category::all()->toArray();
        $materials = Material::all()->toArray();;
        // dd(['in_outs'=>$in_outs,'materials'=>$materials,'categories'=>$categories]);
        return view('inwardoutward.edit',['in_outs'=>$in_outs,'materials'=>$materials,'categories'=>$categories]);
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
        // dd($request->all());
         $material = InwardOutward::findOrFail($id);
         $material->update($request->all());
        return redirect()->route('inward-outward.index')
        ->with('success','Inward-Outward details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = InwardOutward::findOrFail($id);
        $material->delete();

        return redirect()->route('inward-outward.index')
        ->with('success','Inward-Outward details deleted successfully.');
    }
}
