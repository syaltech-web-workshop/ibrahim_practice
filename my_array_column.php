<?php

/**
 * gets the values of a given array key or object property from an multi dimensions array or an array of objects
 *
 * @param array $input
 * @param mixed $column_key
 * @param mixed|null $index_key
 *
 * @return array
 */
function my_array_column(array $input, $column_key, $index_key = null): array
{
    $array_column = [];
    foreach ($input as $item) {
        if (is_array($item) && isset($item[$column_key])) {
            if ($index_key && isset($item[$index_key])) {
                $array_column[$item[$index_key]] = $item[$column_key];
            } else {
                $array_column[] = $item[$column_key];
            }
        } elseif (is_object($item) && isset($item->{$column_key})) {
            if ($index_key && isset($item->{$index_key})) {
                $array_column[$item->{$index_key}] = $item->{$column_key};
            } else {
                $array_column[] = $item->{$column_key};
            }
        }
    }
    return $array_column;
}

$records_array = [
    [
        'name' => 'Ibrahim',
        'id' => 1
    ],
    [
        'name' => 'Ahmed',
        'id' => 2
    ]
];
$records_object = [];
$one = new \stdClass();
$one->name = 'Ibrahim';
$one->id = 1;
$two = new \stdClass();
$two->name = 'Ahmed';
$two->id = 2;
$records_object = [$one, $two];

print_r(my_array_column($records_array, 'name', 'id'));
print_r(my_array_column($records_array, 'name'));
print_r(my_array_column($records_object, 'name', 'id'));
