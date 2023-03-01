<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class ProductResource extends JsonResource
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
            'title' => $this->title,
            'category' => $this->category->name,
            'original_price' => $this->price,
            'selling_price' => $this->price_after_tax,
            'desc' => $this->description,

            'image' => $this->attachmentRelation[0]->path ?? null,

            'colors' => $this->productColors->map(function ($item, $key) {
                return [
                    'id' => $item->color->id,
                    'color' => $item->color->code,
                ];
            }),

            'sizes' => $this->productSizes->map(function ($item, $key) {
                return [
                    'id' => $item->size->id,
                    'size' => $item->size->size,
                ];
            }),
            
             'reviews' => $this->reviews->map(function ($item, $key) {
                return [
                    'name' => $item->client->user_name,
                    'review' => $item->review,
                    'rate' => $item->rate,
                    'created_at' => Carbon::parse($item->created_at)->format('Y-m-d'),

                ];
            }),
        ];
    }
}