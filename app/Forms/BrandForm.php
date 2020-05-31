<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class BrandForm extends Form
{
    public function buildForm()
    {
        // Add fields here...
      $this
          ->add('name', Field::TEXT, [
              'rules' => 'required'
          ])
          ->add('Save or Create', Field::BUTTON_SUBMIT,
            [
                  'attr' => ['class' => 'btn btn-success']
            ]
          );
    }
}
