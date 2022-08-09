<?php

namespace App\Http\Resources;

use App\Models\JobDetail;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'company' => new UserResource(User::where('id', $this->company_id)->first()),
            'jobType' => new JobTypeResource(JobType::where('id', $this->job_type_id)->first()),
            'jobDetail'=> new JobDetailResource(JobDetail::where('job_id',$this->id)->first()),
        ];
    }
}
