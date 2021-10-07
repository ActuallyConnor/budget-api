<?php

namespace Budget\Budgets\Budget;

use LogicException;
use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Budget
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
     * @var int
     */
    private int $year;

    /**
     * @var int
     */
    private int $month;

    /**
     * @var int|null
     */
    private ?int $categoryId;

    /**
     * @var int|null
     */
    private ?int $userId;

    /**
     * @var Money
     */
    private Money $budgeted;

    /**
     * @var Money
     */
    private Money $spent;

    /**
     * @var Money
     */
    private Money $balance;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  int  $year
     * @param  int  $month
     * @param  int|null  $categoryId
     * @param  int|null  $userId
     * @param  Money  $budgeted
     * @param  Money  $spent
     * @param  Money  $balance
     */
    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        int $year,
        int $month,
        ?int $categoryId,
        ?int $userId,
        Money $budgeted,
        Money $spent,
        Money $balance
    ) {
        $this->id         = $id;
        $this->uuid       = $uuid;
        $this->year       = $year;
        $this->month      = $month;
        $this->categoryId = $categoryId;
        $this->userId     = $userId;
        $this->budgeted   = $budgeted;
        $this->spent      = $spent;
        $this->balance    = $balance;
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
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return bool
     */
    public function hasCategoryId(): bool
    {
        return ! is_null($this->categoryId);
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        if (is_null($this->categoryId)) {
            throw new LogicException('Category Id is not set');
        }

        return $this->categoryId;
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
     * @return Money
     */
    public function getBudgeted(): Money
    {
        return $this->budgeted;
    }

    /**
     * @return Money
     */
    public function getSpent(): Money
    {
        return $this->spent;
    }

    /**
     * @return Money
     */
    public function getBalance(): Money
    {
        return $this->balance;
    }
}
