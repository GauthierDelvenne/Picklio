<?php

declare(strict_types=1);

return [
    'commons' => [
        'search' => 'Rechercher',
        'empty' => 'Il ne se passe rien ici',
        'buttons' => [
            'edit' => 'Modifier',
            'show' => 'Voir',
            'delete' => 'Supprimer',
            'inactive' => 'Désactiver',
            'add' => 'Ajouter',
            'cancel' => 'Annuler',
            'validate' => 'Valider le message',
            'read' => 'Marquer comme lu',
            'refuse' => 'Refuser le message',
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
    ],
    'products' => [
        'add' => 'Ajouter un produit',
        'edit' => 'Éditer le produit',
        'history' => 'Historique du stock',
        'total-product' => 'Nombre de produits',
        'discount-product' => 'Promotion en cours',
        'bestseller-product' => 'Meilleures ventes',
        'lowStock-product' => 'Stock critique (< 10%)',
        'product-restock' => 'Produits à réapprovisionner',
        'status' => 'Statut',
        'image' => 'Image',
        'quantity' => 'Quantité vendue',
        'stock' => 'Stock',
        'total-sale' => 'Revenu Total',
        'orderItem' => 'Nombre total de produits commandés',
        'bestsellers' => 'La meilleure vente',
        'delete-confirm' => 'Voulez-vous vraiment désactiver :name ?',
        'delete-title' => 'Voulez-vous vraiment le désactiver ?',
        'delete-reversed' => 'Vous êtes sur le point de le désactiver.<br> Cette action est irréversible.',
        'forms' => [
            'name' => [
                'label' => 'Nom',
                'attribute' => 'nom',
                'placeholder' => 'Nom du produit',
            ],
            'description' => [
                'label' => 'Description',
                'attribute' => 'description',
                'placeholder' => 'Une courte description du produit',
            ],
            'category' => [
                'label' => 'Catégorie',
                'attribute' => 'catégorie',
                'placeholder' => 'Choisir une catégorie',
            ],
            'price' => [
                'label' => 'Prix',
                'attribute' => 'prix',
            ],
            'is_active' => [
                'label' => 'Le produit est-il actif ?',
                'attribute' => 'actif',
            ],
            'picture_path' => [
                'label' => 'L’image',
                'attribute' => 'l’image',
            ],
        ],
        'toast' => [
            'create' => [
                'success' => 'Le produit a bien été créé',
                'error' => 'Une erreur est survenue lors de la création',
            ],
            'update' => [
                'success' => 'Le produit a bien été modifié',
                'error' => 'Une erreur est survenue lors de la modification',
            ],
            'delete' => [
                'success' => 'Le produit a bien été désactivé',
                'error' => 'Une erreur est survenue lors de la désactivation',
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
    ],

];
