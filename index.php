<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

/**
 * @param int[] $height
 * @return int
 */
function trap(array $height): int
{
    $countWaterBlock = 0;
    $countHeight = count($height);
    if($countHeight < 2) {
        return $countWaterBlock;
    }
    
    $leftMost = $rightMost = $height;
    // Initialization;
    $leftMost[0] = 0;
    $rightMost[$countHeight - 1] = 0;
    
    for ($i = 1; $i < $countHeight - 1; $i++) {
        $leftMost[$i] = max($leftMost[$i - 1], $height[$i - 1]);
    }
    
    for ($i = $countHeight - 2; $i >= 0; $i--) {
        $rightMost[$i] = max($rightMost[$i + 1], $height[$i + 1]);
    }
    
    for ($i = 0; $i < $countHeight; $i++)
    {
        if (min($leftMost[$i], $rightMost[$i]) - $height[$i] > 0) {
            $countWaterBlock += min($leftMost[$i], $rightMost[$i]) - $height[$i];
        }
    }
    
    return $countWaterBlock;
}

echo '[0,1,0,2,1,0,1,3,2,1,2,1] : ' . trap([0,1,0,2,1,0,1,3,2,1,2,1]) . PHP_EOL;
echo '[4,2,0,3,2,5] : ' . trap([4,2,0,3,2,5]) . PHP_EOL;