# Access
## info
Les seront reforcé avec un double sécu : users.power
## Card
card.show:
- true
card.play:
- utilisateur ayant la carte en sa possesion
- utilisateur non connecteur faisant une sessions sur un theme
card.create:
- utilisateur connecter
card.update:
- createur de la carte
- admin
card.delete
- createur de la carte
- admin

## Theme
theme.show:
- true
theme.play:
- utilisateur ayant la carte en sa possesion
theme.create:
- utilisateur connecter en le créeant entemps que sous theme d'un autre (si il y a r qu'il correspond il peut le mettre dans son theme user)
- admin
theme.update:
- admin
theme.delete
- admin

## User
user.show:
- Utilisateur connecer
user.create:
- true
user.update
- lui meme
- admin
user.delete
- lui meme
- admin

## Market
### market.card:
seulement pour les personners connecter

### market.theme:
pour tout le monde, ici ou les non-connecter peuvent faire des session
m.t.get:
- connecter
m.t.play:(essay de theme)
- pour joueur connecter n'ayant pas en possesion (ne donne pas de stats dessus)
- non connecter

### market.user:
connecte
vue du market par joueur
