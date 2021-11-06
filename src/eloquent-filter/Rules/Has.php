<?php

namespace LaravelLegends\EloquentFilter\Rules;

use LaravelLegends\EloquentFilter\Contracts\ApplicableFilter;


class Has implements ApplicableFilter
{
    public function __invoke($query, $field, $boolean)
    {
       $boolean ? $query->has($field) : $query->doesntHave($field);
    }
}