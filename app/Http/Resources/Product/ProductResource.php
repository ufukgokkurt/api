<?php

namespace App\Http\Resources\Product;



use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
          'name'=>$this->name,
          'description'=>$this->detail,
          'price'=>$this->price,
          'stock'=>$this->stock,
          'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'Puan verilmemiş',
          'href'=>[
              'reviews'=>route('review.index',$this->id)
          ]
        ];
    }
}
