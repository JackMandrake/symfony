### Besoins #1

#### Intercepter une requête

> :hand: Via le protocole HTTP, la _matière première_ est **la requête**. Nous devons nous appuyer dessus pour identifier l'action à effectuer.

- Quelle(s) fonction(s) s'occupe(nt) de ça ?


#### Appeler la page correspondante

> :hand: Une fois la requête interceptée, on passe la main à une fonction qui va se charger d'exécuter la fonctionnalité attendue..

- Quelle(s) fonction(s) s'occupe(nt) de ça ?


#### Renvoyer une réponse

> :hand: L'objectif final de toute requête HTTP est le retour d'une réponse. Générons et affichons cette réponse. Selon son format, la réponse  définie un _Content-Type_ adapté (HTML, JSON, etc.).

- Quelle(s) fonction(s) s'occupe(nt) de ça ?

### Besoins #2

#### Gestion des erreurs

> :hand: La gestion des erreurs ou cas limites doit toujours être prise en charge à chaque nouveau code ajouté. Ici on a deux cas d'erreurs générant une 404. Le _status code_ adéquat doit être fourni à la réponse.

- Quelle(s) fonction(s) s'occupe(nt) de ça ?

#### Affichage des données

> :hand: En général les données sont stockées indépendemment du code qui les manipule. Nous aurons des fonctions d'accès aux données qui nous permettent de la manipuler pour pouvoir les afficher par exemple.

- Quelle(s) fonction(s) s'occupe(nt) de ça ?
