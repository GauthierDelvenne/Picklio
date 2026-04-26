<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Lignes de langue pour l'authentification
    |--------------------------------------------------------------------------
    |
    | Les lignes suivantes sont utilisées lors de l'authentification pour divers
    | messages que nous devons afficher à l'utilisateur. Vous pouvez modifier
    | ces lignes selon les besoins de votre application.
    |
    */

    'failed' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
    'password' => 'Le mot de passe fourni est incorrect.',
    'throttle' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds secondes.',
    'form' => [
        'button' => [

            'login' => 'Se connecter',
            'register' => 'S’inscrire',
            'forget' => 'Recevoir le mail de récupération',
            'reset' => 'Changer de mot de passe',
        ],
        'email' => [
            'label' => 'Email',
            'attribute' => 'email',
        ],
        'password' => [
            'label' => 'Mot de passe',
            'attribute' => 'mot de passe',
            'regex' => 'Le mot de passe doit contenir au moins une lettre minuscule et une lettre majuscule.',
        ],
        'remember' => [
            'label' => 'Se souvenir de moi',
            'attribute' => 'se souvenir de moi',
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
];
