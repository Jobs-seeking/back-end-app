<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\JobDetail;
use App\Models\JobType;

class JobV2Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'companyId' => $this->company_id,
            'jobType' => new JobTypeResource(JobType::where('id', $this->job_type_id)->first()),
            'jobDetail'=> new JobDetailResource(JobDetail::where('job_id',$this->id)->first()),
        ];
    }
}
