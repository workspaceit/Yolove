<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

foreach ($settings as $setting):
    
    $socialApi = unserialize($setting['Setting']['set_value']);
    
endforeach;



echo "<pre>";
print_r($socialApi);
die;
?>
