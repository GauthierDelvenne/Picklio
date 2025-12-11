# Cahier des charges

## Présentation du projet Picklio

Il s’agit d’une plateforme de click & collect permettant aux commerçants belges de gérer leurs commandes en ligne ainsi que leurs stocks. Elle permet aussi aux clients des commerces de faire leurs click&collect en ligne.

Les commerces évoluent avec l’informatique et cherchent de nouveaux moyens d’attirer de la clientèle. À fortiori, la clientèle évolue aussi et cherche des façons de gagner du temps. Ainsi, le click&collect a vu le jour, un moyen pour les commerces de satisfaire un besoin de certains clients et donc d’avoir un plus large public.

## Étude d’applications existantes

Il existe déjà d’autres plateformes sur le marché. En voici quelques-unes :

| Applications existantes | Points forts / Spécificités | Points faibles |
| --- | --- | --- |
| **DigiCommerce** | Mise en place rapide (< 30 jours), solution dédiée à un commerce, interface simple et intuitive, conversion en ligne + retrait, augmentation possible du panier moyen (+15–40 %), fidélisation via compte client prépayé. | Commerce isolé, dépendance logistique, coût abonnement, visibilité limitée, personnalisation restreinte. |
| **Deliver by Linkeo** | Aucun coût de commission, intégration facile aux canaux existants (site web, RS, Google), gestion complète (stocks, production, notifications, promos, base clients), flexibilité paiement (en ligne ou sur place) + option livraison à domicile. | Complexité pour les non-digitalisés, interface standardisée, commerce isolé, dépendance aux réseaux sociaux et site web. |
| **Ollca** | Plateforme multi-commerces, permet de centraliser plusieurs commerces de quartier, offre un service global pour le consommateur (panier multi-boutiques, livraison ou retrait), repositionnement comme alternative aux grandes plateformes ou supermarchés. | Commissions/frais, logistique complexe, couverture géographique limitée, dépendance à la plateforme, contrôle client réduit. |

## Public cible

La plateforme s’adresse à deux groupes principaux d’utilisateurs, dont les besoins et habitudes numériques diffèrent.

### Les commerçants

Il s’agit de professionnels âgés en moyenne de 28 à 50 ans, issus de secteurs variés. Leurs habitudes de navigation peuvent être très variées : certains sont habitués à utiliser des solutions digitales au quotidien, tandis que d’autres découvrent encore ces pratiques.

### Les clients

Les utilisateurs finaux sont majoritairement des personnes de moins de 45 ans, habituées aux services en ligne et aux interactions rapides. Ils recherchent un outil fluide pour gagner du temps, avec flexibilité et expérience omnicanale.

## Personas et scénarios

### 1. Laurent – Maraîcher – Utilise déjà des outils numériques

**Âge : 42 ans**

#### Profil

Laurent gère un commerce de produits frais. Il connaît les outils numériques mais préfère confier les tâches courantes à un employé. Il utilise principalement la plateforme pour suivre les chiffres et organiser le travail.

#### Missions

- Suivre les ventes et les commandes du jour.
- Mettre à jour le stock rapidement.
- Ajuster les créneaux en fonction de l’affluence.

#### Scénarios

**Scénario 1 – Consultation matinale des commandes**  
Le matin, Laurent ouvre son dashboard pour visualiser les commandes du jour, les produits les plus vendus et les éventuels stocks faibles. Il transmet les tâches à son employé.

**Scénario 2 – Mise à jour d’un produit en rupture**  
En milieu de journée, Laurent remarque que les tomates sont épuisées. Il ajuste les quantités et désactive temporairement le produit depuis le dashboard pour éviter des commandes impossibles à honorer.

**Scénario 3 – Création de créneaux supplémentaires**  
Avant un week-end chargé, Laurent ajoute deux créneaux supplémentaires sur le samedi matin pour fluidifier les retraits et éviter les files.

---

### 2. Sarah – Boutique de vêtements – Débutante en numérique

**Âge : 35 ans**

#### Profil

Sarah tient une boutique de prêt-à-porter. Peu à l’aise avec le digital, elle apprécie les interfaces simples. Elle veut utiliser le click&collect pour attirer une clientèle plus jeune.

#### Missions

- Ajouter ou modifier des produits.
- Préparer les commandes et mettre à jour leur statut.
- Mettre des promotions sur certains articles.

#### Scénarios

**Scénario 1 – Ajout d’un produit**  
Sarah prend une photo d’une nouvelle robe, remplit le prix, les informations et la quantité, puis ajoute l’article sur le mini-site via son téléphone.

**Scénario 2 – Préparation d’une commande**  
Elle reçoit une commande, consulte la fiche, prépare l’article, puis met la commande en statut “prête”. Le client est automatiquement notifié.

**Scénario 3 – Mise en promo d’une ancienne collection**  
Pour écouler les stocks, elle active une promotion de -20 % sur une série de tops, ajuste les quantités et met à jour les descriptions.

---

### 3. Mehdi – Client – Utilisateur fréquent du click&collect

**Âge : 29 ans**

#### Profil

Mehdi travaille beaucoup et utilise le click&collect pour gagner du temps. Il veut commander vite, payer en ligne et éviter les files.

#### Missions

- Rechercher des produits rapidement.
- Commander en quelques clics.
- Modifier ou suivre l’état de sa commande.

#### Scénarios

**Scénario 1 – Commande rapide pendant la pause**  
Mehdi sélectionne ses produits via le mini-site, ajoute au panier, choisit un créneau et paie en ligne.

**Scénario 2 – Modification de créneau**  
Un imprévu arrive : il modifie son créneau. Le commerçant est automatiquement averti.

**Scénario 3 – Suivi de commande**  
En sortant du travail, il consulte le statut “prête”. Il passe la récupérer immédiatement.

---

### 4. Élodie – Pâtissière – À l’aise avec le digital

**Âge : 31 ans**

#### Profil

Élodie gère une pâtisserie artisanale. Elle utilise déjà plusieurs outils numériques et est à l’aise avec la gestion de stock et les commandes.

#### Missions

- Organiser les commandes par créneau.
- Ajouter ou modifier ses pâtisseries.
- Gérer des commandes spéciales ou des quantités limitées.

#### Scénarios

**Scénario 1 – Préparation des commandes du lendemain**  
Elle consulte les commandes programmées, imprime les tickets, et prépare son organisation pour le lendemain.

**Scénario 2 – Désactivation d’un créneau**  
Elle doit fermer l’après-midi exceptionnellement. Elle désactive les créneaux concernés, évitant des commandes inopinées.

**Scénario 3 – Mise en avant d’un nouveau produit**  
Élodie ajoute une nouvelle pâtisserie du mois avec une quantité limitée. Le produit apparaît immédiatement sur le mini-site.

---

## Fonctionnalités

### Pour les clients

- **Mini-site pour commander**
    - Liste de produits
    - Fiche produit
    - Filtre / Champs de recherche
- **Création de commande**
    - Panier avec les produits
    - Choix créneaux
    - Choix mode de paiement
    - Ajout de message
    - Détails de la commande
    - Confirmation / Annulation par email
- **Paiement en ligne**
    - En ligne
    - Différé

### Pour les commerces

- **Dashboard**
    - Nombre de commandes
    - Revenus
    - Top ventes
    - Créneaux
    - Commandes à traiter
    - Ajout de produit
    - Messages en attente
- **Gestion du stock**
    - Prix
    - Quantité
    - Promotion
    - CRUD
- **Gestion de la préparation**
    - Liste des commandes
    - États de la commande
    - Détails de la commande
    - Impression ticket / facture
- **Gestion des créneaux horaires**
    - Créer les horaires d’ouverture
    - Ajouter des heures spécifiques pour les click&collect

### Outils

- Laravel
- Livewire
- Gestion du paiement (ex : Stripe)
- Multi-tenant (ex : Tenancy)
