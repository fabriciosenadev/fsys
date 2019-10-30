<?php

require_once '../../resources/template/app/header.php';
require_once "../models/app/options/category.model.php";


session_start();
if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../../login.php");
}


//dados para novas/alterar categorias
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$applicable = isset($_REQUEST['applicable']) ? $_REQUEST['applicable'] : null;
$btnSave = isset($_REQUEST['btnSave']) ? $_REQUEST : null;

//dados para deletar categoria
$delCategory = isset($_REQUEST['delCategory']) ? $_REQUEST['delCategory'] : null;
$btnDelCategory = isset($_REQUEST['btnDelCategory']) ? $_REQUEST : null;

$errors = [];
$styleDate = $styleCategory = $styleValue = '';


if ($btnDelCategory && $delCategory) {
    var_dump($btnDelCategory);
}

if($btnSave) {

    if (empty($category)){
        $errors['category'] = "Preencha a categoria.";
    } 
    
    if(empty($applicable)) {
        $errors['applicable'] = "Selecione a aplicabilidade.";
    }
    
    if (!$errors) {
        
        $category = filter_var($category, FILTER_SANITIZE_STRING);
        
        $dataSave['category'] = $category;
        $dataSave['applicable'] = $applicable;
        $dataSave['created_by'] = intval($_SESSION['id_user']);
        
        $result = saveCategory($dataSave);
        // var_dump($result);
        
        if ($result['category']) {
            $errors['category'] = "Categoria já existe.";
        }

        if (is_int($result)) {
            $_SESSION['success'] = "Categoria registrada.";
            header("Location: category.php");
        }

    }
}

$categories = selectCategory(null);
include '../../resources/views/app/options/category.view.php'; 


require_once '../../resources/template/app/footer.php';