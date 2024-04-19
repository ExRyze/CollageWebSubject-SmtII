<?php

// Stars
$max = 5;

echo "<p>";
echo "Left - Top <br>";
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Left - Bottom <br>");
for ($i = $max; $i > 0; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Right - Top <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($k = $i; $k < $max; $k++) {
        echo("_");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Right - Bottom <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j < $i; $j++) {
        echo("_");
    }
    for ($k = $max; $k >= $i; $k--) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Triangle - Top <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($k = $i; $k < $max; $k++) {
        echo("_");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    for ($j = 2; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Triangle - Bottom <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j < $i; $j++) {
        echo("_");
    }
    for ($k = $max; $k >= $i; $k--) {
        echo("*");
    }
    for ($j = $i; $j < $max; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Triangle - Left <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($k = $i; $k < $max; $k++) {
        echo("_");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}
for ($i = 2; $i <= $max; $i++) {
    for ($j = 1; $j < $i; $j++) {
        echo("_");
    }
    for ($k = $max; $k >= $i; $k--) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Triangle - Right <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}
for ($i = ($max - 1); $i > 0; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Diamond <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($k = $i; $k < $max; $k++) {
        echo("_");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    for ($j = 2; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}
for ($i = 2; $i <= $max; $i++) {
    for ($j = 1; $j < $i; $j++) {
        echo("_");
    }
    for ($k = $max; $k >= $i; $k--) {
        echo("*");
    }
    for ($j = $i; $j < $max; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Hourglass <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j < $i; $j++) {
        echo("_");
    }
    for ($k = $max; $k >= $i; $k--) {
        echo("*");
    }
    for ($j = $i; $j < $max; $j++) {
        echo("*");
    }
    echo("<br>");
}
for ($i = 2; $i <= $max; $i++) {
    for ($k = $i; $k < $max; $k++) {
        echo("_");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    for ($j = 2; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Square <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j <= $max; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Parellelogram - Top <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($j = 1; $j < $i; $j++) {
        echo("_");
    }
    for ($k = $max; $k >= $i; $k--) {
        echo("*");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    echo("<br>");
}

echo(" <br>");

echo("Parellelogram - Bottom <br>");
for ($i = 1; $i <= $max; $i++) {
    for ($k = $i; $k < $max; $k++) {
        echo("_");
    }
    for ($j = 1; $j <= $i; $j++) {
        echo("*");
    }
    for ($j = $max; $j >= $i; $j--) {
        echo("*");
    }
    echo("<br>");
}
echo "</p>";


?>