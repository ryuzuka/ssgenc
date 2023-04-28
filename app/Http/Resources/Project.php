<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'area' => $this->area,
            'biz_area' => $this->biz_area,
            'faci_gubun' => $this->faci_gubun,
            'project_nm' => $this->project_nm,
            'main_yn' => $this->main_yn,
            'open_yn' => $this->open_yn,
            'project_nm' => $this->project_nm,
            'project_nm' => $this->project_nm,
            'created_at' => $this->created_at
        ];        
    }
}
