<?php

namespace Budget\Users\User;

use DateTimeInterface;
use LogicException;
use Ramsey\Uuid\UuidInterface;

final class User
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
     * @var string
     */
    private string $firstName;

    /**
     * @var string
     */
    private string $lastName;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var bool
     */
    private bool $isAdmin;

    /**
     * @var string|null
     */
    private ?string $address;

    /**
     * @var string|null
     */
    private ?string $city;

    /**
     * @var string|null
     */
    private ?string $provinceState;

    /**
     * @var string|null
     */
    private ?string $country;

    /**
     * @var string|null
     */
    private ?string $postalZip;

    /**
     * @var string
     */
    private string $locale;

    /**
     * @var string|null
     */
    private ?string $phone;

    /**
     * @var DateTimeInterface|null
     */
    private ?DateTimeInterface $dob;

    /**
     * @var int|null
     */
    private ?int $sexCode;

    /**
     * @var array
     */
    private array $settings;

    /**
     * @var string|null
     */
    private ?string $profileImage;

    /**
     * @var bool
     */
    private bool $active;

    /**
     * @param  int|null  $id
     * @param  UuidInterface  $uuid
     * @param  string|null  $firstName
     * @param  string|null  $lastName
     * @param  string  $email
     * @param  bool  $isAdmin
     * @param  string|null  $address
     * @param  string|null  $city
     * @param  string|null  $provinceState
     * @param  string|null  $country
     * @param  string|null  $postalZip
     * @param  string  $locale
     * @param  string|null  $phone
     * @param  DateTimeInterface|null  $dob
     * @param  int|null  $sexCode
     * @param  array  $settings
     * @param  string|null  $profileImage
     * @param  bool  $active
     */
    public function __construct(
        ?int $id,
        UuidInterface $uuid,
        ?string $firstName,
        ?string $lastName,
        string $email,
        bool $isAdmin,
        ?string $address = null,
        ?string $city = null,
        ?string $provinceState = null,
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

        $this->id            = $id;
        $this->uuid          = $uuid;
        $this->firstName     = $firstName;
        $this->lastName      = $lastName;
        $this->email         = $email;
        $this->isAdmin       = $isAdmin;
        $this->address       = $address;
        $this->city          = $city;
        $this->provinceState = $provinceState;
        $this->country       = $country;
        $this->postalZip     = $postalZip;
        $this->locale        = $locale;
        $this->phone         = $phone;
        $this->dob           = $dob;
        $this->sexCode       = $sexCode;
        $this->settings      = $settings;
        $this->profileImage  = $profileImage;
        $this->active        = $active;
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
    public function hasFirstName(): bool
    {
        return ! is_null($this->firstName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        if (is_null($this->firstName)) {
            throw new LogicException('First name is not set');
        }

        return $this->firstName;
    }

    /**
     * @return bool
     */
    public function hasLastName(): bool
    {
        return ! is_null($this->lastName);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        if (is_null($this->lastName)) {
            throw new LogicException('Last name is not set');
        }

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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
    public function hasProvinceState(): bool
    {
        return ! is_null($this->provinceState);
    }

    /**
     * @return string
     */
    public function getProvinceState(): string
    {
        if (is_null($this->provinceState)) {
            throw new LogicException('Province/state is not set');
        }

        return $this->provinceState;
    }

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
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
