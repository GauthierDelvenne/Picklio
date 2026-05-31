<?php

declare(strict_types=1);

return [
    'commons' => [
        'howItWork' => [
            'title' => 'Comment ça fonctionne ?',
            'button' => 'Commencer maintenant',
            'stepOne' => [
                'title' => 'Première étape',
                'subTitle' => 'Inscrivez-vous',
                'content' => '<strong><a href="'.route('auth.register').'">Inscrivez-vous</a></strong>, afin de pouvoir commander sur Picklio',
            ],
            'stepTwo' => [
                'title' => 'Deuxième étape',
                'subTitle' => 'Faites votre panier',
                'content' => '<strong><a href="'.route('front.catalogue.index').'">Chercher, ajouter </a></strong>vos envies et <strong>planifiez</strong> votre
                panier selon votre emploi du temps',
            ],
            'stepThree' => [
                'title' => 'Troisième étape',
                'subTitle' => 'Retirez vos achats',
                'content' => '<strong>Payez sur place à la
                    borne</strong> et repartez avec vos produits, rapidement et facilement',
            ],
        ],
        'sale-by' => 'Vendu par',
    ],

    'settings' => [
        'theme' => [
            'title' => 'Changez le theme',
            'light' => 'Clair',
            'dark' => 'Sombre',
            'system' => 'Paramètre système',
        ],
        'lang' => 'Changez la langue',
    ],

    'login' => [
        'title' => 'Bon retour parmis nous',
        'forget-password' => 'Mot de passe oublié ?',
        'no-account' => 'Pas encore de compte ?',
        'register' => 'S’inscrire',
    ],
    'register' => [
        'title' => 'Bienvenue,',
        'already-account' => 'Déja un compte ?',
        'login' => 'Se connecter',
    ],
    'forget-password' => [
        'title' => 'Changez de mot de passe',
        'subtitle' => 'Vous allez recevoir un mail pour changez de mot de passe.',
        'return-login' => 'Retourner à l’écran de connexion',
    ],
    'reset-password' => [
        'title' => 'Changez de mot de passe',
        'return-login' => 'Retourner à l’écran de connexion',
    ],
    'header' => [
        'heading' => 'Navigation principale',
    ],
    'footer' => [
        'schedule' => [
            'title' => 'Heure d’ouverture des retrait',
            'open' => 'Mardi → Samedi : de :open à :close',
            'close' => 'Dimanche → Lundi : Fermé',
        ],
        'contact' => [
            'title' => 'Adresse de l’entrepôt',
        ],
        'legal-notice' => 'Mentions légales',
        'privacy-policy' => 'Politique de confidentialité',
    ],
    'legal-notice' => [
        'about' => [
            'title' => 'Présentation du site',
            'content' => '<strong>Nom du site</strong> : Picklio <br>
            <strong>Nature du projet</strong> : Projet de fin d’étude réalisé dans le cadre du bachelier en Techniques
            Infographiques – option Web à la <strong>Haute École de la Province de Liège</strong> (HEPL). <br>
            <strong>Année académique</strong> : 2024–2025',
            'subContent' => 'Ce site est un prototype développé à des fins académiques et ne constitue pas une plateforme commerciale en
            activité.',
        ],
        'project-manager' => [
            'title' => 'Responsable du projet',
            'content' => '<strong>Nom</strong> : Gauthier Delvenne <br>
            <strong>Email</strong> : gauthier.delvenne@student.hepl.be <br>
            <strong>Établissement</strong> : HEPL – Haute École de la Province de Liège <br>
            <strong>Adresse</strong> : Rue Peetermans 80, 4100 Seraing',
        ],
        'accommodation' => [
            'title' => 'Hébergement',
            'content' => '<strong>Hébergeur</strong> : à déterminer <br>
            <strong>Site web </strong> : à déterminer',
        ],
        'intellectual-property' => [
            'title' => 'Propriété intellectuelle',
            'content' => 'L’ensemble du contenu de ce site (design, textes, code, logo, maquettes) est réalisé par Gauthier Delvenne
            dans le cadre d’un projet académique.',
            'subContent' => 'Toute reproduction ou utilisation à des fins commerciales est interdite sans autorisation préalable.',
        ],
        'personal-information' => [
            'title' => 'Données personnelles',
            'content' => 'Ce site étant un prototype académique, aucune donnée personnelle n’est collectée à des fins commerciales.',
            'subContent' => 'Dans le cadre du prototype, des données de test peuvent être saisies. Conformément au RGPD (Règlement
            Général sur la Protection des Données), vous disposez d’un droit d’accès, de rectification et de suppression
            de vos données en contactant : gauthier.delvenne@student.hepl.be.',
        ],
        'cookie' => [
            'title' => 'Cookie',
            'content' => 'Ce site peut utiliser des cookies techniques nécessaires à son fonctionnement (session utilisateur, panier).
            Aucun cookie publicitaire ou de tracking n’est utilisé.',
        ],
        'liability' => [
            'title' => 'Responsabilité',
            'content' => 'Ce projet est réalisé dans un cadre académique. Les informations présentées (produits, commerçants, prix)
            sont fictives ou à titre d’exemple. L’auteur ne saurait être tenu responsable d’une utilisation commerciale
            de ce prototype.',
        ],
    ],
    'privacy-policy' => [
        'intro' => [
            'title' => 'Introduction',
            'content' => 'La présente politique de confidentialité décrit la manière dont Picklio, projet de fin d’étude réalisé dans le cadre du bachelier en Techniques Infographiques – option Web à la <strong>Haute École de la Province de Liège</strong> (HEPL), traite les données personnelles des utilisateurs de ce prototype.',
            'subContent' => 'Ce site étant un prototype académique, il n’a pas de vocation commerciale. Les données collectées le sont uniquement dans le cadre de la démonstration du fonctionnement de l’application.',
        ],
        'data-controller' => [
            'title' => 'Responsable du traitement',
            'content' => '<strong>Nom</strong> : Gauthier Delvenne <br>
                <strong>Email</strong> : gauthier.delvenne@student.hepl.be <br>
            <strong>Établissement</strong> : HEPL – Haute École de la Province de Liège',
        ],
        'data-collected' => [
            'title' => 'Données collectées',
            'content' => 'Dans le cadre du prototype, les données suivantes peuvent être collectées lors de l’utilisation du site :',
            'lists' => [
                'clients' => [
                    'title' => 'Pour les clients :',
                    'items' => [
                        'Nom, prénom',
                        'Adresse email',
                        'Mot de passe (chiffré)',
                        'Historique de commandes',
                    ],
                ],
                'merchants' => [
                    'title' => 'Pour les commerçants :',
                    'items' => [
                        'Nom, prénom',
                        'Nom du commerce',
                        'Adresse email',
                        'Numéro de téléphone',
                        'Informations relatives aux produits ajoutés',
                    ],
                ],
            ],
            'subContent' => 'Ces données sont utilisées uniquement pour faire fonctionner le prototype et ne sont en aucun cas transmises à des tiers ou utilisées à des fins commerciales.',

        ],
        'processing' => [
            'title' => 'Finalité du traitement',
            'items' => [
                'Permettre la création et la gestion d’un compte utilisateur (client ou commerçant)',
                'Simuler le processus de commande et de click&collect',
                'Démontrer les fonctionnalités de la plateforme dans un cadre académique',
            ],
            'content' => 'Les données collectées servent exclusivement à :',
        ],
        'shelf-life' => [
            'title' => 'Durée de conservation',
            'content' => 'Les données enregistrées dans le cadre du prototype sont conservées le temps de la durée du projet académique. À l’issue de celui-ci, les données pourront être supprimées.',
        ],
        'rights' => [
            'title' => 'Vos droits (RGPD)',
            'content' => 'Conformément au <strong>Règlement Général sur la Protection des Données (RGPD)</strong> en vigueur depuis le 25 mai 2018, vous disposez des droits suivants :',
            'items' => [
                '<strong>Droit d’accès</strong> : connaître les données vous concernant',
                '<strong>Droit de rectification</strong> : corriger des données inexactes',
                '<strong>Droit à l’effacement</strong> : demander la suppression de vos données',
                '<strong>Droit d’opposition</strong> : vous opposer au traitement de vos données',
                '<strong>Droit à la portabilité</strong> : recevoir vos données dans un format lisible',
            ],
            'subContent' => 'Pour exercer ces droits, contactez : gauthier.delvenne@student.hepl.be',
        ],
        'security' => [
            'title' => 'Sécurité des données',
            'content' => 'Les mots de passe sont stockés de manière chiffrée. Des mesures techniques raisonnables sont mises en place pour protéger les données contre tout accès non autorisé, dans la limite d’un prototype académique. ',
        ],
        'cookie' => [
            'title' => 'Cookies',
            'content' => 'Ce site utilise uniquement des cookies techniques indispensables à son fonctionnement :',
            'items' => [
                '<strong>Cookie de session</strong> : maintenir la connexion d’un utilisateur',
                '<strong>Cookie de panier</strong> : conserver le contenu du panier entre les pages',
            ],
            'subContent' => 'Aucun cookie publicitaire, de tracking ou analytique tiers n’est utilisé.',
        ],
        'edit' => [
            'title' => 'Modifications de la politique',
            'content' => 'Cette politique peut être mise à jour au cours du développement du projet. La date de dernière mise à jour sera indiquée en bas de cette page.',
            'subContent' => '<strong>Dernière mise à jour : </strong>le 7 mai 2026',
        ],
    ],
    'home' => [
        'intro' => [
            'title' => 'Le meilleur de vos commerces réunis en un seul lieu',
            'content' => 'Avec notre plateforme de click & collect,
                profitez de vos
                commerces
                préférés depuis un seul endroit. Tous les produits de vos commerçants locaux sont centralisés dans notre
                entrepôt, prêts à être retirés rapidement. Commandez en ligne, choisissez votre créneau et venez
                récupérer
                vos achats en toute simplicité.',
            'buttonDiscover' => 'Découvrez les produits de nos commerçants',
            'buttonJoin' => 'Devenir un de nos commerçants',
            'quality' => [
                '1' => 'Pratique',
                '2' => 'Sans stress',
                '3' => 'Rapide',
            ],
        ],
        'alimentaryList' => [
            'title' => 'Découvrez nos produits alimentaires',
            'tabs' => 'Les produits alimentaires',
            'button' => 'Voir plus',
        ],
        'noAlimentaryList' => [
            'title' => 'Découvrez nos produits non alimentaires',
            'tabs' => 'Les produits non alimentaires',
            'button' => 'Voir plus',
        ],
        'productCategories' => [
            'title' => 'Les catégories',
        ],
        'inviteMerchant' => [
            'title' => 'Vous êtes marchands, producteur, vendeur ?',
            'content' => 'Entrez dans notre réseau de commerçants connectés. Faites partie d’une plateforme qui réinvente le shopping local : vos produits sont centralisés dans un entrepôt unique, vos ventes sont suivies en temps réel, et vos clients bénéficient d’un retrait simple et rapide. Rejoignez-nous pour développer votre commerce sans complexité.',
            'button' => 'Nous rejoindre maintenant',
        ],
    ],
    'catalogue' => [
        'productSection' => [
            'title' => 'Les produits',
            'priceFilter' => [
                'title' => 'Trier par prix',
                'ascending' => 'Prix croissant',
                'descending' => 'Prix décroissant',
            ],
            'nameFilter' => [
                'title' => 'Trier par nom',
                'nameAscending' => 'Nom A/Z',
                'nameDescending' => 'Nom Z/A',
            ],
            'merchantFilter' => 'Commerçants',
            'categoryFilter' => 'Catégories',
            'searchFilter' => 'Rechercher',
            'empty' => 'Il n’y a aucun article qui correspond à la recherche',
        ],
        'contactSection' => [
            'title' => 'Vous n’avez pas trouvé ce vous chercher ?',
            'informationContainer' => [
                'title' => 'Une suggestion ?',
                'content' => 'Vous n’avez pas trouvé ce que vous vouliez.<br/> N’hésitez pas à nous envoyer vos suggestions de <strong>produits</strong> ou bien de <strong>commerçant</strong>. ',
            ],
            'form' => [
                'button' => 'Envoyer le formulaire',
                'name' => [
                    'label' => 'Nom - Prénom',
                    'attribute' => 'nom prénom',
                ],
                'email' => [
                    'label' => 'Email',
                    'attribute' => 'email',
                ],
                'merchantSuggest' => [
                    'label' => 'Suggestions de commerces',
                    'attribute' => 'suggestions de commerces',
                ],
                'productSuggest' => [
                    'label' => 'Suggestions de produits',
                    'attribute' => 'suggestions de produits',
                ],
            ],
            'toast' => [
                'create' => [
                    'success' => 'Le message a bien été envoyé',
                    'error' => 'Une erreur est survenu lors de l’envoye',
                ],
            ],
        ],
    ],
    'product' => [
        'button' => 'Ajoutez au panier',
        'discover' => [
            'title' => 'Découvrez une suggestion de produits',
            'button' => 'Voir plus',
        ],
    ],
    'merchant' => [
        'title' => 'Développez votre commerce',
        'img' => 'un commerçant',
        'content' => 'Vous êtes commerçant et souhaitez vendre vos produits en ligne facilement sans complexité technique ?<br/>Notre plateforme de click & collect vous permet de toucher de nouveaux clients tout en simplifiant votre organisation. Grâce à un système centralisé avec retrait en entrepôt, vous n’avez plus à gérer la logistique côté client. Vous vous concentrez sur l’essentiel : vos produits et vos ventes.',
        'button' => 'Nous rejoindre',
        'cardContainer' => [
            'title' => 'Les avantages',
            '1' => [
                'title' => 'Une solution simple et efficace',
                'content' => [
                    'title' => 'Notre objectif est de vous proposer un outil :',
                    'ulItem' => [
                        '1' => 'Facile à utiliser',
                        '2' => 'Rapide à prendre en main',
                        '3' => 'Adapté à tous les niveaux',
                    ],
                    'endText' => 'Où aucune compétence technique n’est requise.',
                ],
            ],
            '2' => [
                'title' => 'Un espace marchand complet',
                'content' => [
                    'title' => 'En rejoignant la plateforme, vous bénéficiez d’un espace administrateur dédié pour gérer votre activité en toute autonomie. <br/>Depuis votre interface, vous pouvez :',
                    'ulItem' => [
                        '1' => 'Ajouter et modifier vos produits en quelques clics',
                        '2' => 'Gérer vos prix, vos stocks et vos promotions',
                        '3' => 'Suivre vos ventes et vos performances',
                        '4' => 'Consulter les commandes contenant vos articles',
                    ],
                    'endText' => 'Tout est conçu pour vous offrir une gestion simple, claire et efficace.',
                ],
            ],
            '3' => [
                'title' => 'Une logistique simplifiée',
                'content' => [
                    'title' => 'Nous centralisons les commandes dans un entrepôt unique.',
                    'ulItem' => [
                        '1' => 'Les clients commandent en ligne',
                        '2' => 'Nous préparons les commandes',
                        '3' => 'Les clients viennent les récupérer sur place',
                    ],
                    'endText' => 'Vous n’avez pas à gérer le retrait client et vous gagnez du temps au quotidien',
                ],
            ],
            '4' => [
                'title' => 'Développez votre visibilité',
                'content' => [
                    'title' => 'Rejoindre la plateforme, c’est aussi :',
                    'ulItem' => [
                        '1' => 'Toucher une nouvelle clientèle',
                        '2' => 'Augmenter vos ventes',
                        '3' => 'Valoriser vos produits',
                    ],
                ],
            ],
        ],
        'contactSection' => [
            'title' => 'Rejoignez-nous dès maintenant',
            'informationContainer' => [
                'title' => 'Contactez-nous',
                'content' => 'Intégrez une plateforme pensée pour les commerçants et développez votre activité simplement. <br/> À la suite de ce formulaire, vous serez recontacter pour un entretien',
                'address' => '4160 Anthisnes, Cour d’Omalius, 1',
                'phone' => '+32 477  45 56 67',
                'email' => 'picklio@gmail.com',
            ],
            'contactContainer' => [
                'toast' => [
                    'create' => [
                        'success' => 'Le message a bien été envoyé',
                        'error' => 'Une erreur est survenu lors de l’envoye',
                    ],
                ],
                'form' => [
                    'button' => 'Envoyez le formulaire',
                    'firstname' => [
                        'label' => 'Prénom',
                        'attribute' => 'prénom',
                    ],
                    'lastname' => [
                        'label' => 'Nom',
                        'attribute' => 'nom',
                    ],
                    'name' => [
                        'label' => 'Nom d’entreprise',
                        'attribute' => 'nom d’entreprise',
                    ],
                    'email' => [
                        'label' => 'Email',
                        'attribute' => 'email',
                    ],
                    'description' => [
                        'label' => 'Description',
                        'attribute' => 'description',
                    ],
                    'postal_code' => [
                        'label' => 'Code postal',
                        'attribute' => 'code postal',
                    ],
                    'address' => [
                        'label' => 'Adresse',
                        'attribute' => 'adresse',
                    ],
                    'country' => [
                        'label' => 'Pays',
                        'attribute' => 'pays',
                    ],
                ],
            ],
        ],
        'partContainer' => [
            'title' => 'Rejoindre Picklio, ça coûte combien ?',
            'content' => 'Aucun abonnement, aucun frais d’entrée . Vous ne payez que lorsque vous vendez .',
            'commissionContainer' => [
                'title' => 'Commission par vente',
                'content' => 'Un seul pourcentage retenu sur chaque vente réalisée via Picklio. Cette commission couvre le stockage à l’entrepôt, la gestion logistique et la mise en relation avec les clients.',
            ],
            'exampleContainer' => [
                'title' => 'Exemple concret : pot de miel à 8€',
                'example' => [
                    '1' => [
                        'text' => 'Prix de vente',
                        'price' => '8,00€',
                    ],
                    '2' => [
                        'text' => 'Commission Picklio (10%)',
                        'price' => '-0,80€',
                    ],
                    '3' => [
                        'text' => 'Vous recevez',
                        'price' => '7,20€',
                    ],
                ],
            ],
            'textContainer' => [
                '1' => [
                    'title' => 'Quand est-ce que je reçois mon argent ?',
                    'text' => 'Picklio vous reverse votre part chaque mois, une fois les commandes du mois clôturées et les transactions validées en entrepôt.',
                ],
                '2' => [
                    'title' => 'Qui fixe le prix de mes produits ?',
                    'text' => 'Vous définissez vous-même le prix de vente depuis votre espace marchand. La commission est calculée automatiquement sur ce montant.',
                ],
                '3' => [
                    'title' => 'Y a-t-il des frais cachés ?',
                    'text' => 'Non. La commission de 10% est le seul coût lié à votre présence sur Picklio. Aucun frais d’inscription, de stockage ou de visibilité.',
                ],
            ],
        ],
    ],
    'profil' => [
        'informationContainer' => [
            'title' => 'Vos informations',
            'empty' => 'Vous devez avoir un compte pour voir les informations',
            'edit-profil' => 'Modifier vos informations',
            'toast-profil' => 'Vous avez bien modifier vos informations',
            'toast-delete' => 'Vous avez bien supprimer le compte',
            'edit-password' => 'Modifier votre mot de passe',
            'forget-password' => 'Mot de passe oublié ?',
            'form' => [
                'email' => [
                    'label' => 'Email',
                    'attribute' => 'email',
                ],
                'phone' => [
                    'label' => 'Téléphone',
                    'attribute' => 'téléphone',
                ],
                'password' => [
                    'label' => 'Nouveau mot de passe',
                    'attribute' => 'nouveau mot de passe',
                    'regex' => 'Le mot de passe doit contenir au moins une lettre minuscule et une lettre majuscule.',
                ],
                'current_password' => [
                    'label' => 'Mot de passe actuel',
                    'attribute' => 'mot de passe actuel',
                ],
                'firstname' => [
                    'label' => 'Prénom',
                    'attribute' => 'prénom',
                ],
                'lastname' => [
                    'label' => 'Nom',
                    'attribute' => 'nom',
                ],
            ],
        ],
        'order' => [
            'title' => 'Vos commandes',
            'details' => 'Voir les détails',
            'see-more' => 'Voir plus',
            'title-detail' => 'Votre commande',
            'return-detail' => 'Revenir précédemment',
        ],
        'account' => [
            'title' => 'Session et sécurité',
            'disconnect' => 'Déconnecter mon compte',
            'delete' => 'Supprimer mon compte',
            'delete-message' => 'Voulez-vous vraiment supprimer votre compte ? <br/> Cette action est <strong>irréversible</strong> !',
        ],
    ],
    'contact' => [
        'informationContainer' => [
            'title' => 'Nous contacter ?',
            'text' => 'Nos canaux de communication',
            'card' => [
                'title' => 'Comment nous contacter',
                'contact-us' => 'Pour nous contacter, vous pouvez remplir le formulaire
                ci-dessous, nous joindre par téléphone ou par
                e-mail.',
                'contact-them' => 'Si vous souhaitez contacter l’un de nos marchands,
                n’hésitez pas à compléter le formulaire en
                sélectionnant le nom du magasin concerné. Nous vous répondrons dans les plus brefs délais.',
            ],
        ],
        'formContainer' => [
            'title' => 'Formulaire de contact',
            'form' => [
                'name' => [
                    'label' => 'Nom - Prénom',
                    'attribute' => 'nom - prénom',
                ],
                'email' => [
                    'label' => 'Email',
                    'attribute' => 'email',
                ],
                'phone' => [
                    'label' => 'Téléphone',
                    'attribute' => 'téléphone',
                ],
                'merchant' => [
                    'label' => 'Choisir un commerçant',
                    'attribute' => 'choisir un commerçant',
                ],
                'title' => [
                    'label' => 'Titre',
                    'attribute' => 'titre',
                ],
                'description' => [
                    'label' => 'Description',
                    'attribute' => 'description',
                ],

            ],
        ],
    ],
    'order' => [
        'title' => 'Votre panier',
        'danger' => 'Votre panier à une durée limiter, si après 2h, il n’a pas été finaliser, il sera alors reinitialisé',
        'empty' => 'Vous n’avez rien dans votre panier',
        'login' => 'Connectez-vous',
        'basket-total' => 'Total de votre panier',
        'price-htva' => 'Prix HTVA',
        'price-tva' => 'TVA',
        'price-total' => 'Total',
        'button' => 'Continuer',
        'condition' => '*21% par défaut et 6% pour les biens essentiels',
        'max' => 'Max',
        'toast' => [
            'add' => [
                'success' => 'Le produit a été ajouté',
                'error' => 'Une erreur est survenu lors de l’ajout',
            ],
            'remove' => [
                'success' => 'Le produit a été supprimé',
                'error' => 'Une erreur est survenu lors de la suppression',
            ],
            'max' => [
                'success' => 'Vous avez atteint la quantité maximale',
                'error' => 'Une erreur est survenu lors de l’ajout',
            ],
            'register' => [
                'success' => 'Vous devez avoir un compte pour créer un panier',
            ],
        ],
    ],
    'slot' => [
        'little_word' => [
            'from' => 'Du',
            'to' => 'au',
        ],
        'button' => 'Valider et continuer',
        'empty-slot' => 'Veuillez choisir un jour mon afficher les plages horaires',
        'weekContainer' => [
            'title' => 'Choisir une semaine',
        ],
        'dayContainer' => [
            'title' => 'Choisir un jour',
        ],
        'slotContainer' => [
            'title' => 'Choisir une heure',
        ],
        'form' => [
            'pickup_date' => [
                'attribute' => 'choisir un jour',
            ],
            'time' => [
                'attribute' => 'choisir une heure',
            ],
        ],
    ],
    'order-confirmation' => [
        'thanks' => 'Merci pour votre achat !',
        'product' => 'Vos produits',
        'information' => 'Information de commande',
        'slot' => 'Créneaux',
        'email' => 'Email',
        'total' => 'Total à payer',
    ],
];
