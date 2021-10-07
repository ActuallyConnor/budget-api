<?php

namespace Budget\Transactions\Transaction;

use DateTimeInterface;
use LogicException;
use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Transaction
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
    private DateTimeInterface $date;

    /**
     * @var int
     */
    private int $accountId;

    /**
     * @var int
     */
    private int $categoryId;

    /**
     * @var int|null
     */
    private ?int $billId;

    /**
     * @var string
     */
    private string $payee;

    /**
     * @var Money
     */
    private Money $amount;

    /**
     * @var int
     */
    private int $inflow;

    /**
     * @var int
     */
    private int $cleared;

    /**
     * @var string|null
     */
    private ?string $flair;

    /**
     * @var string|null
     */
    private ?string $note;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  int|null  $userId
     * @param  DateTimeInterface  $date
     * @param  int  $accountId
     * @param  int  $categoryId
     * @param  int|null  $billId
     * @param  string  $payee
     * @param  Money  $amount
     * @param  int  $inflow
     * @param  int  $cleared
     * @param  string|null  $flair
     * @param  string|null  $note
     */
    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        ?int $userId,
        DateTimeInterface $date,
        int $accountId,
        int $categoryId,
        ?int $billId,
        string $payee,
        Money $amount,
        int $inflow,
        int $cleared,
        ?string $flair,
        ?string $note
    ) {
        $this->id         = $id;
        $this->uuid       = $uuid;
        $this->userId     = $userId;
        $this->date       = $date;
        $this->accountId  = $accountId;
        $this->categoryId = $categoryId;
        $this->billId     = $billId;
        $this->payee      = $payee;
        $this->amount     = $amount;
        $this->inflow     = $inflow;
        $this->cleared    = $cleared;
        $this->flair      = $flair;
        $this->note       = $note;
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
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->accountId;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return bool
     */
    public function hasBillId(): bool
    {
        return ! is_null($this->billId);
    }

    /**
     * @return int
     */
    public function getBillId(): int
    {
        if (is_null($this->billId)) {
            throw new LogicException('Bill Id is not set');
        }

        return $this->billId;
    }

    /**
     * @return string
     */
    public function getPayee(): string
    {
        return $this->payee;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getInflow(): int
    {
        return $this->inflow;
    }

    /**
     * @return int
     */
    public function getCleared(): int
    {
        return $this->cleared;
    }

    /**
     * @return bool
     */
    public function hasFlair(): bool
    {
        return ! is_null($this->flair);
    }

    /**
     * @return string
     */
    public function getFlair(): string
    {
        if (is_null($this->flair)) {
            throw new LogicException('Flair is not set');
        }

        return $this->flair;
    }

    /**
     * @return bool
     */
    public function hasNote(): bool
    {
        return ! is_null($this->note);
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        if (is_null($this->note)) {
            throw new LogicException('Note is not set');
        }

        return $this->note;
    }
}
