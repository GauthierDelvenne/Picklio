# Cahiers des charges

## Présentation du projet click&collect

Picklio est une application web, qui a pour but de rassembler tous les produits locaux en un seul point. De centraliser la distribution, pour simplifier les achats et la découverte de produits.

Il a aussi vocation à simplifier les déplacements des clients. Je prends mon cas comme exemple : « *J’habite Anthisne, j’ai besoin de fruit légumes donc je vais à Hody les chercher, mais il me faut de d’autre produit, je vais a Hamoir et je n’ai pas trouvé ce qu’il me fallait a Hamoir alors je vais a Nandrin. Finalement j’ai passé une grosse partie de ma journée à chercher des produits autour de chez moi.* »  
Mais si j’avais eu un entrepôt et que je pouvais dresser ma liste directement en ligne j’aurais gagné énormément de temps et d’argent car avec le prix de l’essence faire autant de petit déplacement reviens vite chers.

Le site met en place un site de vente, ou des utilisateurs pourront venir faire leurs achats, découvrir des produits, commander et récupérer leurs commandes à l'entrepôt. 

Mais aussi permettre à des commerçants de s’inscrire sur le site afin d’y proposé leurs produits à la suite d’une rencontre avec un dirigeant.
Le site propose aux commerçants un espace administrateur. Où ils peuvent ajouter leurs produits, les modifier, ainsi qu’ajouter des promotions sur certain article. Cette espace permet aussi aux commerçants de pouvoir analyser leurs ventes.

Enfin, il y a un espace administrateur pour l’entrepôt, qui permet aux personnelles de gérer le stock, les commandes et les commerçants.

J’ai donc réalisé une application, qui a pour but d’être simple d’utilisation et compréhensible pour les commerçants, que l’utilisation de l’entrepôt ne soit qu’un plus dans leurs activités. Ils doivent seulement vérifier leurs stocks, et réapprovisionner de temps en temps l’entrepôt, mais un admin leur enverrons un mail/message quand ce sera nécessaire. Le site permet aussi d’avoir une mise en avant de leur commerce.

Pour les clients, une liste de produits avec des filtres pour trouver directement les produits qu’il leur faut et ne pas passer des heures à chercher quelque chose. En essayant d’être le plus accessible possible, en gardant une compréhension des informations simples et efficaces.


---

## Public cible 
Picklio s'adresse à deux types d'utilisateurs. Chacun a ses propres objectifs, ses propres attentes vis-à-vis de la plateforme. On en premier les clients et en deuxième les commerçants qui souhaiterais rejoindre Picklio.

On retrouve en premier, les clients (ceux qui viennent faire leurs commandes, leurs achats). Les profils peuvent varier d'une personne habituée à la technologie à une personne qui n'est pas à l'aise avec celle-ci. Mais ils résultent tous d’une envie, celle de gagner du temps, de commander locale et ainsi faire vivre les commerces locaux. Le tout sans multiplier les déplacements. L’action principale d’un client sera de composé son panier d’achat. Mais ce n’est pas la seule action qu’il est susceptible de faire sur le site.
Une liste de taches que le client pourrait accomplir :

-	**Trouver un produit** : le client arrive sur le site avec une idée en tête. Il a besoin d'une liste de produits claire, d'une barre de recherche visible dès l'entrée et de filtres efficaces pour ne pas perdre de temps. La barre de recherche doit être efficace et les filtres doivent être facile à prendre en humain et accessible à tous les profils.
-	**Consulter la fiche d’un produit** : il veut savoir ce qu'il achète, description, prix, commerçant d'origine. La fiche doit lui indiquer toutes les informations nécessaires sur le produit. Il peut aussi partager la fiche produit à un ami. La page doit être clair et surtout structuré, elle doit se lire facilement et rapidement, le client ne doit pas chercher pendant des heures des informations, tout est clair net et précis.
-	**Se connecter/ S’inscrire** : si le client n’est pas encore connecté, il doit se connecter, sinon impossible de commander. S’il n’est pas inscrit, il peut alors remplir le formulaire d’inscription qui le connecte automatiquement par après. Pour les inscriptions il faut expliquer à l’utilisateur pourquoi il est nécessaire de s’inscrire afin d’éviter une frustration et un refus.
-	**Composer son panier** : il peut opter pour des produits provenant de divers commerçants. Le panier doit être commun, toujours accessible et refléter en temps réel ce qu'il a choisi. Le client doit comprendre ce qu’il va acheter, les quantités, le prix, les noms. Le tout dans une page lisibles sans informations superflu.
-	**Choisir un créneau de retrait** :  après avoir composé un panier il doit choisir un créneau. Les créneaux disponibles doivent être présentés clairement, sans ambiguïté sur les horaires ou la disponibilité restante. Il doit être rapide d’utilisation, le client doit pouvoir presque cliquer sur deux boutons pour y arriver.
-	**Valider sa commande** : il doit pouvoir relire son récapitulatif. Tout en sachant qu'il ne paiera qu'en se rendant à l'entrepôt. Le récapitulatif, c’est comme le panier il doit être clair et précis.
-	**Recevoir une confirmation** : un email clair, avec les détails de la commande et du créneau. Important d’avoir une trace écrite pour une commande et aussi un coté rassurant après une commande en ligne.

Le deuxième, les commerçants qui se sépare aussi en deux types, le nouveau et le commerçant déjà inscrit sur la plateforme.

Tout d’abord, le nouveau, il n’y a pas de profil type, en général, ce sont des personnes qui ont un commerce et qui cherche un moyen de s’agrandir et d’augmenter leurs visibilités et leurs ventes. Mais ça peu très bien être par le billet du bouche à oreille ou par des recherches et la découverte du site. Ça pourrait être des patrons qui ont trouvé l’idée intéressante pour leurs business ou bien des employés qui ont proposé à leurs patron et qui se chargeront de cette partie.

Une liste de taches que le nouveau commerçant pourrait accomplir :
-	**Chercher des informations** : il a entendu parler de picklio, et souhaite en savoir plus, en arrivant sur le site trouver, il trouve diverse information et il va chercher celle qui parle des commerçants, qui lui explique pourquoi nous rejoindre, comment l’entreprise fonctionne, ce qu’il y gagne et surtout ce que ça lui coute. Il faut donc une page qui explique toutes les informations des commerçants, qu’elle soit clairement structure, facile à comprendre et qu’elle donne envie de rejoindre picklio.
-	**Il souhaite rejoindre Picklio** : il est convaincu par les informations qu’il a lues ou qu’il a entendu dire et souhaite rejoindre picklio. Il va alors chercher un formulaire pour inscrire sa demander. Le formulaire doit être simple et rapide sans trop en demander, il ne doit pas être un frein à la demande, un formulaire trop long et trop complexe pour freiner certain utilisateur moins à l’aise avec l’informatique. Donc l’essentiel de l’entretien se ferait en présentiel, à indiquer ci-joint au formulaire pour que le commerçant sache directement comment le recrutement se déroule.

Ensuite on retrouve les commerçants déjà installé sur le site, ils ont donc une petite expertise en informatique à la suite de la première étape, de plus lors de l’entretien, il y a une explication de comment la partie admin commerçant du site fonctionne. Ils sont alors plus à même de comprendre le fonctionnement. Mais il restera quand même des utilisateurs moins à l’aise pour ça et qui souhaite une application simple et efficaces.

Une liste de taches que le commerçant pourrait accomplir :
-	**Ajouter un produit** : il veut ajouter un nouveau produit, il doit alors remplir un formulaire. Il n’y a pas d’action superflu autour du formulaire.  Cette tâche doit être rapide et ne demander aucune formation préalable, elle doit pouvoir s’effectuer de n’importe ou et facilement. Le formulaire est simple, il n’y a que l’ajout d’une image qui pourrait être complexe même si celle-ci est optionnelle.
-	**Modifier un produit** : il décide de changer l’image, la description ou autre. En trois clics, il peut modifier avec un formulaire qui a la même apparence que le formulaire de création. Le formulaire récupère les informations déjà inscrite qui permet à l’utilisateur de savoir ce qu’il avait remplis.
-	**Désactiver un produit** : si un produit est en rupture ou doit être retiré temporairement, le commerçant doit pouvoir le faire en deux clics depuis la page stocks. Il gère si le produit est en ligne ou non. C’est un bouton avec une confirmation de sécurité qui explique ce que l’action va faire.
-	**Gérer les promotions** : appliquer une réduction sur un article est un champ dans le formulaire ou le commerçant peux gérer le pourcentage et aussi gérer les dates de début et de fin de promotion. Les labels précisent l’action à faire dans le formulaire.
-	**Suivre ses performances** : consulter son chiffre d'affaires, ses produits les plus vendus, l'évolution de ses ventes. Ces données doivent être lisibles d'un coup d'œil, sans interprétation.
-	**Lire les messages** : le commerçant souhaite lire ses messages d’un client ou d’un admin, il va dans la section a cet effet, et il a par ordre d’arriver les messages, avec une possibilité de supprimer et d’entretenir sa boite a message.

