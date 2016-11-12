<?php
spl_autoload_register('my_autoload',true,true);

function my_autoload($autoload){
    echo $autoload;
};

?>