<?php
use CodeIgniter\I18n\Time;

function asset(string $path): string
{
    $full = FCPATH . ltrim($path, '/');
    $v = is_file($full) ? filemtime($full) : time();
    return base_url($path) . '?v=' . $v;
}
