# Exercises PHP

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
</p>

Exercices de révision PHP autour des formulaires, PDO, MySQL, sessions et authentification.

## Contenu

- `index.php` affiche une carte utilisateur et un formulaire d'ajout ;
- les données du formulaire sont insérées en base avec une requête préparée PDO ;
- `login.php` démarre une session et vérifie un mot de passe avec `password_verify()` ;
- `style.css` contient la mise en forme de la carte utilisateur.

## Base de données attendue

Le code actuel se connecte à une base MySQL nommée `exercise` et utilise une table `user`.

Le dépôt ne contient pas de fichier SQL de création de cette table. La structure exacte doit donc être préparée manuellement avant l'exécution.

## Lancement

Prérequis :

- PHP avec l'extension PDO MySQL ;
- un serveur MySQL accessible localement.

```bash
git clone https://github.com/loic31000/exercises_php.git
cd exercises_php
php -S localhost:8000
```

Ouvrez ensuite `http://localhost:8000`.

## Sécurité et configuration

Les paramètres de connexion MySQL sont actuellement écrits directement dans les fichiers PHP. Pour un usage hors exercice local, ils doivent être déplacés vers une configuration non versionnée ou des variables d'environnement.

Le formulaire de création enregistre actuellement la valeur du mot de passe telle qu'elle est reçue, tandis que la page de connexion utilise `password_verify()`. Le dépôt est donc à considérer comme un exercice en cours et non comme une implémentation d'authentification prête pour la production.
