<?php
if (!function_exists('count_files_in_array')) {
    /**
     * Returns an array with countable files
     *
     * @param array $array
     * array in which we will count files
     *
     * @param array $keys
     * array of keys in array in which we will count words
     *
     * @param int $count
     * number of elements in array
     *
     * @return array an array with count words
     *
     * */
    function count_files_in_array($array, $keys, $count = false)
    {
        $result = array();
        foreach ($array as $value) {
            foreach ($keys as $key) {
                $words_to_count = strtolower(strip_tags($value[$key]));
                $total_words = array_count_values(str_word_count($words_to_count, 1));
                foreach ($total_words as $k => $v) {
                    if (in_array($k, config('app.exclude_words'))) {
                        continue;
                    }
                    if (array_key_exists($k, $result)) {
                        $result[$k] += $v;
                    } else {
                        $result[$k] = $v;
                    }
                }
            }
        }
        arsort($result, SORT_NUMERIC);
        if (!$count) {
            return $result;
        } else {
            return array_slice($result, 0, $count);
        }
    }

}
