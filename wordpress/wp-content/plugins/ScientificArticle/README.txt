/*

                        Plugin Wordpress
                Publication d'article scientifique


            Documentation article scientifique v 1.0.0

*/
/*
        1-Installation              l.20-23
        2-Désinstallation           l.24-31
        3-Ajout d'un auteur         l.38-46
        4-Affichage d'un article    l.47-56
        5-Paramètrer affichage      l.57
*/



Installation:

L'installation du plugin 

Désinstallation:

La désinstallation d'un plugin se fait dans le menu des plugins installés, il faut désinstaller le plugin pour ensuite le suppprimer.
Aucune autre méthode n'est à appliquer, toutes les données receuillis par le plugin seront perdu (données relatives à un article scientifique).
Les médias enregistrés à partir d'un article scientifique seront conservés (images,PDF,...).



Création d'un article scientifique:

La création d'un article consiste à remplir les champs les uns après les autres.Aucun champ n'est obligatoire bien qu'il soit conseillé de tous les remplir.
Si aucun auteur scientifique n'est présent lors de la création d'un article cela signifie qu'il n'y a pas d'utilisateur ayant pour rôle "auteur scientifique,il faut alors le créer.


Ajout d'un auteur:

Lors de la création d'un article, il y a la possibilité d'associer des auteurs à l'article.
Ces auteurs peuvent être créés à partir de l'onglet utilisateur, lors de la création il est important de spécifié que l'utilisateur à pour role "auteur scientifique".
Par défaut les droits d'un auteur scientifique se réduisent à pouvoir consulter et poster un nouvel article scientifique, il peut également modifier et supprimer ses propres articles scientifiques mais pas ceux qui lui sont associées mais qu'il n'a pas rédigé.
Pour gérer les droits d'un auteur scientifique, l'installation d'un plugin de gestion de droits utilisateur est recommandé ( tel que le plugin "Members" disponible dans le repertoire des plugins Wordpress)

Une fois l'auteur scientifique créé, il est possible de l'affilié à l'article à publié à l'aide du champ prévu à cet effet.

Affichage de tous les articles scientifiques:

Création d'un menu listant tous les articles scientifiques:
1)Dans le menu de gestion, cliquer sur "Apparence"-> "Personnaliser"
2)Dans le menu de gauche, cliquer sur "Menu" puis sur le bouton "Ajouter un menu"
3)Donner lui un nom ("Articles scientifiques" par exemple) puis cliquez sur "Créer menu"
4)Cliquer sur le bouton "Ajouter des éléments"-> "Article scientifique"
5)Dans le menu déroulant, cliquer sur "Articles scientifiques" (Archive du type)
6)Cocher la case "Primary Menu" puis cliquez sur "Enregister et valider"

Installation du thème par défaut:

Pour pouvoir utiliser l'affichage par défaut d'un article scientifique dans votre propre thème quelques manipulations doivent être effectuées.

1ère méthode:
1) Aller dans le fichier du plugin dans le dossier "dépendance_thème"
2) Copier les fichiers "archive-sa_article.php" et "single-sa_article.php"
3) Coller ces fichiers dans la racine du thème de votre choix
4) Désactiver le thème si besoin
5) Activer/réactiver le thème

2ème méthode:
1) Aller dans le menu d'administration puis dans réglage->permaliens
2) Modifier le type de permaliens pour le mettre à jour.
3) Pour conserver le même type de permalien,il faut enregistrer puis réitérez l'opération.
