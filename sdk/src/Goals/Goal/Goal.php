<?php

namespace Budget\Goals\Goal;

use DateTimeInterface;
use LogicException;
use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Goal
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var UuidInterface
     */
    private UuidInterface $uuid;

    /**
     * @var int|null
     */
    private ?int $userId;

    /**
     * @var string
     */
    private string $label;

    /**
     * @var DateTimeInterface
     */
    private DateTimeInterface $startDate;

    /**
     * @var DateTimeInterface
     */
    private DateTimeInterface $goalDate;

    /**
     * @var Money
     */
    private Money $balance;

    /**
     * @var Money
     */
    private Money $amount;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  int|null  $userId
     * @param  string  $label
     * @param  DateTimeInterface  $startDate
     * @param  DateTimeInterface  $goalDate
     * @param  Money  $balance
     * @param  Money  $amount
     */
    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        ?int $userId,
        string $label,
        DateTimeInterface $startDate,
        DateTimeInterface $goalDate,
        Money $balance,
        Money $amount
    ) {
        $this->id        = $id;
        $this->uuid      = $uuid;
        $this->userId    = $userId;
        $this->label     = $label;
        $this->startDate = $startDate;
        $this->goalDate  = $goalDate;
        $this->balance   = $balance;
        $this->amount    = $amount;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return UuidInterface
     */
    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    /**
     * @return bool
     */
    public function hasUserId(): bool
    {
        return ! is_null($this->userId);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        if (is_null($this->userId)) {
            throw new LogicException('User Id is not set');
        }

        return $this->userId;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getGoalDate(): DateTimeInterface
    {
        return $this->goalDate;
    }

    /**
     * @return Money
     */
    public function getBalance(): Money
    {
        return $this->balance;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }
}
