# Ma Petite Robe En Wax : backend et tableau de bord

API REST et tableau de bord d'administration de la plateforme e-commerce **Ma Petite Robe En Wax**, qui propose des robes en tissu wax sur mesure et prêt-à-porter. Ce backend alimente l'application mobile Flutter et gère les opérations internes : clients, mensurations, commandes, livraisons, paiements et artisans.

## Fonctionnalités

- **API REST** pour l'application mobile : inscription, connexion, catalogue, panier, commandes, paiement et notifications.
- **Authentification** par tokens Laravel Sanctum.
- **Tableau de bord d'administration** : gestion des clients, des mensurations, des robes et de leurs composants (coupes, cols, manches, jupes, tissus), des commandes et de leurs articles, des livraisons, des transactions et des notifications.
- **Espace artisan** : suivi des commandes attribuées et des offres.
- **Gestion des rôles** : accès admin et artisan contrôlé par un middleware dédié.
- **Paiement en ligne** via PayTech.
- **E-mails transactionnels** via MailerSend (SMTP).
- **Modèles 3D** des composants de robe (endpoint dédié).

## Stack technique

- PHP 8.1 et Laravel 10
- Laravel Sanctum (authentification API)
- MySQL
- Blade, Vite, Bootstrap Icons (interface d'administration)
- Guzzle (appels HTTP vers PayTech)
- MailerSend (envoi d'e-mails)

## Installation

**Prérequis** : PHP 8.1 ou supérieur, Composer, Node.js et npm, MySQL.

```bash
git clone https://github.com/Sylviedistribution/mprew_dashboard.git
cd mprew_dashboard

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Renseignez ensuite dans `.env` les paramètres de la base de données (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) et ceux de l'envoi d'e-mails (`MAIL_*`). Ne committez jamais le fichier `.env`.

```bash
php artisan migrate --seed
npm run build
php artisan serve
```

Le tableau de bord est accessible sur `http://localhost:8000`.

## Principaux endpoints

| Ressource | Méthodes | Authentification |
|---|---|---|
| `/api/auth/register`, `/api/auth/login` | POST | Non |
| `/api/auth/logout` | POST | Oui (Sanctum) |
| `/api/robes` | GET, POST, DELETE | GET et POST : oui |
| `/api/commandes` | GET, POST, DELETE, PUT | GET et POST : oui |
| `/api/clients` | GET, POST, PUT, DELETE | Partielle |
| `/api/livraisons`, `/api/transactions`, `/api/notifications` | GET, POST, PUT, DELETE | En cours de sécurisation |
| `/api/paiements/make` | POST | Oui (Sanctum) |
| `/api/coupes`, `/api/cols`, `/api/manches`, `/api/jupes`, `/api/tissus` | GET | Non |

## Structure du projet
```js
app/
├── Http/Controllers/Api/ # Contrôleurs de l’API REST
├── Http/Controllers/ # Contrôleurs du tableau de bord
├── Http/Middleware/ # Gestion des rôles admin et artisan
└── Models/ # Modèles Eloquent
database/
├── migrations/ # Schéma de la base
└── seeders/ # Données de démonstration
resources/views/ # Vues Blade du tableau de bord
routes/api.php # Routes de l’API
```

## Feuille de route

- Ajouter l'authentification et le contrôle des rôles sur toutes les routes de modification.
- Remplacer les tests par défaut par des tests de fonctionnalité sur l'API.
- Déplacer les clés d'API vers les variables d'environnement.

## Auteur

**Sylvestre Ibombo Gakosso**
Ingénieur logiciel, Dakar
- LinkedIn : https://www.linkedin.com/in/igs-568510220
- GitHub : https://github.com/Sylviedistribution
