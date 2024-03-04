<?php

namespace Dammynex\DataClass;

use ReflectionClass;
use ReflectionProperty;

abstract class DataClass implements DataClassInterface
{
    /**
     * Get data
     *
     * @return array
     */
    public function getData(): array
    {
        $data = array();
        return $data;
    }

    /**
     * Get metadata
     *
     * @return array
     */
    public function getMetadata(): array
    {
        $metadata = array();
        $properties = self::getProperties();

        array_walk($properties, function ($prop_name) use (&$metadata) {
            $property = $this->{$prop_name};

            if (!$property->is_private) {
                $metadata[$prop_name] = $property->value;
            }
        });

        return $metadata;
    }

    /**
     * Get $this class' properties
     *
     * @return array
     */
    public static function getProperties(): array
    {
        $rf_class = new ReflectionClass(static::class);
        $properties = $rf_class->getProperties(
            ReflectionProperty::IS_PROTECTED
        );

        $items = array();
        array_walk($properties, function ($prop) use (&$items) {
            $items[] = $prop->name;
        });

        return $items;
    }

    /**
     * Check if property exists
     *
     * @param string $name
     * @return boolean
     */
    public static function hasProperty(string $name): bool
    {
        return in_array($name, self::getProperties());
    }
}
