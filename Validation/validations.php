<?php

function valida_dados_vazios($data)
{
    foreach($data as $attr)
    {
        if(empty($attr))
            return false;
    }
    return true;
}