<?php
/**
 * Utility functions
 */

function e($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

function url($path = '') {
    $path = '/' . ltrim($path, '/');
    return $path;
}
