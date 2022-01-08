<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;
use Redirect;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forms = Forms::all();
        return view('forms.list', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('forms.add');
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
        $this->validate($request, [
            'label' => 'required',
            'field' => 'required',
            // 'comments' => 'required',
            
        ]);

        if($request->field =="select"){
            $this->validate($request, [
                'options' => 'required',
            ]);
                $options = $request->options;
            }else{
                $options = null;
            }
        $forms = Forms::create([
            'label' => $request->label,
            'html_field' => $request->field,
            'options' => $options,
            'comments' => $request->comments,
           
        ]);

        if($forms){
            return redirect('/home');
            // return Redirect::back()->with('success', 'Field Added Successfully');
        }else{
            return Redirect::back()->with('failure','Operation Failed !');
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
        //
        $id = decrypt($id);
        $forms = Forms::where('id', $id)->first();
        $options=null;
        if($forms->options!= null){
             $options = explode(",",$forms->options);
        }
        // return $options;
        return view('forms.add', compact('forms','options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id = decrypt($id);
        $forms = Forms::where('id', $id)->first();

        $forms['label'] = $request->label;
        $forms['html_field'] = $request->field;
        if($request->field =="select"){
            $forms['options'] = $request->options;
        }else{
            $forms['options'] = null;
        }
        $forms['comments'] = $request->comments;
        $forms->save();
        
        if($forms){
            return redirect('/home');
            // return Redirect::back()->with('success', 'Field updated Successfully');
        }else{
            return Redirect::back()->with('failure','Operation Failed !');
        }
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
        
        $id = decrypt($id);
        $forms = Forms::where('id', $id)->first();
        if (isset($forms)) { 
           
            $delete_forms = $forms->delete();
            return redirect('/home');
        }else{
            return Redirect::back()->with('failure','Operation Failed !');
        } 
    }

    public function dynamic_form(){

        $forms = Forms::all();
        return view('dynamc_form',compact('forms'));
    }
}
