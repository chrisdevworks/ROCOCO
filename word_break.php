<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Break Problem</title>
</head>
<body>
    <h1>Word Break Problem Solution</h1>
    <?php
    function wordBreak($s, $wordDict) {
        global $wordSet, $memo;
        $wordSet = array_flip($wordDict);
        $memo = [];
        $results = [];

        function backtrack($start, $path) {
            global $s, $wordSet, $results, $memo;

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

    // Output
    $result = wordBreak($s, $wordDict);
    ?>

    <ul>
        <?php foreach ($result as $sentence): ?>
            <li><?php echo htmlspecialchars($sentence); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
