<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          "title" => $this->title,
          "creator" => $this->user->email,
          "subject" => $this->subject->name,
          "body" => $this->body,
          "published" => $this->created_at->format("d M Y")
        ];
    }

    public function with($request){
      return [
        "status" => "Success"
      ];
    }
}
