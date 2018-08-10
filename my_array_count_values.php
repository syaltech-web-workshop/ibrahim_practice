<?php

/**
 * count every repeated value in the given array
 *
 * @param array $array
 * @return array
 */
function my_array_count_values(array $array):array
{
    $array_counted_values = [];
    foreach($array as $item){
            if(!is_int($item) && !is_string($item)){
                    trigger_error('my_array_count_values(): Can only count STRING and INTEGER values!',E_USER_WARNING);
                    continue;
            }
            if(!isset($array_counted_values[$item])){
                    $array_counted_values[$item] = 0;
            }
            $array_counted_values[$item]++;                       
    }
    return $array_counted_values;
}
//tests for the function
print_r(my_array_count_values([1,'test',1,'test',[],null,1.5,'test'])); //with warnings
print_r(my_array_count_values([1,'test',1,'test','test'])); //without warnings

