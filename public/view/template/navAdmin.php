<?php
ob_start();
?>

<ul class="navAdmin">
    <ol><a class="admin" href="/admin/dashboard">Dashboard</a></ol>
    <ol><a class="admin" href="/admin/posts">Articles</a></ol>
    <ol><a class="admin" href="/createPost">Ecrire un article</a></ol>
    <ol><a class="admin" href="/admin/commentModeration">Modération des commentaires</a></ol>
</ul>

<?php

$navAdmin = ob_get_clean();