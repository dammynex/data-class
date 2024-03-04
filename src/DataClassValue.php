<?php

namespace Dammynex\DataClass;

readonly class DataClassValue
{
    public function __construct(
        public string $value,
        public bool $is_private = false
    ) {
    }

    public static function new(string $value, bool $is_private = false)
    {
        return new self(
            is_private: $is_private,
            value: $value
        );
    }
}
