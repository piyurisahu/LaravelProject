<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\TransformerAbstract;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Controller
 *
 * @package App\Http\Controllers
 *
 * Base controller class to have common methods for extended controllers.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Variable to hold fractalManager instance
     *
     * @var Manager
     */
    protected $fractalManager;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->fractalManager = new Manager();
        $this->fractalManager->setSerializer(new ArraySerializer());
    }

    /**
     * Serializes model to json response
     *
     * @param Model               $model       Model object to be serialized
     * @param TransformerAbstract $transformer Transformer used to serialize the model
     * @param int                 $status      Http status code that is returned with response
     *
     * @return JsonResponse Json response
     */
    protected function renderJson(Model $model, TransformerAbstract $transformer, int $status = 200): JsonResponse
    {
        return response()->json($this->toTransformedArray($model, $transformer), $status);
    }

    /**
     * Serializes the collection to json response
     *
     * @param mixed               $collection  Array of models to be serialized
     * @param TransformerAbstract $transformer Transformer used to serialize the collection
     *
     * @return JsonResponse Json response
     */
    protected function renderJsonArray($collection, TransformerAbstract $transformer)
    {
        $resource = new Collection($collection, $transformer);
        return response()->json($this->fractalManager->createData($resource)->toArray());
    }

    /**
     * Serializes model to array
     *
     * @param Model               $model       Model object to be serialized
     * @param TransformerAbstract $transformer Transformer used to serialize the model
     *
     * @return array
     */
    protected function toTransformedArray(Model $model, TransformerAbstract $transformer)
    {
        $resource = new Item($model, $transformer);
        return $this->fractalManager->createData($resource)->toArray();
    }

}

