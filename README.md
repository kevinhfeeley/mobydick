# mobydick
Two files are loaded and split into arrays.
The first of the two files "stops.txt" indicates words to be excluded from the final results, the second of the two files "mobydick.txt" is the text of the classic novel "Moby Dick" as found on Project Gutenberg, in flat text format.

The moby dick contents are first loaded into an array of lines of the file, then each line is split into words, stripped of punctuation, and compared to the "stops" array for exclusion.
If the word has not appeared in the text previously an entry is placed into a new array and given a numeric value of 1.
If the word has appeared in the text previously then the previously established array entry value is increased by 1.

The final array of words and counts is then looped through and displayed in an html table, stopping after the 10th word in the array is displayed.
The word count is also relayed to a script utilizing the GD-Lib that renders a bar graph in the third column of the table.
