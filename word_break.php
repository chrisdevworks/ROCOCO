<?php

function wordBreak($s, $wordDict) {
    $wordSet = array_flip($wordDict);  // Create a set for fast lookup
    $memo = [];
    $results = [];

    function backtrack($start, $path) use ($s, $wordSet, &$results, &$memo) {
        if ($start == strlen($s)) {
            $results[] = implode(' ', $path);
            return;
        }

        if (isset($memo[$start])) {
            return;
        }

        for ($end = $start + 1; $end <= strlen($s); $end++) {
            $word = substr($s, $start, $end - $start);
            if (isset($wordSet[$word])) {
                $path[] = $word;
                backtrack($end, $path);
                array_pop($path);
            }
        }

        $memo[$start] = true;
    }

    backtrack(0, []);
    return $results;
}

// Input
$wordDict = ["this", "th", "is", "famous", "Word", "break", "b", "r", "e", "a", "k", "br", "bre", "brea", "ak", "problem"];
$s = "Wordbreakproblem";

// Function call and output
$result = wordBreak($s, $wordDict);
foreach ($result as $sentence) {
    echo $sentence . "\n";
}
?>