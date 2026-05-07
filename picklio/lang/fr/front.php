<?php

declare(strict_types=1);

return [

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
];
