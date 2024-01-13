<?php
declare(strict_types=1);

namespace Jdres\Tofting;

use JsonSerializable;

require_once BASE_PATH.'/vendor/autoload.php';

/**
 * A class to store achievement data
 */
class Achievement implements JsonSerializable
{
    private int $id;
    private string $name;
    private Department $department;
    private array $locations;
    private string $description;

    /**
     * @param int $id
     * @param string $name
     * @param string $pictureFilename
     * @param Department $department
     * @param array $locations
     * @param string $description
     */
    public function __construct(int $id, string $name, Department $department, array $locations, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->department = $department;
        $this->locations = $locations;
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
     * @return Department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }

    /**
     * @return array
     */
    public function getLocation(): array
    {
        return $this->locations;
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
                'department' => $this->department,
                'location' => $this->locations,
                'description' => $this->description
        ];
    }
}