<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Server extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' =>$this->name,
            'specs'=>$this->specs
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://youtube.com/ElProfeSergio')

        ];
    }
}
