<?php

if ($_POST)
{
    mostra();
}

function mostra()
{
    if ($_POST['dentro'])
    {

        return "dentro";

    }
    if ($_POST['fora'])
    {

        return "fora";
    }
    return "nada";
}