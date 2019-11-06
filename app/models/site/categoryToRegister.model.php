<?php


/**
 * function categoriesToNewUser
 * @param int $idUser
 */
function categoriesToNewUser ($idUser) {

    $baseCategories = baseCategories();

    foreach ($baseCategories as $key => $value) {

        $firstCategories = $value;
        $firstCategories['created_by'] = $idUser;

        $returnSelect = selectExistsCategory($firstCategories['category']);

        if (!$returnSelect['id']) {

            $result = createCategory($firstCategories);
            $dataSave['id_category'] = $result;

        } else {

            $dataSave['id_category'] = $returnSelect[0]['id'];
            $dataSave['id_category'] = intval($dataSave['id_category']);

        }

        $dataSave['id_user'] = $idUser;
        $dataSave['created_by'] = $firstCategories['created_by'];

        $returnRelation = createRelationUserCategory($dataSave);
 
    }

}

/**
 * function baseCategories
 * @return array
 */
function baseCategories() {

    return [
        [
            "category" => "Salário",
            "applicable" => "IN"
        ], [
            "category" => "Alimentação",
            "applicable" => "OUT"
        ], [
            "category" => "Beleza",
            "applicable" => "OUT"
        ], [
            "category" => "Educação",
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

/**
 * function createRelationUserCategory
 * @param array $data
 * @return int|boolean
 */
function createRelationUserCategory ($data) 
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $insert = "INSERT INTO category_users(id_user, id_category, created_by, created_at)";
    $insert .= "VALUES($id_user, $id_category, $created_by, now() )";
    
    if (mysqli_query($connection, $insert)) {
        $idRelation = mysqli_insert_id($connection);
    }

    return $idRelation;
}

/**
 * function selectCategory
 * @param array|null $data
 * @return array
 */
function selectExistsCategory ($category) 
{
    $connection = $GLOBALS['connection'];
    $return = [];

    // extract($data);

    // $where = isset($category) ? "AND category = '$category'" : '';
    
    $select = "SELECT * FROM categories WHERE deleted_at is null AND category = '$category'";

    $result = mysqli_query($connection, $select);
    while ($category = mysqli_fetch_assoc($result)) {
        
        $return[] = $category;

    }
    return $return;
}

