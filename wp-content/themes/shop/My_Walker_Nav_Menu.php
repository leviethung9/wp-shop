<?php
    class My_Walker_Nav_Menu extends Walker_Nav_Menu {
        function start_lvl( &$output, $depth = 0, $args = array() ) {
           $indent = str_repeat( "\t", $depth );
           $submenu_class = ( $depth >= 0 ) ? 'custom-submenu-mb' : 'sub-menu';
           $output .= "\n$indent<ul class='$submenu_class'>\n";
        }
     }
     
?>