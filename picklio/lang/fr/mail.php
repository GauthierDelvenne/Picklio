<?php

declare(strict_types=1);
return [
    'auth' => [
        'commons' => [
            'trouble' => ' Si vous avez des difficultés à cliquer sur le bouton « :name », copiez et collez l’URL ci-dessous dans votre navigateur web :',
        ],
        'register' => [
            'title' => 'Bienvenu :name !',
            'description' => 'Merci de nous avoir rejoins. Vous pouvez maintenant profiter de l’application à 100%.',
            'button' => 'Vers le site',
        ],
        'reset-password' => [
            'title' => 'Réinitialiser votre mot de passe',
            'description' => 'Vous avez demandé un changement de mot de passe.',
            'button' => 'Réinitialiser votre mot de passe',
        ],
    ],
    'front' => [
        'newMerchantMessage' => [
            'subject' => 'Réception du formulaire',
            'title' => 'Merci d’avoir envoyé un formulaire',
            'description' => 'Vous avez fait une demande d’intégration. Elle sera traitée sous peu et vous serez recontacté prochainement pour un entretien, si votre profil correspond à nos exigences.',
            'button' => 'Retourner sur le site',
        ],
        'suggestMessage' => [
            'subject' => 'Réception du formulaire',
            'title' => 'Merci pour votre retour',
            'description' => 'Vous nous avez envoyé des suggestions d’articles et/ou de commerçants. Celle-ci sera traitée sous peu et Picklio essaiera de pallier ce manque.',
            'button' => 'Retourner sur le site',
        ],
        'order' => [
            'subject' => 'Votre panier expire bientôt',
            'title' => 'Votre panier est sur le point d’être supprimé',
            'description' => 'Votre panier vous attend ! Pensez à finaliser votre commande dans les 15 prochaines minutes, passé ce délai votre panier sera automatiquement supprimé.',
            'button' => 'Aller au panier',
        ],
    ],
];
