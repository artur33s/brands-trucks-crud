<?php

namespace App\Forms;

use App\Brand;
use App\Rules\MinWordsRule;
use Carbon\Carbon;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
class TruckForm extends Form
{
    public function buildForm()
    {
        $this
           ->add('brand_id', Field::SELECT, [
               'rules' => 'required|exists:brands,id',
               'empty_value' => 'Select Brand',
               'choices' => Brand::pluck('name', 'id')->all()

           ])
           ->add('year', Field::NUMBER, [
               'rules' => ['required','gt:1899', 'lte:'.Carbon::now()->year]
           ])
           ->add('owner_full_name', Field::TEXT, [
               'rules' => ['required', new MinWordsRule(2)]
           ])
           ->add('number_of_owners', Field::NUMBER, [
               'rules' => 'nullable'
           ])
           ->add('comment', Field::TEXTAREA, [
               'rules' => 'nullable'
           ])
           ->add('Save or Create', Field::BUTTON_SUBMIT,
                [
                    'attr' => ['class' => 'btn btn-success']
                ]
           );

    }
}
