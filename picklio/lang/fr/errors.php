<?php

declare(strict_types=1);

return [

    'default' => [
        'title' => 'Erreur',
        'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
    ],

    '401' => [
        'title' => 'Non autorisé',
        'message' => 'Vous devez être connecté pour accéder à cette page.',
    ],

    '402' => [
        'title' => 'Paiement requis',
        'message' => 'Cette action nécessite un paiement ou un abonnement actif.',
    ],

    '403' => [
        'title' => 'Accès refusé',
        'message' => 'Vous n’avez pas l’autorisation d’accéder à cette page.',
    ],

    '404' => [
        'title' => 'Page introuvable',
        'message' => 'La page que vous recherchez n’existe pas ou a été déplacée.',
    ],

    '419' => [
        'title' => 'Session expirée',
        'message' => 'Votre session a expiré. Veuillez rafraîchir la page et réessayer.',
    ],

    '429' => [
        'title' => 'Trop de requêtes',
        'message' => 'Vous avez effectué trop de requêtes en peu de temps.',
    ],

    '500' => [
        'title' => 'Erreur serveur',
        'message' => 'Une erreur interne s’est produite.',
    ],

    '503' => [
        'title' => 'Service indisponible',
        'message' => 'Le service est temporairement indisponible.',
    ],

];

