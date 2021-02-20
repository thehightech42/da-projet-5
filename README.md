Projet OpenClassrooms 

Création d'un blog avec compte utilisateur. 

1. Install composer Package
2. Install in a base in projet à config.php with this information : 
    ###
    <?php
    $ipAccepted = ['XXX.XXX.XXX.XXX']; IPV4 or IPV6

    $domaineBDD="";
    $BDDName="";
    $username="";
    $password="";
    ###

3. Create database with this information : 
    Table 1 -> user : id[int; not null], first_name [varchar; null], last_name [varchar; null], pseudo [varchar; not null], mail [varchar; not null], pass_hash [varchar; not null],   id_user_type [int; null], account_creation_date [datetime; not null]

    Table 2 -> post : id [int; not null], title [varchar; not null], short_description [varchar; null], id_user [int; not null], content [text; null], publication_date [datetime; null], last_update [datetime; null], post_status [int; null]

    Table 3 -> comment : id [int; not null], post_id [int; not null], id_user [int; not null], pseudo [varchar; null], email [varchar; null], comment_status [int; not null], comment [text; not null], publication_date [datetime; not null]

    Table 4 -> user_type : id [int; not null], name [varchar; not null]

4. Configure de web domaine for the enter point is the folder public

5. Add .htaccess in public file

6. You can add bdd.sql for database test. (pseudo admin : test) ; (mot de passe : test)