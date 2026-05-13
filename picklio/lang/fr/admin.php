<?php

declare(strict_types=1);

return [
    'commons' => [
        'search' => 'Rechercher',
        'empty' => 'Il ne se passe rien ici',
        'buttons' => [
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
            'add' => 'Ajouter',
            'cancel' => 'Annuler',
            'update' => 'Mettre à jour le stock',
            'send' => 'Envoyer',
        ],
    ],
    'settings' => [
        'theme' => [
            'title' => 'Changez le theme',
            'light' => 'Clair',
            'dark' => 'Sombre',
            'system' => 'Paramètre système',
        ],
        'lang' => 'Changez la langue',
        'accounts' => [
            'title' => 'Changez les informations du compte',
            'toast' => [
                'update' => [
                    'success' => 'Le compte a bien été modifié',
                    'error' => 'Une erreur est survenu lors de la modification',
                ],
            ],
        ],
        'warehouse' => [
            'title' => 'Changez les informations de l’entrepôt',
            'toast' => [
                'update' => [
                    'success' => 'L’entrepôt a bien été modifié',
                    'error' => 'Une erreur est survenu lors de la modification',
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
        'edit' => 'Éditez le commerçant',
        'total-merchants' => 'Nombre de commerçants',
        'new-merchants' => 'Nombre de nouveau commerçants',
        'actif-merchants' => 'Nombre de commerçants actif',
        'status' => [
            '1' => 'Actif',
            '2' => 'En attente',
            '3' => 'Inactif',
        ],
        'shop-name' => 'Nom du commerce',
        'arrived' => 'Date d’arrivé',
        'delete-confirm' => 'Voulez vous vraiment supprimer :name ?',
        'delete-title' => 'Voulez vraiment le supprimer ?',
        'delete-reversed' => 'Vous êtes sur le point de le supprimer.<br> Cette action est irréversible.',
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
                'label' => 'Status',
                'attribute' => 'status',
                'placeholder' => 'Choisir un status',
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
                'error' => 'Une erreur est survenu lors de la création',
            ],
            'update' => [
                'success' => 'Le commerçant a bien été modifié',
                'error' => 'Une erreur est survenu lors de la modification',
            ],
            'delete' => [
                'success' => 'Le commerçant a bien été supprimé',
                'error' => 'Une erreur est survenu lors de la suppression',
            ],
        ],
    ],
    'stocks' => [
        'totals' => 'Stock total',
        'very-low-stock' => 'Stock urgent (sous 10%)',
        'low-stock' => 'Stock critique (entre 10% et 25%)',
        'choose-merchant' => 'Choisir un commerçant',
        'sell-by' => 'Vendu par',
        'product-detail' => 'Détails du produit',
        'name' => 'Nom du produit',
        'description' => 'Description du produit',
        'category' => 'Catégorie du produit',
        'stock-status' => 'États du stock',
        'product-status' => 'États du produit',
        'online' => 'En ligne',
        'offline' => 'Hors ligne',
        'product-value' => 'Valeur du produit',
        'product-price' => 'Prix du produit',
        'product-percentage' => 'Pourcentage du produit',
        'forms' => [
            'quantity' => [
                'label' => 'Quantité',
                'attribute' => 'quantité',
                'description' => 'Il y actuellement :quantity produit(s)',
            ],
            'type' => [
                'label' => 'Raison du changement',
                'attribute' => 'raison du changement',
                'supply' => 'Livraison',
                'adjustment' => 'Ajustement',
                'sale' => 'Vente',
            ],
        ],
        'toast' => [
            'update' => [
                'success' => 'Le stock a bien été modifié',
                'error' => 'Une erreur est survenu lors de la modification',
            ],
        ],
        'categories' => [
            '1' => 'Boulangerie artisanale',
            '2' => 'Boucherie & Charcuterie',
            '3' => 'Fromages & Produits laitiers',
            '4' => 'Fruits & Légumes de saison',
            '5' => 'Épicerie fine',
            '6' => 'Bières artisanales',
            '7' => 'Vins & Spiritueux',
            '8' => 'Chocolats & Confiseries',
            '9' => 'Traiteur & Cuisine',
            '10' => 'Produits bio',
            '11' => 'Créations artisanales',
            '12' => 'Poterie & Céramique',
            '13' => 'Bijoux & Accessoires faits main',
            '14' => 'Savons & Cosmétiques artisanaux',
            '15' => 'Bougies & Senteurs artisanales',
            '16' => 'Décoration & Art',
            '17' => 'Textile & Couture',
            '18' => 'Vêtements & Mode',
            '19' => 'Chaussures artisanales',
            '20' => 'Maroquinerie',
            '21' => 'Linge de maison',
            '22' => 'Ustensiles & Cuisine',
            '23' => 'Mobilier & Décoration intérieure',
            '24' => 'Soins naturels & Bio',
            '25' => 'Parfums & Senteurs',
        ],
    ],
    'messages' => [
        'suggestMessage' => 'Les suggestion client',
        'information' => 'Les informations client',
        'information-merchant' => 'Les informations du nouveau commerçant',
        'user-message' => 'Le message du client',
        'send' => 'Envoyez un message',
        'edit' => 'Modifier un message',
        'shop-name' => 'Nom du commerce',
        'user-name' => 'Nom de la personne',
        'user-email' => 'Email de la personne',
        'user-description' => 'Description',
        'user-address' => 'Adresse',
        'user-merchantSuggest' => 'Suggestion de commerçants',
        'user-productSuggest' => 'Suggestion de produits',
        'admin-name' => 'Nom de L’entrepôt',
        'delete-confirm' => 'Voulez vous vraiment supprimer le message de :name ?',
        'delete-title' => 'Voulez vraiment le supprimer ?',
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
                'label' => 'Status',
                'attribute' => 'status',
                'placeholder' => 'Le status du message',
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
            '1' => 'Valide',
            '2' => 'En attente',
            '3' => 'Invalide',
        ],
        'toast' => [
            'create' => [
                'success' => 'Le message a bien été crée',
                'error' => 'Une erreur est survenu lors de la création',
            ],
            'update' => [
                'success' => 'Le message a bien été modifié',
                'error' => 'Une erreur est survenu lors de la modification',
            ],
            'delete' => [
                'success' => 'Le message a bien été supprimé',
                'error' => 'Une erreur est survenu lors de la suppression',
            ],
        ],
    ],

];
