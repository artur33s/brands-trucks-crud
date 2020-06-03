<?php

namespace App\Http\Controllers;

use App\Forms\TruckForm;
use App\Truck;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all Truck orderBy created_at and paginate auto 12.
        $objects = Truck::orderByDesc('created_at')->paginate(12);

        // return truck index blade and using $objects variable
        return view('landing.trucks.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        // Form Builder method,url
        $brandForm = $formBuilder->create(TruckForm::class, [
            'method' => 'POST',
            'url' => route('trucks.store')
        ]);

        // return brands.create and using $brandForm variable
        return view('landing.trucks.create', compact('brandForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormBuilder $formBuilder
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder,Request $request)
    {
        // Brand FOrm
        $brandForm = $formBuilder->create(TruckForm::class);
        $brandForm->redirectIfNotValid();

        // create new object (Brand)
        $object = new Truck();

        // fill all request
        $object->fill($request->all());

        // save object
        $object->save();
        // redirect brands.index
        return redirect()->route('trucks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find Brand with Id
        $object = Truck::findOrFail($id);

        // return brands.show blade and using $object variable :).
        return view('landing.trucks.show', compact('object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        // Find Brand with Id
        $object = Truck::findOrFail($id);

        // Form Builder
        $brandForm = $formBuilder->create(TruckForm::class, [
            'method' => 'PUT',
            'model' => $object,
            'url' => route('trucks.update', $object->id)
        ]);

        // return brands.edit and compact variables
        return view('landing.trucks.edit', compact('brandForm', 'object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, FormBuilder $formBuilder)
    {
        // Find Brand with Id
        $object = Truck::findOrFail($id);

        // Form Builder
        $form = $formBuilder->create(TruckForm::class);
        $form->redirectIfNotValid();

        // Update object
        $object->update($form->getFieldValues());

        // Do redirecting...
        return redirect()->route('trucks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Brand with ID
        $object = Truck::findOrFail($id);

        // Delete Brand
        $object->delete();

        $object->truck()->detach();
        // Redirect index blade
        return redirect()->route('trucks.index');
    }
}
