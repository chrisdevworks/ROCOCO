function wordBreak(s, wordDict) {
    const wordSet = new Set(wordDict);  // Create a set for fast lookup
    const memo = new Map();
    const results = [];

    function backtrack(start, path) {
        if (start === s.length) {
            results.push(path.join(' '));
            return;
        }

        if (memo.has(start)) {
            return;
        }

        for (let end = start + 1; end <= s.length; end++) {
            const word = s.substring(start, end);
            if (wordSet.has(word)) {
                path.push(word);
                backtrack(end, path);
                path.pop();
            }
        }

        memo.set(start, true);
    }

    backtrack(0, []);
    return results;
}

// Input
const wordDict = ["this", "th", "is", "famous", "Word", "break", "b", "r", "e", "a", "k", "br", "bre", "brea", "ak", "problem"];
const s = "Wordbreakproblem";

// Function call and output
const result = wordBreak(s, wordDict);
result.forEach(sentence => console.log(sentence));
