# Doctrine Extensions

## Types

### UTC DateTime

Configuration in Symfony 2:

    doctrine:
        dbal:
            types:
                datetime: XTAIN\DoctrineExtensions\DBAL\Types\UTCDateTimeType
                datetime_nullable: XTAIN\DoctrineExtensions\DBAL\Types\UTCDateTimeTypeNullable