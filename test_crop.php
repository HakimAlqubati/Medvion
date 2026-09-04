<?php
$im = imagecreatefrompng('c:/laragon/www/medvion/public/favicon.png');
$w = imagesx($im);
$h = imagesy($im);

$minX = $w; $maxX = 0;
$minY = $h; $maxY = 0;

for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgb = imagecolorat($im, $x, $y);
        $alpha = ($rgb >> 24) & 0x7F;
        // In GD, alpha is 0 (opaque) to 127 (transparent)
        // If alpha < 127, it's not completely transparent
        if ($alpha < 127) {
            if ($x < $minX) $minX = $x;
            if ($x > $maxX) $maxX = $x;
            if ($y < $minY) $minY = $y;
            if ($y > $maxY) $maxY = $y;
        }
    }
}

echo "Exact Bounding Box (alpha < 127):\n";
echo "minX: $minX, maxX: $maxX, minY: $minY, maxY: $maxY\n";
$boxW = $maxX - $minX + 1;
$boxH = $maxY - $minY + 1;
echo "Content Width: $boxW, Content Height: $boxH\n";

// Also check if there are nearly invisible pixels (alpha >= 125) vs visible pixels (alpha < 120)
$minX_vis = $w; $maxX_vis = 0;
$minY_vis = $h; $maxY_vis = 0;
for ($y = $minY; $y <= $maxY; $y++) {
    for ($x = $minX; $x <= $maxX; $x++) {
        $rgb = imagecolorat($im, $x, $y);
        $alpha = ($rgb >> 24) & 0x7F;
        if ($alpha < 120) {
            if ($x < $minX_vis) $minX_vis = $x;
            if ($x > $maxX_vis) $maxX_vis = $x;
            if ($y < $minY_vis) $minY_vis = $y;
            if ($y > $maxY_vis) $maxY_vis = $y;
        }
    }
}

echo "Visible Bounding Box (alpha < 120):\n";
echo "minX: $minX_vis, maxX: $maxX_vis, minY: $minY_vis, maxY: $maxY_vis\n";
echo "Visible Width: " . ($maxX_vis - $minX_vis + 1) . ", Visible Height: " . ($maxY_vis - $minY_vis + 1) . "\n";
