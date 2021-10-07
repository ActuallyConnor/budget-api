<?php

namespace Budget\Users\User;

use DateTimeInterface;
use LogicException;
use Ramsey\Uuid\UuidInterface;

final class User
{
    private ?int $id;

    private UuidInterface $uuid;

    private string $firstName;

    private string $lastName;

    private string $email;

    private bool $isAdmin;

    private ?string $address;

    private ?string $city;

    private ?string $country;

    private ?string $postalZip;

    private string $locale;

    private ?string $phone;

    private ?DateTimeInterface $dob;

    private ?int $sexCode;

    private array $settings;

    private ?string $profileImage;

    private bool $active;

    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        string $firstName,
        string $lastName,
        string $email,
        bool $isAdmin,
        ?string $address = null,
        ?string $city = null,
        ?string $country = null,
        ?string $postalZip = null,
        string $locale = 'en_CA',
        ?string $phone = null,
        ?DateTimeInterface $dob = null,
        ?int $sexCode = null,
        array $settings = [],
        ?string $profileImage = null,
        bool $active = true
    ) {

        $this->id           = $id;
        $this->uuid         = $uuid;
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->email        = $email;
        $this->isAdmin      = $isAdmin;
        $this->address      = $address;
        $this->city         = $city;
        $this->country      = $country;
        $this->postalZip    = $postalZip;
        $this->locale       = $locale;
        $this->phone        = $phone;
        $this->dob          = $dob;
        $this->sexCode      = $sexCode;
        $this->settings     = $settings;
        $this->profileImage = $profileImage;
        $this->active       = $active;
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

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function hasAddress(): bool
    {
        return ! is_null($this->address);
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        if (is_null($this->address)) {
            throw new LogicException('Address is not set');
        }

        return $this->address;
    }

    public function hasCity(): bool
    {
        return ! is_null($this->city);
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        if (is_null($this->city)) {
            throw new LogicException('City is not set');
        }

        return $this->city;
    }

    public function hasCountry(): bool
    {
        return ! is_null($this->country);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        if (is_null($this->country)) {
            throw new LogicException('Country is not set');
        }

        return $this->country;
    }

    public function hasPostalZip(): bool
    {
        return ! is_null($this->postalZip);
    }

    /**
     * @return string
     */
    public function getPostalZip(): string
    {
        if (is_null($this->postalZip)) {
            throw new LogicException('Postal/Zip code is not set');
        }

        return $this->postalZip;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    public function hasPhone(): bool
    {
        return ! is_null($this->phone);
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        if (is_null($this->phone)) {
            throw new LogicException('Phone is not set');
        }

        return $this->phone;
    }

    public function hasDob(): bool
    {
        return ! is_null($this->dob);
    }

    /**
     * @return DateTimeInterface
     */
    public function getDob(): DateTimeInterface
    {
        if (is_null($this->dob)) {
            throw new LogicException('DOB is not set');
        }

        return $this->dob;
    }

    public function hasSexCode(): bool
    {
        return ! is_null($this->sexCode);
    }

    /**
     * @return int
     */
    public function getSexCode(): int
    {
        if (is_null($this->sexCode)) {
            throw new LogicException('Sex code is not set');
        }

        return $this->sexCode;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    public function hasProfileImage(): bool
    {
        return ! is_null($this->profileImage);
    }

    /**
     * @return string
     */
    public function getProfileImage(): string
    {
        if (is_null($this->profileImage)) {
            throw new LogicException('Profile image is not set');
        }

        return $this->profileImage;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
