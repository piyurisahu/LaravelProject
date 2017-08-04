<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Eloquent
{
    protected $fillable=array('name','email','password');
    protected $rule=[
        'name'=>'required',
        'email'=>'required'
        ];
    protected $message=[
            'name.required'=>'company_name_required',
            'email.required'=>'email_address is required'
        ];
    public  $errors=[];
    public function validate():
    {
        $validator = Validator::make($this->toArray(), $this->rules, $this->messages);
        $valid = $validator->passes();
        if (!$valid) {
            $this->errors = $validator->messages()->all();
        }

        return $valid;
    }


    protected static function boot()
    {
        parent::boot();
        static::saving(
            function (SellerDetail $model) {
                return $model->validate();
            }
        );
    }
}
