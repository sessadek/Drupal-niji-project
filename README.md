[![pipeline status](https://gitlab.niji.fr/niji-tools/socles/app-drupal-docker/badges/master/pipeline.svg)](https://gitlab.niji.fr/niji-tools/socles/app-drupal-docker/commits/master)

# Mettre à jour Drupal

Les étapes suivantes sont à réaliser dans l'ordre afin de mettre à jour un projet Drupal, y compris ce socle.

1. Installer omplètement le socle avant toute modification : `make setup`
2. Lancer les commandes composer pour mettre à jour Drupal (ou les uniquements certains modules): `composer update [...]`
3. Lancer les update Drupal : `drush updatedb -y`
4. Exporter les nouvelles configurations : `drush config:export -y`
5. Ré-installer le socle pour vérifier que tout est OK.

# Application Drupal

## Prérequis

Pour utiliser ce socle, il faut au préalable avoir suivi toutes les étapes d'installation de [docker dev host](https://gitlab.niji.fr/niji-tools/socles/docker-dev-host)

## Environnement de dev

### Valeurs que vous voulez modifier avant le setup

Avant de réaliser le setup de votre porjet un certains nombre de variables de nommage pourront être modifiées dans
le fichier `.env.dist` afin de corespondre à votre projet.

### Setup

Pour installer le projet, exécuter la commande suivante :

#### Installer sans base
```bash
make setup
```
#### Installer avec base
```bash
TODO : import bdd ...
make update
```

#### Theme

Le theme `default` est déjà installé et défini par défaut pour le front de votre site.
Gin est le thème admin.
En local vous travaillez en mode dev. Les js, les css et les twig sont régnérés à la volée.
ESLint et stylelint sont activés. si vous utilisez Phpstorm, il est recommander d'activer --fix on save
`Settings > Languages & Frameworks > Javascript > Code quality tools > ESLint > Run eslint --fix on save`
`Settings > Languages & Frameworks > Style sheets > Stylelint > Run stylelint --fix on save`

- installer npm : `make theme-install`
- mode dev : `make theme-dev`
- mode build (si besoin désactivé le mode dev TODO) : `make theme-build`

### Autres commandes

Un certain nombre d'outils accessibles en ligne de commande sont disponible par l'intermédiaire d'un Makefile à la racine, qui peut être complété selon les besoins de chaque projet.

Pour lister l'ensemble des commandes disponibles, il suffit d'executer la commande:

```bash
make
```

Les commandes s'exécutent comme suit:

```bash
make [commande]
```
Liste des commandes par défaut:

```
 Project
 -------

build                          Build project dependencies.
kill                           Kill all docker containers.
install                        Start docker stack and install the project.
update                         Start docker stack and update the project.
setup                          Start docker stack, build and install the project.
reset                          Kill all docker containers and start a fresh install of the project.
start                          Start the project.
reset_password                 Reset the Drupal password to "admin".
update-permissions             Fix permissions between Docker and the host.
stop                           Stop all docker containers.
clean                          Kill all docker containers and remove generated files
console                        Open a console in the container passed in argument (e.g make console php)

 Utils
 -----

logs                           Show Drupal logs.
cr                             Rebuild Drupal caches.
cex                            Ecport Drupal configuration.
composer                       Execute a composer command inside PHP container (e.g: make composer require drupal/paragraphs)

 Quality assurance
 -----------------

code_sniffer                   Run PHP Code Sniffer using the phpcs.xml.dist ruleset.
security_check                 Search for vulnerabilities into composer.lock.
```
