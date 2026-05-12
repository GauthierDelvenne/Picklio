<?php

declare(strict_types=1);

return [
    'admin' => [
        'admin' => [
            'prefix' => 'admin',
            'dashboard' => 'dashboard',
            'orders' => 'commandes',
            'order' => 'commande',
            'merchants' => 'commercants',
            'merchant' => 'commercant',
            'stocks' => 'stocks',
            'stock' => 'produit',
            'messages' => 'messages',
            'message' => 'message',
            'statistics' => 'statistique',
            'settings' => 'parametre',
            'suggestMessage' => 'suggestion',
        ],
        'client' => [
            'prefix' => 'client',
            'dashboard' => 'dashboard',
            'stocks' => 'stocks',
            'stock' => 'produit',
            'messages' => 'messages',
            'message' => 'message',
            'statistics' => 'statistique',
            'settings' => 'parametre',
        ],
    ],
    'front' => [
        'home' => 'accueil',
        'catalogue' => 'catalogue',
        'product' => 'produit',
        'merchant' => 'commercant',
        'basket' => 'panier',
        'slot' => 'creneaux',
        'order-confirmation' => 'confirmation-commande',
        'profil' => 'profil',
        'legal-notice' => 'mentions-legales',
        'privacy-policy' => 'politique-de-confidentialite',
    ],
    'auth' => [
        'login' => 'connexion',
        'register' => 'inscription',
        'password' => [
            'reset-password' => 'reinitialiser-mot-de-passe',
            'forget-password' => 'recuperer-mot-de-passe',
        ],
        'logout' => 'deconnexion',
    ],

];
