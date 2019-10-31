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
$delCategory = intval($delCategory);
$errors = [];
$styleApplicable = $styleCategory = '';

$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if ($btnDelCategory && $delCategory) {
    
    $result = deleteCategory($delCategory);

    if ($result) {
        $_SESSION['success'] = "Categoria removida.";
        header("Location: category.php");
        
    }
}

if($btnSave) {

    if (empty($category)){
        $errors['category'] = "Preencha a categoria.";
        $styleCategory = "is-invalid";
    } 
    
    if(empty($applicable)) {
        $errors['applicable'] = "Selecione a aplicabilidade.";
        $styleApplicable = "is-invalid";
    }

    if(count($errors) > 0 && !empty($category)) {
        $styleCategory = "is-valid";
    }
    if(count($errors) > 0 && !empty($applicable)) {
        $styleCategory = "is-valid";
    }
    
    if (!$errors) {
        
        $category = filter_var($category, FILTER_SANITIZE_STRING);
        
        $dataSave['category'] = $category;
        $dataSave['applicable'] = $applicable;
        $dataSave['created_by'] = intval($_SESSION['id_user']);
        
        $result = saveCategory($dataSave);

        if (isset($result[0]['category'])) {
            $errors['category'] = "Categoria já existe.";
            $styleCategory = "is-invalid";
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