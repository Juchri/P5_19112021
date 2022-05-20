<?php

require('global.php');
require('head_nav.php');

function listPosts()
{
    $posts = getPosts();

    require('./view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('./view/postView.php');
}

function addComment($postId, $user, $content)
{
    $affectedLines = postComment($postId, $user, $content);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}