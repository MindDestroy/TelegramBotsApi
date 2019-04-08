<?php

namespace TelegramBotsApi\Types;

/**
 * Instance of this object represents a point on the map
 * @package TelegramBotsApi\Types
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class Location implements TypeInterface
{
    /**
     * @var float Longitude as defined by sender
     */
    public $longitude;

    /**
     * @var float Latitude as defined by sender
     */
    public $latitude;

    public function __construct(array $data)
    {
        $this->longitude = $data['longitude'];
        $this->latitude = $data['latitude'];
    }

    public function getRequestArray(): array
    {
        // TODO: Implement getRequestArray() method.
        return [
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ];
    }

    /**
     * @param float $longitude
     * @param float $latitude
     * @return Location
     */
    public static function make(float $longitude, float $latitude): self
    {
        return new self([
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);
    }
}