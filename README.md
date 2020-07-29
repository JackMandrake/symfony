# S01E01 − Exercice PHP/POO/MVC

## Traitement d'une requête

### Objectifs

- **Analyser le code fourni** (code procédural, c'est-à-dire à base de fonctions, sans programmation objet).
  - **Commenter le code**, les fonctions utilisateurs et les fonctions PHP natives.
- **Convertir le code en PHP Objet**.

### Exécuter le code

Rendez-vous dans le dossier sous `localhost`, les URLs existantes sont :

- Afficher la page d'accueil : `/` (ou `/index.php`)
- Afficher la page contact : `/?page=contact` ou `/index.php?page=contact`
- Afficher la page API : `/?page=api` ou `/index.php?page=api`
- Afficher une 404 : `/?page=` ou `/?page=azerty`

### Exercice : Analyse

> :hand: Prenez quelques minutes pour analyser de code source de votre côté. Ajoutez vos commentaires. Si vous avez besoin d'aide, vous pouvez suivre le document [Support Analyse](README-Support-Analyse.md). Nous utiliserons ce document pour faire cette analyse ensemble

### Exercice : Conversion en POO

Nous allons maintenant nous demander comment convertir cela en programmation orientée objet. Quelles classes seront nécessaires ? Comment refactoriser le code actuel ?

> :hand: Prenez quelques minutes pour **recenser les différentes classes possibles** ainsi que leurs méthodes. Vous pouvez [vous aider du schéma MVC](https://github.com/O-clock-Alumni/fiches-recap/blob/master/gestion-projet/modele-vue-controller.md#le-front-controller). Une fois que ça vous semble cohérent, **ouvrez le spoiler ci-dessous** pour comparer. Utilisez les classes du spoiler ou les vôtres.

<details>
    <summary>Spoiler : classes possibles</summary>

- `App` ou `FrontController`
- `Controller`
- `Model`
- `View`

On pourrait y ajouter

- `Router`
- `Dispatcher`

Mais par souci de simplicité, nous mettrons ceux deux-là dans `App`.

</details>

**_Ensuite_**

- **Convertir le code actuel** avec les dites classes.

Processus : 

- **Déplacer les fonctions** une à une dans la classe ciblée.
- **Tester l'appli** régulièrement en modifiant _le minimum de code_.
- **Recommencer** jusqu'à ce que le fichier `functions.php` soit vide.