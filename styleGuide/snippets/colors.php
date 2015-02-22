<?php
function colorBox($class, $grid, $name) {
    $color = '';
    $color .= '<div class="col-xs-12 col-sm-' . $grid . '">';
    $color .= '<div class="' . $class . ' colorBox">';
    $color .= $name;
    $color .= '</div>';
    $color .= '</div>';
    return $color;
}
?>



<h3 class="chapterHeadline">Colors</h3>
<div class="row">
    
    
    <?php
    echo colorBox('backgroundColor1', '3', 'Color 1');    
    echo colorBox('backgroundColor2', '3', 'Color 2');
    echo colorBox('backgroundColor3', '3', 'Color 3');  
    echo colorBox('backgroundColor4', '3', 'Color 4');  
    //echo colorBox('backgroundColor5', '3', 'Color 5');  
    //echo colorBox('backgroundColor6', '3', 'Color 6');  
    //echo colorBox('backgroundColor7', '3', 'Color 7');
    //echo colorBox('backgroundColor8', '3', 'Color 8');  
    //echo colorBox('backgroundColor9', '3', 'Color 9');  
    //echo colorBox('backgroundColor10', '3', 'Color 10');
    //echo colorBox('backgroundColor11', '3', 'Color 11');  
    ?>
</div>