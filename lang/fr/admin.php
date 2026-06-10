<?php

declare(strict_types=1);

return [
    'commons' => [
        'search' => 'Rechercher',
        'empty' => 'Il ne se passe rien ici',
        'buttons' => [
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
            'show' => 'Voir',
            'inactive' => 'Désactiver',
            'add' => 'Ajouter',
            'cancel' => 'Annuler',
            'update' => 'Mettre à jour le stock',
            'send' => 'Envoyer',
        ],
    ],
    'settings' => [
        'theme' => [
            'title' => 'Changer le thème',
            'light' => 'Clair',
            'dark' => 'Sombre',
            'system' => 'Paramètre système',
        ],
        'lang' => 'Changer la langue',
        'accounts' => [
            'title' => 'Changer les informations du compte',
            'toast' => [
                'update' => [
                    'success' => 'Le compte a bien été modifié',
                    'error' => 'Une erreur est survenue lors de la modification',
                ],
            ],
        ],
        'warehouse' => [
            'title' => 'Changer les informations de l’entrepôt',
            'toast' => [
                'update' => [
                    'success' => 'L’entrepôt a bien été modifié',
                    'error' => 'Une erreur est survenue lors de la modification',
                ],
            ],
            'forms' => [
                'name' => [
                    'label' => 'Nom de l’entrepôt',
                    'attribute' => 'nom de l’entrepôt',
                ],
                'phone' => [
                    'label' => 'Téléphone',
                    'attribute' => 'téléphone',
                ],
                'email' => [
                    'label' => 'Email',
                    'attribute' => 'email',
                ],
                'address' => [
                    'label' => 'Adresse de l’entrepôt',
                    'attribute' => 'adresse de l’entrepôt',
                ],
                'postal_code' => [
                    'label' => 'Code postal',
                    'attribute' => 'code postal',
                ],
                'country' => [
                    'label' => 'Pays',
                    'attribute' => 'pays',
                ],
                'opening_time' => [
                    'label' => 'Heure d’ouverture',
                    'attribute' => 'heure d’ouverture',
                ],
                'closing_time' => [
                    'label' => 'Heure de fermeture',
                    'attribute' => 'heure de fermeture',
                ],
            ],
        ],
    ],
    'merchants' => [
        'add' => 'Ajouter un commerçant',
        'edit' => 'Éditer le commerçant',
        'total-merchants' => 'Nombre de commerçants',
        'new-merchants' => 'Nombre de nouveaux commerçants',
        'actif-merchants' => 'Nombre de commerçants actif',
        'status' => [
            '1' => 'Actif',
            '2' => 'Inactif',
        ],
        'shop-name' => 'Nom du commerce',
        'arrived' => 'Date d’arrivée',
        'delete-confirm' => 'Voulez-vous vraiment désactiver :name ?',
        'delete-title' => 'Voulez-vous vraiment le désactiver ?',
        'delete-reversed' => 'Vous êtes sur le point de le désactiver.<br> Cette action est irréversible.',
        'form' => [
            'name' => [
                'label' => 'Nom de la boite',
                'attribute' => 'nom de la boite',
                'placeholder' => 'Nom de la boite',
            ],
            'firstname' => [
                'label' => 'Prénom',
                'attribute' => 'prénom',
            ],
            'lastname' => [
                'label' => 'Nom',
                'attribute' => 'nom',
            ],
            'email' => [
                'label' => 'Email',
                'attribute' => 'email',
            ],
            'phone' => [
                'label' => 'Téléphone',
                'attribute' => 'téléphone',
            ],
            'status' => [
                'label' => 'Statut',
                'attribute' => 'statut',
                'placeholder' => 'Choisir un statut',
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
                'placeholder' => 'Choisir un pays',
            ],
            'description' => [
                'label' => 'Description',
                'attribute' => 'description',
                'placeholder' => 'Courte description',
            ],
        ],
        'toast' => [
            'create' => [
                'success' => 'Le commerçant a bien été crée',
                'error' => 'Une erreur est survenue lors de la création',
            ],
            'update' => [
                'success' => 'Le commerçant a bien été modifié',
                'error' => 'Une erreur est survenue lors de la modification',
            ],
            'delete' => [
                'success' => 'Le commerçant a bien été supprimé',
                'error' => 'Une erreur est survenue lors de la suppression',
            ],
        ],
    ],
    'stocks' => [
        'totals' => 'Stock total',
        'very-low-stock' => 'Stock critique (< 10%)',
        'low-stock' => 'Stock bas (entre 10% et 25%)',
        'status-stock' => 'État du stock (< 25%)',
        'choose-merchant' => 'Choisir un commerçant',
        'name-merchant' => 'Nom du commerçant',
        'sell-by' => 'Vendu par',
        'product-detail' => 'Détails du produit',
        'name' => 'Nom',
        'description' => 'Description',
        'category' => 'Catégorie',
        'stock-status' => 'États du stock',
        'product-status' => 'États du produit',
        'online' => 'En ligne',
        'offline' => 'Hors ligne',
        'product-value' => 'Valeur du produit',
        'product-price' => 'Prix',
        'forms' => [
            'quantity' => [
                'label' => 'Quantité',
                'attribute' => 'quantité',
                'description' => 'Il y a actuellement :quantity produit(s) <br/>  <small>(Indiquer le symbole + ou -)<small>',
            ],
            'type' => [
                'label' => 'Raison du changement',
                'attribute' => 'raison du changement',
                '1' => 'Livraison',
                '2' => 'Vente',
                '3' => 'Ajustement',
            ],
        ],
        'toast' => [
            'update' => [
                'success' => 'Le stock a bien été modifié',
                'error' => 'Une erreur est survenue lors de la modification',
            ],
        ],
        'categories' => [
            '1'  => 'Bières artisanales',
            '2'  => 'Bijoux & Accessoires faits main',
            '3'  => 'Boucherie & Charcuterie',
            '4'  => 'Bougies & Senteurs artisanales',
            '5'  => 'Boulangerie artisanale',
            '6'  => 'Chaussures artisanales',
            '7'  => 'Chocolats & Confiseries',
            '8'  => 'Créations artisanales',
            '9'  => 'Décoration & Art',
            '10' => 'Épicerie fine',
            '11' => 'Fromages & Produits laitiers',
            '12' => 'Fruits & Légumes de saison',
            '13' => 'Linge de maison',
            '14' => 'Maroquinerie',
            '15' => 'Mobilier & Décoration intérieure',
            '16' => 'Poterie & Céramique',
            '17' => 'Savons & Cosmétiques artisanaux',
            '18' => 'Textile & Couture',
            '19' => 'Traiteur & Cuisine',
            '20' => 'Ustensiles & Cuisine',
            '21' => 'Vêtements & Mode',
            '22' => 'Vins & Spiritueux',
        ],
        'status' => [
            'title' => 'Choisir un statut',
            '1' => 'Bon',
            '2' => 'Bas',
            '3' => 'Critique',
        ],
    ],
    'messages' => [
        'suggestMessage' => 'Les suggestions des clients',
        'newMerchantMessage' => 'Les inscriptions des nouveaux commerçants',
        'contactMessage' => 'Les messages de contact',
        'oneReceiveMessage' => 'Message reçu',
        'answerMail' => 'Répondre par mail',
        'sendMessage' => 'Les messages envoyés',
        'receiveMessage' => 'Les messages reçus',
        'information' => 'Les informations client',
        'merchant' => 'Le message du commerçant',
        'information-merchant' => 'Les informations du nouveau commerçant',
        'user-message' => 'Le message du client',
        'send' => 'Envoyer un message',
        'edit' => 'Modifier un message',
        'shop-name' => 'Nom du commerce',
        'user-name' => 'Nom de la personne',
        'user-email' => 'Email de la personne',
        'user-phone' => 'Téléphone de la personne',
        'user-description' => 'Description',
        'user-title' => 'Titre',
        'user-address' => 'Adresse',
        'user-merchantSuggest' => 'Suggestion de commerçants',
        'user-productSuggest' => 'Suggestion de produits',
        'admin-name' => 'Nom de L’entrepôt',
        'delete-confirm' => 'Voulez-vous vraiment supprimer le message de :name ?',
        'delete-title' => 'Voulez-vous vraiment le supprimer ?',
        'delete-reversed' => 'Vous êtes sur le point de le supprimer.<br> Cette action est irréversible.',
        'title' => 'Le message',
        'form' => [
            'title' => [
                'label' => 'Titre',
                'attribute' => 'titre',
                'placeholder' => 'Le titre du message',
            ],
            'description' => [
                'label' => 'Description',
                'attribute' => 'description',
                'placeholder' => 'Le contenu du message',
            ],
            'status' => [
                'label' => 'Statut',
                'attribute' => 'statut',
                'placeholder' => 'Le statut du message',
            ],
            'recipient' => [
                'label' => 'Envoyer à',
                'attribute' => 'envoyer à',
                'placeholder' => 'Envoyer un message à',
            ],
            'sender' => [
                'label' => 'Envoyeur',
                'attribute' => 'envoyeur',
            ],
        ],
        'status' => [
            '1' => 'Accepté',
            '2' => 'Non lu',
            '3' => 'Refusé',
            '4' => 'Lu'
        ],
        'toast' => [
            'create' => [
                'success' => 'Le message a bien été crée',
                'error' => 'Une erreur est survenue lors de la création',
            ],
            'update' => [
                'success' => 'Le message a bien été modifié',
                'error' => 'Une erreur est survenue lors de la modification',
            ],
            'delete' => [
                'success' => 'Le message a bien été supprimé',
                'error' => 'Une erreur est survenue lors de la suppression',
            ],
        ],
    ],
    'orders' => [
        'today-order' => 'Commandes du jour',
        'inWait-order' => 'Commandes en attente',
        'complete-order' => 'Commandes complétées',
        'progress-order' => 'Commandes en cours',
        'code' => 'Numéro de commande',
        'client-name' => 'Nom du client',
        'name' => 'Nom',
        'email' => 'Email',
        'phone' => 'Téléphone',
        'date' => 'Date de retrait',
        'stock-date' => 'Date',
        'status' => 'Statut',
        'total' => 'Total',
        'slot' => 'Créneaux',
        'in-progress' => 'En cours',
        'end' => 'Fini',
        'history-order' => 'Historique de commande',
        'order-by' => 'Commande numéro',
        'end-order' => 'Finaliser la commande',
        'delete-order' => 'Annuler la commande',
        'info-client' => 'Détail du client',
        'info-order' => 'Information de commande',
        'product' => 'Les produits',
        'product-name' => 'Nom du produit',
        'product-quantity' => 'Quantité',
        'product-price' => 'Prix',
        'delete-confirm' => 'Voulez-vous vraiment annuler la commande :name ?',
        'delete-title' => 'Voulez-vous vraiment annuler la commande ?',
        'delete-reversed' => 'Vous êtes sur le point d’annuler la commande.<br> Cette action est irréversible.',
        'toast' => [
            'create' => [
                'success' => 'La commande a bien été crée',
                'error' => 'Une erreur est survenue lors de la création',
            ],
            'delete' => [
                'success' => 'La commande a bien été annulée',
                'error' => 'Une erreur est survenue lors de la suppression',
            ],
        ],
    ],

];
