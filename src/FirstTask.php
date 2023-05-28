<?php

namespace Daniil\PhpInterview;

class FirstTask
{
    public function uniqueIdInArray(array $array): array
    {
        $arr = [];

        return array_values(array_filter($array, static function ($value) use (&$arr) {
            $result = !in_array($value['id'], $arr, true);
            $arr[] = $value['id'];

            return $result;
        }));
    }

    public function sortMultidimensionalArray(array $arr, string $key): array
    {
        match ($key) {
            'id' => usort($arr, static fn($a, $b) => $a[$key] <=> $b[$key]),
            'date' => usort($arr, static fn($a, $b) => strtotime($a[$key]) <=> strtotime($b[$key])),
            'name' => usort($arr, static fn($a, $b) => strcmp($a[$key], $b[$key]))
        };

        return $arr;
    }

    public function filterArrayByCondition(array $array, string $key, string|int $value): array
    {
        return array_filter($array, static fn($item) => $item[$key] === $value);
    }

    public function reverseKeyAndValues($array, $key, $value): array
    {
        return array_map(static function ($result) use ($key, $value) {
            return [$result[$key] => $result[$value]];
        }, $array);
    }
}