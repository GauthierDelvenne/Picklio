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
        'shop-name' => 'Nom du magasins',
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

];
