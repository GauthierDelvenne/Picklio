# Cahiers des charges

## Présentation du projet click&collect

Il s’agit d’une plateforme de click & collect permettant aux commerçants belges de proposer leurs produits en ligne via un système centralisé.

Contrairement aux modèles classiques où les clients récupèrent leurs commandes directement en magasin, la plateforme repose sur un **entrepôt centralisé**. Les produits des commerces partenaires sont stockés dans cet entrepôt, et les clients viennent y retirer leurs commandes.

Le système permet :

- Aux commerçants partenaires de se focaliser sur leurs ventes et l’approvisionnement de leurs produits
- Aux clients de commander différentes marchandises, de commerçants différents
- Le paiement se fait **uniquement sur place par carte via une borne**, afin d’éviter les commandes payées mais non récupérées.

Les commerces évoluent avec l’informatique et cherchent de nouveaux moyens d’attirer une clientèle plus large. De leur côté, les clients recherchent des solutions rapides et pratiques. Le click & collect centralisé répond à ces deux besoins.

---

## Étude d’applications existantes

Il y a déjà d’autres plateformes de click&collect pour les magasins sur le marché et je vais en lister quelques-unes :

| Applications existantes | Points forts / Spécificités | Points faibles |
| --- | --- | --- |
| DigiCommerce | Mise en place rapide, solution dédiée à un commerce, interface simple | Commerce isolé, pas de centralisation |
| Deliver by Linkeo | Gestion complète (stocks, notifications, promos), flexibilité | Interface standardisée, commerce isolé |
| Ollca | Multi-commerces, panier multi-boutiques, alternative aux grandes plateformes | Logistique complexe, commissions |

### Différence principale de notre projet

- Centralisation des produits dans un entrepôt unique
- Panier unique global
- Séparation entre :
    - Espace Admin plateforme
    - Espace Commerçant partenaire

---

## Public cible

La plateforme s’adresse à deux groupes principaux d’utilisateurs.

### Les commerçants

Professionnels âgés en moyenne de 28 à 50 ans, issus de secteurs variés. Leur niveau numérique varie : certains sont à l’aise avec les outils digitaux, d’autres ont besoin d’une interface simple et guidée.

### Les clients

Majoritairement moins de 45 ans, habitués aux services digitaux. Ils recherchent un outil rapide, simple et efficace pour gagner du temps.

---

## Personas et scénarios

## 1. Laurent – Maraîcher – Utilise déjà des outils numériques

Âge : 42 ans

### Profil :

Laurent vend ses produits via la plateforme. Il ajoute ses articles dans son espace partenaire et consulte ses chiffres régulièrement.

### Missions :

- Ajouter et mettre à jour ses produits
- Suivre ses ventes
- Consulter les commandes contenant ses produits

### Scénarios :

### Scénario 1 – Consultation des ventes

Laurent se connecte à son espace partenaire et consulte son chiffre d’affaires ainsi que ses produits les plus vendus.

### Scénario 2 – Produit en rupture

Il modifie la quantité disponible d’un produit ou le désactive temporairement.

### Scénario 3 – Promotion

Il applique une promotion sur certains produits pour stimuler les ventes.

---

## 2. Sarah – Boutique de vêtements – Débutante en numérique

Âge : 35 ans

### Profil :

Sarah souhaite digitaliser son commerce simplement.

### Missions :

- Ajouter des produits
- Gérer les quantités
- Voir ses performances

### Scénarios :

### Scénario 1 – Ajout d’un produit

Elle ajoute une robe via son espace partenaire, renseigne prix et quantité.

### Scénario 2 – Consultation commandes

Elle consulte les commandes contenant ses articles.

### Scénario 3 – Mise en promotion

Elle active une réduction sur une ancienne collection.

---

## 3. Mehdi – Client – Utilisateur fréquent du click&collect

Âge : 29 ans

### Profil :

Mehdi souhaite commander rapidement et récupérer ses produits à l’entrepôt.

### Missions :

- Rechercher des produits
- Commander rapidement
- Choisir un créneau de retrait

### Scénarios :

### Scénario 1 – Commande rapide

Il ajoute des produits au panier, choisit un créneau et valide sa commande.

### Scénario 2 – Modification de créneau

Il modifie son créneau avant validation finale si besoin.

### Scénario 3 – Retrait

Il reçoit une notification/mail indiquant que sa commande est prête et se rend à l’entrepôt pour payer et retirer ses produits.

---

## 4. Élodie – Pâtissière – À l’aise avec le digital

Âge : 31 ans

### Profil :

Élodie utilise régulièrement des outils numériques et consulte souvent ses statistiques.

### Missions :

- Gérer ses produits
- Suivre ses performances
- Ajuster ses quantités

### Scénarios :

### Scénario 1 – Consultation des ventes

Elle analyse ses produits les plus populaires.

### Scénario 2 – Désactivation produit

Elle désactive temporairement un produit en rupture.

### Scénario 3 – Ajout nouveau produit

Elle ajoute une nouvelle pâtisserie en quantité limitée.

---

## Les fonctionnalités

### La plateforme offre aux clients :

- Mini-site pour commander
    - Liste de produits (tous commerces confondus)
    - Fiche produit
    - Filtre / Recherche
- Création de commande
    - Panier unique global
    - Choix créneaux de retrait (entrepôt)
    - Ajout de message
    - Détails commande
    - Confirmation email
- Paiement
    - Paiement par carte uniquement sur place (borne)
    - Pas de paiement en ligne

---

### La plateforme offre aux commerces partenaires :

- Dashboard partenaire
    - Nombre de commandes
    - Revenus
    - Top ventes
    - Produits actifs
    - Messages
- Gestion des produits
    - Prix
    - Quantité
    - Promotion
    - CRUD complet
- Suivi des commandes
    - Liste des commandes contenant leurs produits
    - États des commandes
    - Détails

---

### La plateforme offre à l’administrateur :

- Dashboard global
    - Nombre total de commandes
    - Revenus globaux
    - Top produits
    - Activité des commerces
- Gestion de l’entrepôt
    - Stock global
    - Ajustement des quantités
    - Gestion des ruptures
- Gestion des commandes
    - Vue complète
    - États (en attente, prête, retirée)
    - Impression ticket / facture
- Gestion des commerces partenaires
    - Création / validation
    - Activation / désactivation
    - Suivi performance
- Gestion des créneaux
    - Création horaires de retrait
    - Limitation nombre commandes par créneau
    - Fermeture exceptionnelle

---

## Outils

- Laravel et livewire
- Architecture multi-rôles (Admin / Partenaires / Clients)
- Toastr JS pour notifications dynamiques
- Flux UI structurés pour l’admin
- Application développée entièrement en Laravel + Livewire

---
