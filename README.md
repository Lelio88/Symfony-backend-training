# Symfony Task Manager

Application de gestion de tâches développée avec Symfony 7.3 dans le cadre d'un projet d'apprentissage du développement backend.

## 🎯 Objectif du projet

Ce projet a été créé pour développer et renforcer nos compétences en développement backend avec Symfony, en implémentant les fonctionnalités essentielles d'une application web moderne.

## ✨ Fonctionnalités

- 🔐 **Authentification complète**
  - Inscription et connexion utilisateurs
  - Réinitialisation de mot de passe
  - Vérification d'email
  - Sécurité avec Symfony Security

- 📝 **Gestion de tâches**
  - CRUD complet des tâches
  - Système de priorités
  - Gestion des tags/étiquettes
  - Association tâches-tags (Many-to-Many)

- 🚀 **API REST**
  - API Platform 4.2
  - Documentation automatique
  - CORS configuré

- 💅 **Interface moderne**
  - Tailwind CSS
  - Symfony UX (Turbo, Stimulus)
  - Templates Twig

## 🛠️ Technologies utilisées

- **PHP 8.2+**
- **Symfony 7.3**
- **Doctrine ORM** - Gestion de base de données
- **API Platform 4.2** - Création d'API REST
- **Tailwind CSS** - Framework CSS
- **PostgreSQL** - Base de données (via Docker)
- **Docker** - Containerisation

### Bundles principaux

- `symfony/security-bundle` - Authentification et autorisation
- `symfony/form` - Formulaires
- `doctrine/orm` - ORM
- `api-platform/symfony` - API REST
- `symfonycasts/reset-password-bundle` - Réinitialisation de mot de passe
- `symfonycasts/verify-email-bundle` - Vérification d'email
- `symfonycasts/tailwind-bundle` - Intégration Tailwind

## 📦 Installation

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- Docker et Docker Compose (pour la base de données)

### Étapes

1. **Cloner le repository**
```bash
git clone https://github.com/Lelio88/symfony-task-manager.git
cd symfony-task-manager
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Configurer l'environnement**
```bash
cp .env .env.local
# Éditer .env.local avec vos paramètres
```

4. **Démarrer les services Docker**
```bash
docker compose up -d
```

5. **Créer la base de données**
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

6. **Charger les fixtures (optionnel)**
```bash
php bin/console doctrine:fixtures:load
```

7. **Démarrer le serveur de développement**
```bash
symfony server:start
```

L'application est maintenant accessible sur `https://localhost:8000`

## 📁 Structure du projet

```
src/
├── Controller/       # Contrôleurs
│   ├── HomeController.php
│   ├── TaskController.php
│   ├── TagController.php
│   ├── SecurityController.php
│   ├── RegistrationController.php
│   └── ResetPasswordController.php
├── Entity/          # Entités Doctrine
│   ├── User.php
│   ├── Task.php
│   ├── Tag.php
│   └── Priority.php
├── Form/            # Formulaires
├── Repository/      # Repositories Doctrine
└── Security/        # Configuration sécurité
```

## 🧪 Tests

```bash
php bin/phpunit
```

## 🎓 Compétences développées

- Architecture MVC avec Symfony
- Doctrine ORM et relations (OneToMany, ManyToMany)
- Système d'authentification et de sécurité
- Création d'API REST avec API Platform
- Formulaires Symfony et validation
- Migrations de base de données
- Fixtures et données de test
- Docker pour l'environnement de développement

## 📚 Ressources

- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [API Platform](https://api-platform.com/docs/)
- [Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/)

## 👨‍💻 Auteur

[@Lelio88](https://github.com/Lelio88)

## 📄 Licence

Ce projet est sous licence propriétaire - Projet d'apprentissage
