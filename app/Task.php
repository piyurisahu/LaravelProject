<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;


class Task extends Model
{

    protected $fillable=array('body', 'start_date', 'end_date');

    protected $rules=[
        'body'=>'required',
        'start_date'=>'required',
        'end_date'=>'required'
    ];

    protected $messages=[
        'body.required'=>'task description is required',
        'start_date.required'=>'start date is required',
        'end_date.required'=>'end date is required'
    ];

    public  $errors=[];

    public function validate()
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
            function (Task $model) {
                return $model->validate();
            }
        );
    }

}
