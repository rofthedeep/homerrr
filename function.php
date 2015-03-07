<?php 

function button($name, $title, $pin, $value, $direction, $btnClass) {
    $html = '';
    $html .= '<a class="btn ' . $btnClass . '" ';
    $html .= 'href="' . $_SERVER['PHP_SELF'] . '?pin=' . $pin . '?value='. $value . '?direction=' . $direction . '"';
    $html .= ' title="' . $title . '"';
    $html .= '>';
    $html .= $name;
    $html .= '</a>';
    return $html;
}