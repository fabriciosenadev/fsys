<?php

function houseToUser ($idUser)
{
    $data = [];
    //TODO: verify if exists user's house associate before createHouse
    //TODO: verify if exists any house without use
    $idHouse = createHouse($idUser);

    $data['id_house'] = $idHouse; 
    $data['id_user'] = $idUser;
    //TODO: pass to save the association beetwen user and house

    
}


/**
 * function createHouse
 * @param int $idUser
 */
function createHouse ($idUser)
{
    $connection = $GLOBALS['connection'];

    $house = "house".$idUser;
    $insert = "INSERT INTO houses(house) VALUE($house)";
    
    if (mysqli_query($connection, $insert) )
    {
        $idHouse = mysqli_insert_id($connection);
    }
    return $idHouse;
}