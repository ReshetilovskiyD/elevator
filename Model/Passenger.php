<?php

namespace Elevator\Model;

use Elevator\Enum\ElevatorEnum;
use Elevator\Enum\PassengerStatusEnum;

/**
 * Class Passenger
 * @package Elevator\Model
 */
class Passenger
{
    const WEIGHT = 70;

    /** @var int */
    private $startFloor;

    /** @var int */
    private $destFloor;

    /** @var int */
    private $status;

    /**
     * Passenger constructor.
     * @param int $startFloor
     * @param int $destFloor
     * @param int $status
     */
    public function __construct(int $startFloor, int $destFloor, int $status = PassengerStatusEnum::REGULAR)
    {
        $this->setStartFloor($startFloor);
        $this->setDestFloor($destFloor);
        $this->setStatus($status);
    }

    /**
     * @return mixed
     */
    public function getStartFloor(): int
    {
        return $this->startFloor;
    }

    /**
     * @param mixed $startFloor
     */
    public function setStartFloor($startFloor): void
    {
        $this->startFloor = $startFloor;
    }

    /**
     * @return int
     */
    public function getDestFloor(): int
    {
        return $this->destFloor;
    }

    /**
     * @param mixed $destFloor
     */
    public function setDestFloor($destFloor): void
    {
        $this->destFloor = $destFloor;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return self::WEIGHT;
    }

    /**
     * @return int
     */
    public function getDirection(): int
    {
        return $this->startFloor < $this->destFloor ? ElevatorEnum::DIRECTION_UP : ElevatorEnum::DIRECTION_DOWN;
    }

    /**
     * @param int $floor
     * @param int $direction
     * @return bool
     */
    public function checkByDirection(int $floor, int $direction): bool
    {
        if (
            $direction == ElevatorEnum::DIRECTION_UP && $floor < $this->getStartFloor() ||
            $direction == ElevatorEnum::DIRECTION_DOWN && $floor > $this->getStartFloor()
        ) {
            return true;
        }
        return false;
    }
}
