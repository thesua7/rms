<?php

namespace App\Http\Controllers\Libs;

use App\Http\Controllers\Controller;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->can('index contractor')){
            $contractor = Contractor::active()->get();

            $title = 'Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('libs.contractor.index');

            if($request->has('featured')){
                $contractor = $contractor->where('is_featured',1);
            }
            return view('libs.contractor.index')->with([
                'title' => $title,
                'breadcrumbs'=> $breacrumbs,
                'contractor' => $contractor
            ]);
        }else{
            return redirect()->route('home')->with('error','unauthorized access!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(auth()->user()->can('create contractor')){
            $contractor = Contractor::all();

            $title = 'Create Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('libs.contractor.index');
            $breacrumbs['create'] = route('libs.contractor.create');
            return view('libs.contractor.create');
        }else{
            return redirect('home')->with('error','Unauthorized Access');
        }

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
            'name' => 'required|max:20|unique:contractors',
            'phone_number' => 'required|max:20',
            'email' => 'email|unique:contractors',
            'nid' => 'max:30'

        ]);

        $contractor = new Contractor;

        $contractor->name = $request->name;
        $contractor->phone_number = $request->phone_number;
        $contractor->email = $request->email;
        $contractor->nid = $request->nid;
        $contractor->address = $request->address;

        if($request->has('description')){
            $contractor->description = $request->description;
        }
        $contractor->is_active = $request->has('is_active');
        $contractor->is_featured = $request->has('is_featured');

        try{
            $contractor->save();

            return redirect(route('libs.contractor.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getmessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contractor = Contractor::find($id);

        if(auth()->user()->can('show contractor')){

            $title = 'Show Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('libs.contractor.index');
            $breacrumbs[$contractor->name] = route('libs.contractor.show', $contractor->id);

            if(is_numeric($id)){
                $contractor = Contractor::find($id);
                if($contractor == null){
                    return redirect()->back()->with('error','contractor not exists!');
                }
                return view('libs.contractor.show')->with([
                    'contractor' => $contractor
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contractor = Contractor::find($id);

        if(auth()->user()->can('edit contractor')){

            $title = 'Edit Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('libs.contractor.index');

            if(is_numeric($id)){
                $contractor = Contractor::find($id);
                if($contractor == null){
                    return redirect()->back()->with('error','contractor not exists!');
                }
                return view('libs.contractor.edit')->with([
                    'contractor' => $contractor
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');


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
        if(auth()->user()->can('update contractor')){

            $title = 'Update Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('libs.contractor.index');

            if(is_numeric($id)){
                $contractor = Contractor::find($id);
                if($contractor == null){
                    return redirect()->back()->with('error','contractor not exists!');
                }
                $request->validate([
                    'name' => 'required|max:20|unique:contractors',
                    'phone_number' => 'required|max:20',
                    'email' => 'email|unique:contractors',
                    'nid' => 'max:30'

                ]);

                $contractor->name = $request->name;
                $contractor->phone_number = $request->phone_number;
                $contractor->email = $request->email;
                $contractor->nid = $request->nid;
                $contractor->address = $request->address;

                if($request->has('description')){
                    $contractor->description = $request->description;
                }
                $contractor->is_active = $request->has('is_active');
                $contractor->is_featured = $request->has('is_featured');

                try{
                    $contractor->save();

                    return redirect(route('libs.contractor.index'))->with('success','successfully updated!');
                }catch (\Exception $e){
                    return redirect()->back()->withErrors($e->getMessage());
                }
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete contractor')){
            $title = 'Delete Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('libs.contractor.index');

            if(is_numeric($id)){
                $contractor = Contractor::find($id);
                if($contractor == null){
                    return redirect()->back()->with('error','contractor not exists!');
                }
                try{

                    $contractor->delete();
                    return redirect(route('libs.contractor.index'))->with('success','successfully deleted!');
                }catch (\Exception $e){
                    return redirect()->back()->withErrors($e);
                }
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }
}
