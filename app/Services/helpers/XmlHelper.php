<?php

namespace App\Services\helpers;

use \Illuminate\Support\Collection;

class XmlHelper
{
    /**
     * Convert an array of SimpleXMLElement's into a
     * collection.
     *
     */
    public static function recordsToCollection($records) : Collection
    {
        $array = [];

        if (!$records) {
            return collect($array);
        }

        foreach ($records as $record) {
            $array[] = (array)$record;
        }

        return collect($array);
    }
}
