<?php
foreach (glob('../routes/AppRoutes/*.php') as $filePath){
    $items = explode('/', $filePath);
    include_once end($items) ;
}
