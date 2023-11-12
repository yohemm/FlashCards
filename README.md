# FlashCard
    Les cartes sont répertorier dans un theme

    Un theme peut être le sous theme d'un autre(en empechant les boucles, si les themes parant est deja dans les registres des sous-theme on passe au suivant)


    Des qu'on aborde une notion importante d'un sujet, on trouve une ou des question sur celui-ci et on en fait une flashCard

    Lors d'une partie:
    Le joueur choisit un ou plusieur themes, ce qui inclu leur sous themes

    Chaque bonne réponse incrémente cela change les taux de reussit de la carte, se qui influe sur le sa recommandation

## To DO List
### To Do
#### MVP
- Page de creation de card
- Reflexion et documentation du style du site(Matteo)
- Strucutre définitive des Tables du projet(Matteo)
#### Dans un avenir proche
- Page de Connexion (Matteo)
- Creation du schema de BBD (Matteo)
- MiddleWare de connexion
- market de Theme
#### A y pensé
- admin
- market de cards uniquement

### In Progress
- Routing
- CRUD:
    - card
    - user

### Done

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

### BDD
---
#### Migration
```sh
php artisan make:migration createNamesTable
```
fichier migration dans /database/migrations/...create_names_table
```php
 public function up(): void
{
    Schema::create('names', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->string('question');
        $table->string('answer');
        $table->string('explication');
        $table->float('ratio'->nullable());
        $table->integer('nb_try')->nullable();
        $table->foreignId('owner_id')->constrained('users');
    });
}

 public function down(): void
{
    Schema::dropIfExists('names');
}
```
__Rea=lation 1 n__
```php
 public function up(): void
{
    Schema::create('nameToBeJoins', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
    Schema::table('nameWithFuturFK', function (Blueprint $table){
        $table->foreingIdFor(NameToBeJoin::class)->constrained()->cascadeOnDelete();
    });
}
 public function down(): void
{
    Schema::dropIfExists('nameToBeJoins');
    Schema::table('nameWithFuturFK', function (Blueprint $table){
        $table->dropForeingIdFor(NameToBeJoin::class);
    });
}

```
__Rea=lation n à n__

conviention nomage des tables intermédaire de liaision au sigulier
```php
 public function up(): void
{
    Schema::create('tableas', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
    Schema::create('tablebs', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
    Schema::create('tablea_tableb', function (Blueprint $table) {
        $table->foreignIdFor(TableA::class)->constrained()->cascadeOnDelete();
        $table->foreignIdFor(TableB::class)->constrained()->cascadeOnDelete();
        $table->primary(['tablea_id','tableb_id']);
    });
}
 public function down(): void
{
    Schema::dropIfExists('nameToBeJoin');
    Schema::table('nameWithFuturFK', function (Blueprint $table){
        $table->dropForeingIdFor(NameToBeJoin::class);
    });
}

```

---
#### Model

```sh
php artisan make:Model Name
```

Model dans /app/Models/Name.php

---
#### Manipulation de Model

__Creation__
```php
$model = new Model();
$model->atr = 'val';
$model->save();

$model = Model::create([
    'param1' => 'Value1',
    'param2' => 'Value2',
    'param3' => 'Value3',
])
```
/!\ pour utiliser la méthode static vous de configurer le Model a fin de definir les parametre creable de cette facon:
```php
class Model extends Model
{
    use HasFactory;
    protected $fillable = [
        'actParam',
        ...
    ];

    protected $quarded = [
        'id',
        ...
    ];
     
    // référence n->1
    public function fkname () {
        return this->belongsTo(fkname::class)
    }

    // référence 1->n
    public function fknames () {
        return this->hasMany(fkname::class);
    }

    // référence ->n
    public function fknames () {
        return this->belongstoMany(fkname::class);
    }
}
```

---
__Recherche__
```php
$myCollec =  Model::all();//genere une Collection tous les objs
$myCollec =  Model::all([params]);//
$myCollec =  Model::find($id,[params]);//trouve automatiquement
$myCollec =  Model::findOrFail($id,[params]);//trouve automatiquement ou envoi err 404
$myCollec =  Model::paginate(1,[params]);//Cree un pagination commencant a n (ici 1)
$myCollec =  Model::query([params])->where('id', 1)->frist();//
$myCollec->first();//Les collections, a l'instart des liste traditionneles peuvent avoir des fonction
$myCollec->first()->fkname->fkattr //Accede a une référence si Laison fait dans le model "Model" et jointure effectuer en migration (n->1)
$myCollec->first()->fknames->fkattr // (1->n)
$myCollec->first()->fknames->isEmpty() // retourn un boolean 1:si pas de réf
Model::has('fkname', '>=', 1) // tout les models ayant au moins une référence


$myCollec->where()

$myCollec = Model::with('fkname').get(0); // tous les model qui on jointure avec fkname
```
permet creer un systeme de page trés simplement en générant un post page, si on l'associe a un id dans l'url cela adapte la page

---
__Update__

```php
$join = Join::find(1);

$model = Model::find(1);
$model->param = 'newVal';
//  join / joins = Model / Models associer a un table via références
$model->join()->associate($join);//jointure
$model->joins()->createMany([// IL faut impérativement remplir la parti fillable du model
    [
    'attr'=> 'val'
    ]
])
$model->joins()->detach([1,3,4])// en parametre id ou lists d'id a dissocier
$model->joins()->attach(0)// en parametre id ou lists d'id a associer renvoi une erreur si deja assicier
$model->joins()->sync([0,8,12])// associe les valeurs en parametre et dissacocie tous les autres
Medel::save();


Model::query()->where('param', "<=", 2)->update();
```
---
__Delete__

```php
$model = Model::find(1);
$model->delete();


Model::query()->where('param', "<=", 2)->delete();
```