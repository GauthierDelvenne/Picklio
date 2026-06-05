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
        'contactMessage' => [
            'subject' => 'Réception du formulaire',
            'title' => 'Merci pour votre message',
            'description' => 'Nous avons bien reçu votre demande et vous remercions de nous avoir contactés. Notre équipe reviendra vers vous dans les meilleurs délais.',
            'button' => 'Retourner sur le site',
        ],
        'contactAdminMessage' => [
            'subject' => 'Vous avez une nouvelle demande de contact',
            'title' => 'Nouvelle demande de contact reçue',
            'description' => 'Un utilisateur a soumis une demande via le formulaire de contact. Consultez le message pour en prendre connaissance et y répondre.',
            'button' => 'Voir le message',
        ],
        'suggestAdminMessage' => [
            'subject' => 'Vos avez de nouvelle suggestion',
            'title' => 'Nouvelle suggestion de :name',
            'description' => ':name vous a envoyé une nouvelle suggestion. Consultez-la pour en prendre connaissance.',
            'button' => 'Voir le message',
        ],
        'newMerchantAdminMessage' => [
            'subject' => 'Vos avez une demande d’intégration',
            'title' => ':name souhaite rejoindre Picklio',
            'description' => ':name a soumis une demande d’intégration à Picklio. Consultez sa demande pour l’examiner et y répondre.',
            'button' => 'Voir le message',
        ],
        'order' => [
            'subject' => 'Votre panier expire bientôt',
            'title' => 'Votre panier est sur le point d’être supprimé',
            'description' => 'Votre panier vous attend ! Pensez à finaliser votre commande dans les 15 prochaines minutes, passé ce délai votre panier sera automatiquement supprimé.',
            'button' => 'Aller au panier',
        ],
        'success-order' => [
            'subject' => 'Votre commande a bien été enregistrée',
            'title' => 'Commande :name confirmée, merci !',
            'description' => 'Nous avons bien reçu votre commande et elle est en cours de traitement. Vous recevrez prochainement un email de confirmation avec tous les détails.',
            'button' => 'Voir votre commande',
            'pay' => 'Le montant est à payer sur place',
        ],
        'cancel-order' => [
            'subject' => 'Votre commande a été annulée',
            'title' => 'Commande :name annulée',
            'description' => 'Votre commande a été annulée par notre équipe. Si vous pensez qu\'il s\'agit d\'une erreur ou si vous avez des questions, n\'hésitez pas à nous contacter.',
            'button' => 'Retourner sur le site',
        ],
        'prepared-order' => [
            'subject' => 'Votre commande est prête à être récupérée !',
            'title' => 'Commande :name est prête, à vous de jouer !',
            'description' => 'Bonne nouvelle ! Votre commande est prête et vous attend. Rendez-vous dès maintenant à notre point de retrait pour la récupérer.',
            'button' => 'Voir votre commande',
        ],
    ],
    'admin' => [
        'message' => [
            'subject' => 'Vos avez un nouveau message',
            'title' => 'Vous avez un message de :name est attente',
            'description' => 'Consultez votre boîte de réception pour lire le message envoyé par :name.',
            'button' => 'Voir le message',
        ],
        'newProduct' => [
            'subject' => 'Un nouveau produit a été ajouté',
            'title' => ':name a ajouté un nouveau produit',
            'description' => ':name a publié un nouveau produit sur la plateforme. Consultez sa fiche pour découvrir ses caractéristiques et vérifier sa mise en ligne.',
            'button' => 'Voir le produit',
        ],
    ]
];
