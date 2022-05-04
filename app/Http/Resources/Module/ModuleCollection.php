<?php

namespace App\Http\Resources\Module;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ModuleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'modules';
    public function toArray($request)
    {
        /*return $this->collectpion->map(function ($data) {
            return [
                'id' => $data->id,
                'name_module' => $data->name_module
            ];
        });*/
        /*return $this->collection->map(function ($data) {
            return [
                'id' => $data->id,
                'name_module' => $data->name_module
            ];
        });*/
        return parent::toArray($request);
    }
}
