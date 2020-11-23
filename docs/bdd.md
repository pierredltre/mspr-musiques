# Documentation de la base de données

## Mocodo.net
````
ARTISTE ( artiste_id, nom )
CERTIFICATION ( certification_id, titre, date_obtention, single )
ECRIT ( chanson_id, artiste_id )
COMPOSE ( album_id, artiste_id )
EST DELIVREE A ( album_id, certification_id )
UTILISATEUR ( user_id, pseudo, mail, mdp )
AJOUTE ( user_id, chanson_id )
CHANSON ( chanson_id, nom, date_de_sortie, cover, nombre_ecoutes, genre, pays )
ALBUM ( album_id, nom, date_de_sortie, cover, nombre_ecoutes, genre, pays, single, chanson_id )
CLASSEE DANS ( classement_id, chanson_id, date_insertion )
CLASSEMENT ( classement_id, pays, genre )
```

## Dictionnaire de données

### utilisateurs (admin)
user_id
pseudo
mail
mdp

### Chansons
chanson_id
nom
date de sortie
cover
nombre d’écoutes
genre
pays

### Album
album_id
Nom 
Date de sortie
cover
nombre d'écoutes
genre
pays
single (true/false)

### Classement
classement_id
pays
genre

### Certification
certification_id
titre (or, platine, diamant)
date d’obtention
single (true/false)
