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
        'success-order' => [
            'subject' => 'Votre commande a bien été enregistrée',
            'title' => 'Commande confirmée, merci !',
            'description' => 'Nous avons bien reçu votre commande et elle est en cours de traitement. Vous recevrez prochainement un email de confirmation avec tous les détails.',
            'button' => 'Voir votre commande',
            'pay' => 'Le montant est à payez sur place',
        ],
        'cancel-order' => [
            'subject' => 'Votre commande a été annulée',
            'title' => 'Commande annulée',
            'description' => 'Votre commande a été annulée par notre équipe. Si vous pensez qu\'il s\'agit d\'une erreur ou si vous avez des questions, n\'hésitez pas à nous contacter.',
            'button' => 'Retourner sur le site',
        ],
        'prepared-order' => [
            'subject' => 'Votre commande est prête à être récupérée !',
            'title' => 'Commande prête, à vous de jouer !',
            'description' => 'Bonne nouvelle ! Votre commande est prête et vous attend. Rendez-vous dès maintenant à notre point de retrait pour la récupérer.',
            'button' => 'Retourner sur le site',
        ],
    ],
];
