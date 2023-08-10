<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Country;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('dashboard.country.index', compact('countries'));
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
        $validatedData = $request->validate([
            'name' => 'required|unique:countries|max:255',
            'country_tax' => [
                'nullable',
                'numeric',
                'between:0,999999.9'
            ],

        ], [

            'name.required' => 'يرجي ادخال اسم الدوله',
            'name.unique' => 'اسم الدوله مسجل مسبقا',
            'country_tax.numeric' => 'يرجي ادخال رقم',

        ]);


        $datacountry = new Country();
        $datacountry->name = $request->name;
        $datacountry->country_tax = $request->country_tax;
        $datacountry->save();
        session()->flash('Add', 'تم اضافة الدوله بنجاج');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData = $request->validate([
            'name' => 'required|unique:countries,name,' . $id . '|max:100',
            'country_tax' => [
                'nullable',
                'numeric',
                'between:0,999999.9'
            ],

        ], [

            'name.required' => 'يرجي ادخال اسم الدوله',
            'name.unique' => 'اسم الدوله مسجل مسبقا',
            'country_tax.numeric' => 'يرجي ادخال رقم',

        ]);

        $sections = Country::findOrFail($id);


        $sections->update([
            'name' => $request->name,
            'country_tax' => $request->country_tax,
        ]);

        session()->flash('edit', 'تم تعديل الدوله بنجاج');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $country = Country::findorFail($id);
        $country->delete();
        session()->flash('delete', 'تم حذف الدوله بنجاح');
        return back();
    }
}