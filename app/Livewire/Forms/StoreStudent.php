<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreStudent extends Form
{
    #[Rule('required')]
    public $name;
    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;
    #[Rule('required')]
    public $section_id;

    public function store($class_id){
        $student = Student::create(
            $this->all() + ['class_id'=>$class_id],
        );
        $student->addMedia($this->image)
            ->toMediaCollection();
    }
}
