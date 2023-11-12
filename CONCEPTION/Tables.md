# Table
## users
name : string
power : int // donne des access, marche sur un format binaire (ex : 1+2+4+8 //card systeme + market + creation user simple + management des access)
password : string
email : string

## cards
question : string
answer : string
explication : string
owner : user

calculer :
pourcentage globale de reussite
nb_essaye_total

## themes
description : string

## users_cards
ration : float
poderate_ration : float
nb_try : integer

## themes_subthemes

## themes_cards

# View

## Cards_stats
question : string
answer : string
explication : string
owner : user
globale_ration : float // pourcentage de reussite de tous les joueurs (calculer)
nb_essaye_total : float // pour tous les joueurs (calculer )

## Themes_stats
description : string
nb_sub_themes : int (calculate)
nb_direct_cards : int (calculate)
nb_cards : int (calculate)
nb_users : int (caculate)
ratio_global : float (calculate)
nb_try_global ; int // nombre de cartes essayes par touts les joueurs (calculer)

## Users_stats
name : string
password : string
email : string
nb_cards : int (calculate)
nb_themes : int (calculate)
ratio_global : float (calculate)
nb_try_global : int (calculate)


