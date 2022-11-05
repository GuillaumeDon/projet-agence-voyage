<?php
include_once '../../app/config.php';
include_once '../../src/Core/Database.php';
include_once '../../src/Core/AbstractModel.php';
include_once '../../src/Model/RequestModel.php';
include_once '../../src/Model/StatusModel.php';




// Initialisations des variables
$errors = [];
$firstname = '';
$lastname = '';
$email = '';
$phone ='';
$subject='';
$content='';



// Si le formulaire est soumis :
if (!empty($_POST)) {

    // On récupère les données du formulaire
    $firstname = strip_tags(trim($_POST['firstname']));
    $lastname = strip_tags(trim($_POST['lastname']));
    $email = strip_tags(trim($_POST['email']));
    $phone = strip_tags(trim($_POST['phone']));
    $subject = strip_tags(trim($_POST['subject']));
    $content = strip_tags(trim($_POST['content']));


    // On valide les données (titre et contenu obligatoires)
    if (!$firstname) {
        $errors['firstname'] = 'Vous devez rentrer votre prénom!';
    }

    if (!$lastname) {
        $errors['lastname'] = 'Vous devez rentrer votre nom!';
    }

    if (!$email) {
        $errors['email'] = 'Vous devez entrer un email!';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invalide';
    }

    if (!$subject) {
        $errors['subject'] = 'Vous devez choisir l\'objet de votre demande';
    }

    if (!$content) {
        $errors['content'] = 'Vous devez préciser votre demande dans un message d\'au moins 100 caractères';
    }
    // Si tout est OK (pas d'erreurs)...
    if (empty($errors)) {
        $sucess="Votre requête à bien été prise en compte";
        $requestModel = new RequestModel();
        $requestModel->addRequest($firstname, $lastname, $email, $phone, $subject, $content);

    }
}


$title = "Contactez notre service client";
$template = 'form';
include '../../templates/base.phtml';