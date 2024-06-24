<?php

    $func = create_function('$a, $b', 'return $a + $b;');
    echo $func(1, 2);

    $array = [1, 2, 3, 4];
    reset($array);
    while (list($key, $val) = each($array)) {
        echo "$key => $val\n";
    }
