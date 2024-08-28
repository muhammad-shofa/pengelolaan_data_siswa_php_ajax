<?php

class insert
{
    function selectTable($tableName, $condition)
    {
        return "INSERT INTO $tableName $condition";
    }
}

$insert = new insert();