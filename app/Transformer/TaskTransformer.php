<?php

namespace App\Transformers;

class TaskTransformer extends  \League\Fractal\TransformerAbstract
{

    public function transform(\App\Task $user)
    {
        return [
            'id'            =>  $user->id,
            'body'          => $user->body,
            'created_at'         =>  $user->created_at,
            'updated_at'       => $user->updated_at,
        ];
    }
}