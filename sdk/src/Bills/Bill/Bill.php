<?php

namespace Budget\Bills\Bill;

use DateTimeInterface;
use LogicException;
use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Bill
{
    private ?int $id;

    private UuidInterface $uuid;

    private ?int $userId;

    private DateTimeInterface $startDate;

    private int $frequency;

    private string $label;

    private Money $amount;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  int|null  $userId
     * @param  DateTimeInterface  $startDate
     * @param  int  $frequency
     * @param  string  $label
     * @param  Money  $amount
     */
    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        ?int $userId,
        DateTimeInterface $startDate,
        int $frequency,
        string $label,
        Money $amount
    ) {
        $this->id        = $id;
        $this->uuid      = $uuid;
        $this->userId    = $userId;
        $this->startDate = $startDate;
        $this->frequency = $frequency;
        $this->label     = $label;
        $this->amount    = $amount;
    }

    public function hasId(): bool
    {
        return ! is_null($this->id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        if (is_null($this->id)) {
            throw new LogicException('Id is not set');
        }

        return $this->id;
    }

    /**
     * @return UuidInterface
     */
    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

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
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @return int
     */
    public function getFrequency(): int
    {
        return $this->frequency;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }
}
