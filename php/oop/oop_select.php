<?php

class select
{
    function selectTable($tableName, $fields, $condition)
    {
        return "SELECT $fields FROM $tableName $condition";
    }
}

$select = new select();
