<?php

require_once 'import.php';

$articleManager = new ArticleManager();
$articles = $articleManager->getArticles();
/** @var @ $premierArticle Article */

//mise a jour d'un article

$premierArticle = $articles[0];
$premierArticle->setTitle('Mon nouveaux titre');
$premierArticle->setContent('Mon nouveaux contenue');
$articleManager->update($premierArticle);


//ajout d'un nouvel article

$monArticle =new Article();
$monArticle->setTitle('hello new article');
$monArticle->setContent('mon nouveaux contenue');
$articleManager->insert($monArticle);

