<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Pagination\Cursor;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Indicates where to start fetch the result
     * @param Model/Collection $obj
     * @param Request $request
     * @param array $opts - options
     * - fields = the list of columns to be display
     * - columns = filter the results
     * @return array
     */
    public function defineCollectionCursor($obj, Request $request, array $opts = ['*'])
    {
        $currentCursor = $request->get('cursor', null);
        $previousCursor = $request->get('previous', null);
        $limit = $request->get('limit', 10);

        $fields = array_key_exists('fields', $opts) ? $opts["fields"] : ["*"];
        /**
         * add where functionality
         */
        if (array_key_exists("columns", $opts)) {
            $columns = $opts["columns"];
            foreach ($opts["columns"] as $key => $val) {
                if (is_array($columns[$key])) {
                    $column = $columns[$key];
                    $obj = $obj->where($column[0], $column[1], $column[2]);
                    continue;
                }
                $obj = $obj->where($key, $val);
            }
        }

        $collection = $currentCursor
            ? $obj->offset($currentCursor)->take($limit)->get($fields)
            : $obj->take($limit)->get($fields);

        return ["collection" => $collection, "cursor" => new Cursor($currentCursor, $previousCursor, $limit, $collection->count())];
    }

    /**
     * Check if the request type
     * @param $request
     * @return bool
     */
    public function isRequestTypeDatatable($request)
    {
        return $request->header('request-type') == 'Datatable';
    }

    /**
     * Check if accept type is application json
     * @param $request
     * @return bool
     */
    public function isAcceptTypeApplicationJson($request){
        return $request->header('accept') === 'application/json';
    }
}
