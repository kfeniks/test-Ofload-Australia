<?php
/**
 * @version 2.0.0
 * @access public
 */

declare(strict_types=1);

/**
 * @param array $height
 * @return int
 */
function findWater(array $height): int
{
    $size = count($height);
    
    # left[i] contains height of tallest bar to the
    # left of i'th bar including itself
    
    # Right [i] contains height of tallest bar to
    # the right of ith bar including itself
    
    # Initialize result
    $water = 0;
    
    # Fill left array
    $left[0] = $height[0];
    for ($i = 1; $i < $size; $i++) {
        $left[$i] = max($left[$i - 1], $height[$i]);
    }
    
    # Fill right array
    $right[$size - 1] = $height[$size - 1];
    for ($i = $size - 2; $i >= 0; $i--) {
        $right[$i] = max($right[$i + 1], $height[$i]);
    }
    
    # Calculate the accumulated water element by element
    # consider the amount of water on i'th bar, the
    # amount of water accumulated on this particular
    # bar will be equal to min(left[i], right[i]) - arr[i] .
    for ($i = 0; $i < $size; $i++) {
        $water += min($left[$i], $right[$i]) - $height[$i];
    }
    
    return $water;
}

$arr1 = [0,1,0,2,1,0,1,3,2,1,2,1];
$arr2 = [4,2,0,3,2,5];
echo '[0,1,0,2,1,0,1,3,2,1,2,1] : ' . findWater($arr1) . PHP_EOL;
echo '[4,2,0,3,2,5] : ' . findWater($arr2) . PHP_EOL;