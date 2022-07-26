<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantReSource extends JsonResource
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
            'job_id' => $this->job_id,
            'student_id' => $this->student_id,
            'year_experience' => $this->year_experience,
            'cv' => $this->cv,
            'cover_letter' => $this->cover_letter,
        ];
    }
}
