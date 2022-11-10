<?php
$localization = \App\Models\Localization::get();
$array = [];
foreach ($localization as $item){
    $array[$item->origin] = $item->en;
}
return $array;
