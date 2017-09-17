<?php

function solve(int $money, array $coins, array &$memo=[], int $memoKey=0) : int {
    if(isset($memo[$memoKey])) {
        // we want to avoid counting twice
        // two different diffs with the same
        // operands in distinct order
        // eg: money-4-1-1-2 and money-4-1-2-1
        // so we are only counting each unique set of operands once
        $memo[$memoKey] = 0;
        return 0;
    }elseif($money < 0){
        $memo[$memoKey] = 0;
        return 0;
    }elseif($money > 0){
        $memo[$memoKey] = 0;
        for($i=0; $i<count($coins); $i++){
            if($money-$coins[$i] >= 0){
                $memo[$memoKey] += solve($money-$coins[$i], $coins, $memo, $memoKey + pow(10,$i));
            }
        }
        return $memo[$memoKey];
    }else{
        $memo[$memoKey] = 1;
        return 1;
    }
}


echo "\n ".solve(10,[2,5,3,6]);