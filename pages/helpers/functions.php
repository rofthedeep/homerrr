<?php

include 'local.php';
$brandPaths = array(
    'Vivanda' => 'vivanda',
    'Waschbär' => 'waschbaer',
    'Pranahaus' => 'pranahaus',
);

function placeholdIt($width, $height, $text = '', $class = '') {
    $cols = array(
        'col1' => '80',
        'col2' => '160',
        'col3' => '240',
        'col4' => '320',
    );

    if (!is_numeric($height)) {
        $height = $cols[$height];
    }

    if (!is_numeric($width)) {
        $width = $cols[$width];
    }

    return sprintf('<img src="http://placehold.it/%sx%s%s" %s/>', $width, $height, ($text != '') ? '&text=' . $text : '', ($class != '') ? 'class="' . $class . '"' : ''
    );
}

function getBrand() {
    global $brandName, $brandPaths;

    if (isset($brandPaths[$brandName])) {
        return $brandPaths[$brandName];
    }

    return false;
}

function loadModule($path) {
    $brandPath = str_replace('../snippets/', '', $path);
    if (file_exists($brandPath)) {
        return $brandPath;
    }

    return $path;
}

function parseCategoryNavigation($navigation) {
    $items = array();
    foreach ($navigation as $count => $element) {
        $class = '';
        if (isset($element['class'])) {
            $class = sprintf(' class="%s"', $element['class']);
        }
        $id = uniqid();
        $string = '<li><div class="h3">' . $element['label'] . '</div>';
        $menuStructur = rand(0, 1);
        if (isset($element['elements']) && count($element['elements']) > 0) {
            $collapse = 'collapse';
            if ($count === 0) {
                $collapse = 'collapse in';
            }
            $string .= '<ul class="verticalLinkListSubmenu">';
            $childCount = 0;

            $string .= '<li><a href="category.php">Tops</a></li>';
            $string .= '<li><a href="category.php">Shirts</a></li>';
            $string .= '<li><a href="category.php">Jacken</a></li>';
            $string .= '<li><a href="category.php">Hemnden</a></li>';
            $string .= '<li><a href="category.php">Pullover</a></li>';
            $string .= '<li><a href="category.php">Shorts</a></li>';
            $string .= '<li><a href="category.php">Jacken</a>';
            $string .= '<ul>';
            if ($menuStructur === 1) {
                $string .= '<li><a href="category.php">Funktionsjacken</a>';
                $string .= '<ul>';
                $string .= '<li><a class="active" href="category.php">Wolljacken</a>';
                $string .= '<li><a href="category.php">SoftCell</a>';
                $string .= '<li><a href="category.php">Windbreaker</a>';
                $string .= '<li><a href="category.php">Blouson</a>';
                $string .= '</ul>';
                $string .= '</li>';
            }
            if ($menuStructur === 0) {
                $string .= '<li><a class="active" href="category.php">Funktionsjacken</a></li>';
            }

            $string .= '<li><a href="category.php">Winterjacken</a></li>';
            $string .= '<li><a href="category.php">Sommerjacken</a></li>';
            $string .= '</ul>';
            $string .= '</li>';
            $string .= '<li><a href="category.php">Strümpfe</a></li>';
            $string .= '<li><a href="category.php">Accessoires</a></li>';
            /* foreach ($element['elements'] as $children) {

              $class = '';
              if (isset($children['class'])) {
              $class = sprintf(' class="%s"', $children['class']);
              }
              $string .= '<li' . $class . '><a href="category.php">' . $children['label'] . '</a>';
              $string .= '</li>';
              $childCount ++;
              }
             */

            $string .= '</ul>';
        }

        $items[] = $string . '</li>';
        ;
    }

    return sprintf('<ul class="verticalLinkList">%s</ul>', implode(PHP_EOL, $items));
}

function parseNavigation($navigation) {

    $items = array();
    foreach ($navigation as $element) {
        $class = '';
        if (isset($element['class'])) {
            $class = sprintf(' class="%s"', $element['class']);
        }
        $string = '<li' . $class . '><a href="#">' . $element['label'] . '</a>';

        if (isset($element['elements']) && count($element['elements']) > 0) {
            $string .= '<div><ul class="verticalLinkListSubmenu">';

            foreach ($element['elements'] as $children) {
                $class = '';
                if (isset($children['class'])) {
                    $class = sprintf(' class="%s"', $children['class']);
                }
                $string .= '<li' . $class . '><a href="#">' . $children['label'] . '</a>';

                if (isset($children['elements']) && count($children['elements']) > 0) {
                    $string .= '<ul class="level-3">';

                    foreach ($children['elements'] as $grandChildren) {
                        $class = '';
                        if (isset($grandChildren['class'])) {
                            $class = sprintf(' class="%s"', $grandChildren['class']);
                        }
                        $string .= '<li' . $class . '><a href="#">' . $grandChildren['label'] . '</a></li>';
                    }
                    $string .= '</ul>';
                }
                $string .= '</li>';
            }
            $image = '';
            if (isset($element['image'])) {
                $image = '<img src="' . $element['image'] . '"/>';
            }
            $string .= '</ul>' . $image . '</div>';
        }

        $items[] = $string . '</li>';
        ;
    }

    return sprintf('<ul class="verticalLinkList">%s</ul>', implode(PHP_EOL, $items));
}

function out($string) {
    echo $string . PHP_EOL;
}

function renderStars($rating, $anz = null) {
    $html = '';
    for ($i = 0; $i <= 4; $i++) {
        if ($i < $rating) {
            $html .= '<i class="fa fa-star yellow singleStar"></i>';
        } elseif ($i === $rating) {
            $html .= '<i class="fa fa-star-half-o yellow singleStar"></i>';
        } else {
            $html .= '<i class="fa fa-star grey singleStar"></i>';
        }
    }
    if ($rating == 0) {
        $anz = 0;
    }
    if (null !== $anz) {
        $html .= '(' . $anz . ')';
    }
    return $html;
}

/* function renderPrice($price) {
  $html = '';
  if (count($price) == 1) {
  $html .= '<span class="regularPrice">€' . $price[0] . '</span>';
  } else {
  $html .= '<span class="striketruPrice">€' . $price[0] . '</span>';
  $html .= '<span class="specialPrice">€' . $price[1] . '</span>';
  }

  return $html;
  } */

function renderColors($amount) {
    $colors = array(
        resourcePath('/images/colorBlack.png'),
        resourcePath('/images/colorBlue.png'),
        resourcePath('/images/colorBrown.png'),
        resourcePath('/images/colorGreen.png'),
        resourcePath('/images/colorOrange.png'),
        resourcePath('/images/colorPink.png'),
        resourcePath('/images/colorPurple.png'),
        resourcePath('/images/colorRed.png'),
        resourcePath('/images/colorTourquoise.png'),
        resourcePath('/images/colorWhite.png'),
        resourcePath('/images/colorYellow.png'),
    );

    $html = '';
    $resourcePathArrow = resourcePath('/images/nav_top_arrow.png');
    for ($i = 0; $i <= $amount; $i++) {
        $html .= '<li><div class="hasDropdown">'
                . '<a href="#"><img src ="' . $colors[$i] . '"/></a>'
                . '<div class="dropdown-flyout"><div class="inner">'
                . '<div class="navArrow"><img src="' . $resourcePathArrow . '" alt="Arrow" title="Arrow"/></div>'
                . '<div class="dropdown-content"><strong>Verfügbare Größen:</strong> <br/>Xs S M L XL XXL</div></div></div></div></li>';
    }

    return $html;
}

function renderSizes($array, $active = 1) {
    $html = '<ul class="sizes">';
    foreach ($array as $size) {
        $html .= '<li>' . $size . '</li>';
    }

    $html .= '</ul>';
    return $html;
}

function renderProductImages($imgPath, $wrapLi = true) {
    $images = array(
        '../resources/images/produktbild1.jpg' => array(
            '../resources/images/produktbild1_1.jpg',
            '../resources/images/produktbild1_2.jpg',
            '../resources/images/produktbild1_3.jpg',
        ),
        '../resources/images/produktbild2.jpg' => array(
            '../resources/images/produktbild2_1.jpg',
            '../resources/images/produktbild2_2.jpg',
        ),
        '../resources/images/produktbild3.jpg' => array(
            '../resources/images/produktbild3_1.jpg',
            '../resources/images/produktbild3_2.jpg',
        ),
        '../resources/images/produktbild4.jpg' => array(
            '../resources/images/produktbild4_1.jpg',
            '../resources/images/produktbild4_2.jpg',
        ),
        '../resources/images/produktbild5.jpg' => array(
            '../resources/images/produktbild5_1.jpg',
            '../resources/images/produktbild5_2.jpg',
        ),
        '../resources/images/produktbild6.jpg' => array(
            '../resources/images/produktbild6_1.jpg',
            '../resources/images/produktbild6_2.jpg',
        ),
        '../resources/images/produktbild7.jpg' => array(
            '../resources/images/produktbild7_1.jpg',
        //'../resources/images/produktbild7_2.jpg',
        ),
        '../resources/images/produktbild8.jpg' => array(
            '../resources/images/produktbild8_1.jpg',
            '../resources/images/produktbild8_2.jpg',
        ),
    );

    $html = '';
    if ($wrapLi === true) {
        $html .= '<li><img class="active" src="' . $imgPath . '" data-img-position="0"/></li>';
    } else {
        $html .= '<img class="active" src="' . $imgPath . '" data-img-position="0"/>';
    }

    foreach ($images[$imgPath] as $count => $img) {
        $position = $count + 1;
        if ($wrapLi === true) {
            $html .= '<li><img class="" src="' . $img . '" data-img-position="' . $position . '"/></li>';
        } else {
            $html .= '<img class="" src="' . $img . '" data-img-position="' . $position . '" />';
        }
    }

    return $html;
}

function renderPrice($prices) {
    $basePrice = _renderPrice($prices['articleBaseprice']);
    $newPrice = null;
    $classes = '';
    $reducedHtml = '';
    if (isset($prices['articleNewprice']) && !empty($prices['articleNewprice'])) {
        $newPrice = _renderPrice($prices['articleNewprice']);
        $reduced = round((1 - $prices['articleNewprice'] / $prices['articleBaseprice']) * 100);
        $classes = 'canceled';
        $reducedHtml = '<span class="reduced">Sie sparen ' . $reduced . '%</span>';
    }
    $basePriceHtml = '<span class="basePrice ' . $classes . '">' . $basePrice . '</span>';
    $newPriceHtml = '';
    if ($newPrice !== null) {
        $newPriceHtml = '<span class="newPrice">' . $newPrice . '</span>';
    }
    $tiers = array();
    $tierHtml = array();
    foreach ($prices['articleGraduatedPrices'] as $qty => $value) {
        $tiers[$qty] = _renderPrice($value);
        $tierHtml[] = '<span class="graduatedPrice">ab ' . $qty . ' Stück je ' . $tiers[$qty] . '</span>';
    }
    $priceHtml = array(
        'basePrice' => $basePriceHtml,
        'newPrice' => $newPriceHtml,
        'reduced' => $reducedHtml,
        'tierPrices' => $tierHtml,
    );
    return $priceHtml;
}

function _renderPrice($price) {
    return '€ ' . str_replace('.', ',', $price);
}

// put this somewhere in your main file, outside the
// current function that contains $page
function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    return false;
}
