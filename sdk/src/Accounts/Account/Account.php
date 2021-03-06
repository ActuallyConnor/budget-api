<?php

namespace Budget\Accounts\Account;

use DateTimeInterface;
use LogicException;
use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Account
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
     * @var DateTimeInterface
     */
    private DateTimeInterface $dateOpened;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var Money
     */
    private Money $balance;

    /**
     * @var Money
     */
    private Money $interest;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  int|null  $userId
     * @param  DateTimeInterface  $dateOpened
     * @param  string  $name
     * @param  Money  $balance
     * @param  Money  $interest
     */
    public function __construct(

        ?int $id,
        UuidInterface $uuid,
        ?int $userId,
        DateTimeInterface $dateOpened,
        string $name,
        Money $balance,
        Money $interest
    ) {
        $this->id         = $id;
        $this->uuid       = $uuid;
        $this->userId     = $userId;
        $this->dateOpened = $dateOpened;
        $this->name       = $name;
        $this->balance    = $balance;
        $this->interest   = $interest;
    }

    /**
     * @return bool
     */
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
     * @return DateTimeInterface
     */
    public function getDateOpened(): DateTimeInterface
    {
        return $this->dateOpened;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getInterest(): Money
    {
        return $this->interest;
    }
}
