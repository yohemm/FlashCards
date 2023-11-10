# FlashCard
    Les cartes sont répertorier dans un theme

    Un theme peut être le sous theme d'un autre(en empechant les boucles, si les themes parant est deja dans les registres des sous-theme on passe au suivant)


    Des qu'on aborde une notion importante d'un sujet, on trouve une ou des question sur celui-ci et on en fait une flashCard

    Lors d'une partie:
    Le joueur choisit un ou plusieur themes, ce qui inclu leur sous themes

    Chaque bonne réponse incrémente cela change les taux de reussit de la carte, se qui influe sur le sa recommandation

## To DO

### MVP
- CRUD
- Ajouter les Foreign Key dans la creation de bd (Matteo)
- Page de creation de card
- Page de Connexion (Matteo)
### Impératif
- Insertion psql (Matteo)

### Dans un avenir proche
- Creation du schema de BBD (Matteo)
- MiddleWare de connexion
- market de Theme
### A y pensé
- market de cards uniquement

## Aide Laravelles
### Bases
get => recevoir url
post => envoyer
dump <==> varDump (de laravel)
#### Architecture directory
    /
    |-> CONCEPTION : information sup. sur le projet
    |->app
        |->Http
            |->Controllers : Les controllers
            |->MiddleWare : Les middleWare
    |->public : fichier qui run laravels
    |->ressources
        |->views : page PHP
        |->css : ressources CSS
        |->js : ressources js
    |->routes : Les différentes routes
    |->storage : stockage dynamic(contient des fichiers en rapport avec les DB)
    |->tests : test unitaire
    |->vendor : packet installer
    |->.env : config environement
    |-> artisan : app php config
    |-> composer : app d'installation de paquets
### Route
#### Simple
Methode :
```php
Route::get('/link',[Controller:class, 'methodes'])
```
Exemple :
```php
Route::get('/bonjour',[Controller:class, 'index'])
```

#### Most Complexe
Methode : 

```php
Route::prefix('/root')->group(function(type $param, Request $request){
    Route::get('/', function (type params){
        return route('other', ['id'=>1, 'slug'=>'some-text']);
    })->name('index');

    Route::get('/{slug}-{id}', function (type params){
        return 'card :'.$slug."   ".$id ."    ". $request->input('name', 'Inconnue');
    })-> where([
        "id"=> 'regex', 
        "slug"=> 'regex'
    ])->name('other');


})->name('root');
```
Exemple :
```php
Route::prefix('/card')->Controller()->group(function(){
    Route::get('/', function (Request $request) {
        return "<a href='".route('front',["id"=>1, "slug"=>"new-test-mgl"])."'>a</a>";
    })-> name('index');

    Route::get('/{slug}-{id}', function (string $slug, string $id, Request $request) {
        return 'card :'.$slug."   ".$id ."    ". $request->input('name', 'Inconnue');
    })-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('front');

    Route::get('/{slug}-{id}/back', function (string $slug, string $id, Request $request) {
        return 'card : voici le back'. $request->input('name', 'Inconnue');
    })-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('back');

})->name('card');
```
#### Route pour controller de groupe

Methode : 


```php
Route::prefix('/root')->controller(FlashCardController::class)->group(function(){

    Route::get('/', 'index')-> name('index');
})->name('card');
```
### View
Views (dans ressource) => écriture en BladePHP 
```php
<h1>{{ $name }}<h1> #Contre injection js
<h1>{ $name }<h1> #laisse tou passe
```



### Controller
```php
public function name()
{
    return view('view'), ['name'=>'JeanMi']
}
```
Un controlleur sert a regroupper les fonctions des Routes par catégories
Autrement dis:
- code plus lisible dans Route
- code mieux regroupper, 1 controlleur == toutes les pages autoure d'une mécanique


### Injection de dépendance
Route:
```php
Route::get('/link/{user}',[Controller:class, 'methodes'])
```
View:
```php
<h1>{ $name }<h1> #laisse tou passe
```
Controller:
```php
public function name(User $user)
{
    return view(
        'view',
        ['name'=>$user->name]
        );
}
```
