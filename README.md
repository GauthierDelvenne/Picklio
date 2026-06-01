# 🛒 Picklio — Click & Collect Centralisé

Picklio est une application web qui centralise les produits de commerçants locaux belges dans un entrepôt unique. Les clients composent un panier multi-commerces en ligne et récupèrent l'ensemble de leurs achats en un seul déplacement, avec paiement sur place.

> Projet de fin d'études — Bachelier en Techniques Infographiques, option Web.

---

## 📚 Documentation

- 📄 [Cahier des charges](docs/cahier-des-charges.md)
- 👤 [Personas](docs/personas.md)
- ⚙️ [Fonctionnalités](docs/fonctionnalites.md)
- 📖 [Documentation annexe](https://github.com/GauthierDelvenne/delvenne-gauthier-doc-PFE)
---

## 🧠 Concept

Le click&collect classique oblige le client à multiplier les trajets s'il veut des produits de commerçants différents. Picklio résout ce problème en centralisant le stockage de plusieurs partenaires dans un entrepôt unique. Le client passe une seule commande, choisit un créneau de retrait, et ne paie qu'en se présentant sur place.

La plateforme s'adresse à trois types d'utilisateurs :
- **Clients** — recherchent, commandent et retirent leurs produits locaux
- **Commerçants partenaires** — gèrent leurs produits, stocks et promotions depuis leur espace dédié
- **Administrateur** — gère l'entrepôt, les commandes, les créneaux et les partenaires

---

## 🛠️ Stack technique

- Laravel (PHP)
- Livewire + Alpine.js
- Blade
- SCSS + BEM (site vitrine)
- Tailwind CSS + Flux UI (admin)
- Docker + Laravel Sail
- Architecture multi-rôles (Admin / Partenaires / Clients)
- Application développée entièrement en Laravel + Livewire

---

## Installation

### Prérequis

- Docker Desktop 
- Sail
- Composer
- npm


### Étapes

```bash
# 1. Cloner le projet
git clone https://github.com/GauthierDelvenne/Picklio.git
cd Picklio
 
# 2. Copier le fichier d'environnement
cp .env.example .env
 
# 3. Démarrer les conteneurs
./vendor/bin/sail up -d
 
# 4. Générer la clé applicative
./vendor/bin/sail artisan key:generate
 
# 5. Lancer les migrations et les seeders
./vendor/bin/sail artisan migrate --seed
 
# 6. Compiler les assets
npm install && npm run build
```

| Service | URL |
|---|---|
| Application | http://localhost:8080 |
| Mailpit (emails) | http://localhost:8025 |
| phpMyAdmin | http://localhost:8081 |
 
---

## Auteur

**Gauthier Delvenne**
