<?php

namespace Dammynex\DataClass;

interface DataClassInterface
{
    public function getData(): array;

    public function getMetadata(): array;
}
