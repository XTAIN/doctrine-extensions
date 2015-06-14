<?php

namespace XTAIN\DoctrineExtensions\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class UTCDateTimeTypeNullable
 *
 * @author Maximilian Ruta <mr@xtain.net>
 * @package XTAIN\DoctrineExtensions\DBAL\Types
 */
class UTCDateTimeTypeNullable extends UTCDateTimeType
{
    /**
     * @param AbstractPlatform $platform
     *
     * @return string
     * @author Maximilian Ruta <mr@xtain.net>
     */
    protected function getNullDateTime(AbstractPlatform $platform)
    {
        $format = $platform->getDateTimeFormatString();

        return str_replace(
            [
                'Y',
                'm',
                'd',
                'H',
                'i',
                's'
            ],
            [
                '0000',
                '00',
                '00',
                '00',
                '00',
                '00'
            ],
            $format
        );
    }

    /**
     * {@inheritDoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $value = parent::convertToDatabaseValue($value, $platform);

        if ($value === null) {
            return $this->getNullDateTime($platform);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === $this->getNullDateTime($platform)) {
            return null;
        }

        return parent::convertToPHPValue($value, $platform);
    }
}