<?php
declare(strict_types=1);

namespace Jdres\Tofting;

/**
 * A class to store department data
 */
class Department
{
    private int $id;
    private string $name;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
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
    public function getName(): string
    {
        return $this->name;
    }
}