def word_break(s, word_dict):
    def backtrack(start, path):
        if start == len(s):
            results.append(" ".join(path))
            return
        for end in range(start + 1, len(s) + 1):
            word = s[start:end]
            if word in word_dict:
                backtrack(end, path + [word])

    results = []
    word_set = set(word_dict)  # Use a set for faster lookups
    backtrack(0, [])
    return results

# Input
word_dict = ["this", "th", "is", "famous", "Word", "break", "b", "r", "e", "a", "k", "br", "bre", "brea", "ak", "problem"]
s = "Wordbreakproblem"

# Function call and output
result = word_break(s, word_dict)
for sentence in result:
    print(sentence)
