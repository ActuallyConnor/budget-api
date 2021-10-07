<?php

namespace Budget\Categories\Category;

use LogicException;
use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Category
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
     * @var Money
     */
    private Money $budgeted;

    /**
     * @var int|null
     */
    private ?int $parentCategoryId;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  int|null  $userId
     * @param  string  $label
     * @param  Money  $budgeted
     * @param  int|null  $parentCategoryId
     */
    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        ?int $userId,
        string $label,
        Money $budgeted,
        ?int $parentCategoryId
    ) {
        $this->id               = $id;
        $this->uuid             = $uuid;
        $this->userId           = $userId;
        $this->label            = $label;
        $this->budgeted         = $budgeted;
        $this->parentCategoryId = $parentCategoryId;
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
     * @return Money
     */
    public function getBudgeted(): Money
    {
        return $this->budgeted;
    }

    /**
     * @return bool
     */
    public function hasParentCategoryId(): bool
    {
        return ! is_null($this->parentCategoryId);
    }

    /**
     * @return int
     */
    public function getParentCategoryId(): int
    {
        if (is_null($this->parentCategoryId)) {
            throw new LogicException('Parent category Id is not set');
        }

        return $this->parentCategoryId;
    }

}
