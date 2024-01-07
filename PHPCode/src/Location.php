<?php
declare(strict_types=1);

namespace Jdres\Tofting;

use JsonSerializable;

/**
 * A class to store location data
 */
class Location implements JsonSerializable
{
    private int $id;
    private string $roomNumber;
    private string $name;

    /**
     * @param int $id
     * @param string $roomNumber
     * @param string $name
     */
    public function __construct(int $id, string $roomNumber, string $name)
    {
        $this->id = $id;
        $this->roomNumber = $roomNumber;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRoomNumber(): string
    {
        return $this->roomNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): array
    {
        return [
                'id' => $this->id,
                'roomNumber' => $this->roomNumber,
                'name' => $this->name
        ];
    }
}