<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    // when you don't want the outer "data" key to be shown while return new PostResource($post);
    // won't be applied for all resource so for that you need to disable from apps/Providers/AppServiceProvider.php
    // public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
            // 'author' => new UserResource($this->whenLoaded('author')),
            'author' => $this->author->name,
        ];
    }
}
