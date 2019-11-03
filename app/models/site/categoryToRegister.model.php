<?php


/**
 * function categoriesToNewUser
 * @param int $idUser
 */
function categoriesToNewUser ($idUser) {
    $dataSave = [];
    $baseCategories = baseCategories();
    // $idUser = 1;
    $countBase = count($baseCategories);
    // var_dump(baseCategories());
    foreach ($baseCategories as $key => $value) {
        // $dataSave[$key] = $value;
        //$i = $key ; 
        $firstCategories = $value;
        $firstCategories['created_by'] = $idUser;

        $result = createCategory($firstCategories);

    }

    //  return true;

}

/**
 * function baseCategories
 * @return array
 */
function baseCategories() {

    return [
        [
            "category" => "Salario",
            "applicable" => "IN"
        ], [
            "category" => "Alimentacao",
            "applicable" => "OUT"
        ], [
            "category" => "Beleza",
            "applicable" => "OUT"
        ], [
            "category" => "Educacao",
            "applicable" => "OUT"
        ], [
            "category" => "Lazer",
            "applicable" => "OUT"
        ], [
            "category" => "Saude",
            "applicable" => "OUT"
        ], [
            "category" => "Transporte",
            "applicable" => "OUT"
        ]
    ];

}

/**
 * function createCategory
 * @param array $data
 * @return int|boolean
 */
function createCategory ($data) 
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $insert = "INSERT INTO categories(category, applicable, created_by, created_at)";
    $insert .= "VALUES('$category', '$applicable', $created_by, now() )";

    if (mysqli_query($connection, $insert)) {
        $idCategory = mysqli_insert_id($connection);
    }

    return $idCategory;
}

// POSSIVEL IDÉIA
/**
 * function selectCategory
 * @param array|null $data
 * @return array
 */
// function selectCategory ($category) 
// {
//     $connection = $GLOBALS['connection'];
//     $return = [];

//     // extract($data);

//     // $where = isset($category) ? "AND category = '$category'" : '';
    
//     $select = "SELECT * FROM categories WHERE deleted_at is null AND category = '$category'";

//     $result = mysqli_query($connection, $select);
//     while ($category = mysqli_fetch_assoc($result)) {
        
//         $return[] = $category;

//     }
//     return $return;
// }