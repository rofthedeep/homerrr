<?php 

function button($name, $title, $pin, $value, $direction, $btnClass) {
    $html = '';
    $html .= '<a class="btn ' . $btnClass . '" ';
    $html .= 'href="' . $_SERVER['PHP_SELF'] . '?pin=' . $pin . '&value='. $value . '&direction=' . $direction . '"';
    $html .= ' title="' . $title . '"';
    $html .= '>';
    $html .= $name;
    if ($btnClass == 'on') {
        $html .= ' <i class="fa fa-circle"></i>';
    } else {
        $html .= ' <i class="fa fa-circle-o"></i>';
    }
    $html .= '</a>';
    return $html;
}

function dimmer($name, $title, $pin, $value, $direction, $btnClass) {
    $rand = rand(0,10000); 
    $action =  $_SERVER['PHP_SELF'];
    $html = '';
    $html .= '<div class="dimmer">';
    $html .= '<form action="' . $action .'">';
    $html .= '<div class="input-group">';
    //$html .= '<label for="' . $name . '">' . $name .'</label>';   
    $html .= '<input type="text" class="form-control hidden" id="' . $pin . $rand . '" name="pin" placeholder="Pin" value="' . $pin .'">';   
    $html .= '<input type="text" class="form-control" id="' . $name . $rand . '" name="value" placeholder="Wert" value="' . $value .'">';
    $html .= '<input type="text" class="form-control hidden" id="' . $direction . $rand . '" name="direction" placeholder="Pin" value="' . $direction .'">';
    $html .= '<span class="input-group-btn">';
    $html .= '<button class="btn ' . $btnClass . '" type="submit">';
    //$html .= 'href="' . $_SERVER['PHP_SELF'] . '?pin=' . $pin . '?value='. $value . '?direction=' . $direction . '"';
    //$html .= ' title="' . $title . '"';
    //$html .= '>';
    $html .= $name . ' <span class="loaderIcon"></span>';
    $html .= '</button>';
    $html .= '</span>';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    return $html;
}