<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Forms\BrandForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
class BrandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all News orderBy created_at and paginate auto 12.
        $objects = Brand::orderByDesc('created_at')->paginate(12);

        // return brand index blade and using $objects variable
        return view('landing.brands.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return void
     */
    public function create(FormBuilder $formBuilder)
    {
        // Form Builder method,url
        $brandForm = $formBuilder->create(BrandForm::class, [
            'method' => 'POST',
            'url' => route('brands.store')
        ]);

        // return brands.create and using $brandForm variable
       return view('landing.brands.create', compact('brandForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param FormBuilder $formBuilder
     * @return void
     */
    public function store(FormBuilder $formBuilder, Request $request)
    {
        // Brand FOrm
        $brandForm = $formBuilder->create(BrandForm::class);
        $brandForm->redirectIfNotValid();

        // create new object (Brand)
        $object = new Brand();

        // fill all request
        $object->fill($request->all());

        // save object
        $object->save();

        // redirect brands.index
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find Brand with Id
        $object = Brand::findOrFail($id);

        // return brands.show blade and using $object variable :).
        return view('landing.brands.show', compact('object'));
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
        $object = Brand::findOrFail($id);

        // Form Builder
        $brandForm = $formBuilder->create(BrandForm::class, [
            'method' => 'PUT',
            'model' => $object,
            'url' => route('brands.update', $object->id)
        ]);

        // return brands.edit and compact variables
        return view('landing.brands.edit', compact('brandForm', 'object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, FormBuilder $formBuilder)
    {
        // Find Brand with Id
        $object = Brand::findOrFail($id);

        // Form Builder
        $form = $formBuilder->create(BrandForm::class);
        $form->redirectIfNotValid();

        // Update object
        $object->update($form->getFieldValues());

        // Do redirecting...
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Brand with ID
        $object = Brand::findOrFail($id);

        // Delete Brand
        $object->delete();

        // Redirect index blade
        return redirect()->route('brands.index');
    }
}
