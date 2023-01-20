<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherInformationResource extends JsonResource
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
            'city' => $this->city->name,
            'time' => $this->time,
            'weather_name' => $this->weather_name,
            'temperature' => $this->temperature,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'min_temp' => $this->min_temperature,
            'max_temp' => $this->max_temperature,
        ];
    }
}
