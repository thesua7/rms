<?php

namespace App\Http\Controllers\Libs;

use App\Http\Controllers\Controller;
use App\Models\Contractor;
use Illuminate\Http\Request;

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
    public function index()
    {
        if(auth()->user()->can('index contractor')){
            $contractors  = Contractor::active()->get();
            $title = 'Contractor';
            $breacrumbs['libs'] = "#";
            $breacrumbs['contractors'] = route('contractor.index');
            return view('libs.contractor.index')->with([
                'title' => $title,
                'breadcrumbs'=> $breacrumbs,
                'contractors' => $contractors
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
        $title = 'Create Contractor';
        $breacrumbs['libs'] = "#";
        $breacrumbs['contractors'] = route('contractor.index');
        $breacrumbs['create'] = route('contractor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $title = 'Create Contractor';
        $breacrumbs['libs'] = "#";
        $breacrumbs['contractors'] = route('contractor.index');
        $breacrumbs[$contractor->name] = route('contractor.show', $contractor->id);
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

        $title = 'Edit Contractor';
        $breacrumbs['libs'] = "#";
        $breacrumbs['contractors'] = route('contractor.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
