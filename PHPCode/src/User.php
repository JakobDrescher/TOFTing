<?php
declare(strict_types=1);

namespace Jdres\Tofting;

/**
 * A class to store user data
 */
class User
{
    private string $guid;

    /**
     * @param string $guid
     */
    public function __construct(string $guid)
    {
        $this->guid = $guid;
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }
}