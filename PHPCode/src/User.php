<?php
declare(strict_types=1);

namespace Jdres\Tofting;

use JsonSerializable;

/**
 * A class to store user data
 */
class User implements JsonSerializable
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

    public function jsonSerialize(): array
    {
        return [
            'user' => [
                'guid' => $this->guid
            ]
        ];
    }
}