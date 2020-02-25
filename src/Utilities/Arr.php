<?php

namespace ExenJer\GamemoneyLaravel\Utilities;

class Arr
{
    /**
     * @param array $data
     * @return string
     */
    public static function toSignString(array $data): string
    {
        $text = '';
        ksort($data);

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = self::toSignString($value);
            }

            $text .= $key . ':' . $value . ';';
        }

        return $text;
    }
}
