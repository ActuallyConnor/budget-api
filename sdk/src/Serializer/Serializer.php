<?php

namespace Budget\Serializer;

use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;
use LogicException;
use Throwable;

class Serializer
{
    public const DATE_FORMAT = DateTimeInterface::RFC3339;

    public const DB_DATE_FORMAT = 'Y-m-d';

    /**
     * @param  string|null  $input
     * @param  string  $format
     *
     * @return DateTimeInterface
     */
    public static function deserializeDate(?string $input, string $format = self::DATE_FORMAT): DateTimeInterface
    {
        $date = self::parseDate($input, true, $format);

        if (is_null($date)) {
            throw new LogicException('Parsing error');
        }

        return $date;
    }

    /**
     * @param  string|null  $input
     * @param  bool  $throwOnInvalid
     * @param  string  $format
     *
     * @return DateTimeInterface|null
     */
    private static function parseDate(?string $input, bool $throwOnInvalid, string $format): ?DateTimeInterface
    {
        try {
            $date = ! empty($input)
                ? DateTimeImmutable::createFromFormat($format, $input, new \DateTimeZone('UTC'))
                : false;
        } catch (Throwable $e) {
            if ($throwOnInvalid) {
                throw new InvalidArgumentException(sprintf('Could not parse date "%s"', $input), $e->getCode(), $e);
            }

            $date = false;
        }

        if ( ! $date && $throwOnInvalid) {
            throw new InvalidArgumentException(sprintf('Could not parse date "%s"', $input));
        }

        return $date !== false ? $date : null;
    }

    /**
     * @param  string  $sex
     *
     * @return int
     */
    public static function getSexCode(string $sex): int
    {
        if ($sex === 'M') {
            return 1;
        }

        if ($sex === 'F') {
            return 2;
        }

        return 0;
    }

    /**
     * @param  int  $sexCode
     *
     * @return string|null
     */
    public static function getSexFromCode(int $sexCode): ?string
    {
        if ($sexCode == 1) {
            return 'M';
        }

        if ($sexCode == 2) {
            return 'F';
        }

        return null;
    }
}
