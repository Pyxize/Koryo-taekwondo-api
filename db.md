Pour modéliser le fait qu'une technique puisse être présente dans plusieurs poomsae, nous pouvons introduire une nouvelle table de jointure. Voici la mise à jour du schéma de la base de données en ajoutant cette relation :

### Table "poomsae":

| id |   title    |             name |
|:---|:----------:|-----------------:|
| 1  | Poomsae 1	 |  Taegeuk Il Jang |
| 2  | Poomsae 2	 |  Taegeuk Yi Jang |
| 3  | Poomsae 3	 | Taegeuk Sam Jang |

### Table "techniques": 


| id |   nameFR   |   nameKR | image |
|:---|:----------:|---------:|-------|
| 1  |  Le bras	  |      Pal |       |
| 2  | Le coude	 | Pal Koup |       |




### Table "steps":


| id | poomsae_id | step_number |
|:---|:----------:|------------:|
| 1  |     1      |           1 |
| 2  |     1	     |           2 |



### Table de jointure "poomsae_techniques":



| poomsae_id | technique_id |
|:-----------|:------------:|
| 1          |      1       |
| 1          |      2       |

Dans ce nouveau schéma, la table "poomsae_techniques" est utilisée comme une table de jointure pour représenter la relation entre les poomsae et les techniques. Chaque ligne de cette table indique qu'une technique spécifique est associée à un poomsae spécifique.

Cela permet de modéliser le fait qu'une technique puisse être présente dans plusieurs poomsae, car plusieurs enregistrements avec des combinaisons différentes de poomsae_id et technique_id peuvent exister dans la table "poomsae_techniques".

En utilisant cette structure, vous pouvez associer les techniques à plusieurs poomsae et les étapes de chaque poomsae aux techniques respectives.
