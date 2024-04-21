<?php

namespace LaravelLegends\EloquentFilter\Rules;

use LaravelLegends\EloquentFilter\Contracts\ApplicableFilter;


class Contains implements ApplicableFilter
{
    public function __invoke($query, $field, $value)
    {
        {
            if (str_contains($field, ',')) {
                $fields = explode(',', $field);
                $query->where($fields[0], 'LIKE', "%{$value}%");
    
                for ($i = 1; $i < count($fields); $i++) {
                    $query->orWhere($fields[$i], 'LIKE', "%{$value}%");
                }
            } else {
                $query->where($field, 'LIKE', "%{$value}%");
            }
        }
    }
}