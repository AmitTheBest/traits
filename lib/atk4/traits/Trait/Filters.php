<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 20.01.15
 * Time: 14:41
 */
trait Trait_Filters {


    public function filterURL($string, $with) {

        $big  = "((https?|ftp)\:\/\/)?"; // SCHEME
        $big .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
        $big .= "([a-z0-9-.]*)\.([a-z]{2,4})"; // Host or IP
        $big .= "(\:[0-9]{2,5})?"; // Port
        $big .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
        $big .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
        $big .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor


        $small  = "((https?|ftp)\:\/\/)?"; // SCHEME
        $small .= "([a-z0-9-.]*)\.([a-z]{2,4})"; // Host or IP

        $other     = "[a-zA-Z]*[:\/\/]*[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_]+";


        $best  = "(ftp|https?):\/\/(\w+:?\w*@)?(\S+)(:[0-9]+)?(\/([\w#!:.?+=&%@!\/-])?)?";

        $filters = [
            "/$big/i", "/$small/i", "/$other/i",
            "/$best/i",
        ];

        $string = preg_replace($filters, $with, $string);

        return $string;
    }

}