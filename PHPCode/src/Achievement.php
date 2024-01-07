<?php
declare(strict_types=1);

namespace Jdres\Tofting;

use JsonSerializable;

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . '/vendor/autoload.php';

/**
 * A class to store achievement data
 */
class Achievement implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $pictureFilename;
    private Department $department;
    private Location $location;
    private string $description;

    /**
     * @param int $id
     * @param string $name
     * @param string $pictureFilename
     * @param Department $department
     * @param Location $location
     * @param string $description
     */
    public function __construct(int $id, string $name, string $pictureFilename, Department $department, Location $location, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pictureFilename = $pictureFilename;
        $this->department = $department;
        $this->location = $location;
        $this->description = $description;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPictureFilename(): string
    {
        return $this->pictureFilename;
    }

    /**
     * @return Department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function jsonSerialize(): array
    {
        return [
                'id' => $this->id,
                'name' => $this->name,
                'icon' => $this->pictureFilename,
                'department' => $this->department,
                'location' => $this->location,
                'description' => $this->description
        ];
    }
}