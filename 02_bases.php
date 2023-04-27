<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Cours">
    <meta name="author" content="Lyfoung Grégory">
    <title>PHP Cours - Bases</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="01_index.php">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="02_bases.php">Bases PHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="03_variables_constantes.php">Variables et constantes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- fin navbar -->
    <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1 class="display-5 fw-bold">Bases du PHP</h1>
        </section>
    </header>
    <!-- fin header -->
    <main class="container-fluid px-5">
        <div class="row border p-5 mt-5">
            <div class="col-sm-12 col-md-6">
                <h2>1- Balises PHP</h2>
                <p>Pour ouvrir un passage en PHP, on utilise la balise <span><code>&lt;?php</code></span></p>
                <p>Pour fermer un passage en PHP, on utilise la balise <span><code>?></code></span></p>
            </div>
            <div class="col-sm-12 col-md-6">
                <h2>2- Commentaires PHP</h2>
                <p>Pour faire un commentaire sur une seule ligne, on utilise : </p>
                <ul>
                    <li><em>// commentaire</em></li>
                    <li><em># commentaire</em></li>
                </ul>
                <?php
                    // Un premier commentaire
                    # Un deuxième commentaire 
                ?>
                <p>Pour faire des commentaires sur plusieurs lignes, on utilise : </p>
                <ul>
                    <li><em>/* <br> commentaire <br> multi <br> lignes <br> */</em></li>
                </ul>
                <?php 
                    /* 
                    *commentaire multi-lignes 1
                    *commentaire multi-lignes 2
                    *commentaire multi-lignes 3
                    *commentaire multi-lignes 4
                    */
                ?>
            </div>
            <div class="col-sm-12">
                <h2>3- Extensions ".php" vs ".html"</h2>
                <p>En dehors des balises php, il est possible d'écrire du code HTML dans un fichier ayant l'extension ".php". Ce qui n'est pas possible dans un fichier ".html", cela est du au au faut que les fichiers ".php" sont traités par le serveur en tant que code PHP et peuvent inclure des instructions PHP et HTML, tandis que les fichiers ".html" ne sont pas traités comme du code PHP.</p>
                <p>Si le ficher ".php" ne contient que du script PHP, il n'est pas obligatoire de fermer la balise <span>&lt;?php</span> à la fin du script. Cependant, il est recommandé de fermer la balise afin d'éviter tous problèmes potentiels avec l'affichage du contenu HTML ou des erreurs de syntaxe si vous l'on ajoute du code HTML après les instructions PHP dans le même fichier. De plus, certains standards de codage et bonnes pratiques recommandes de fermer toutes les balises PHP pour une meilleure lisibilité et maintenabilité du code.</p>
            </div>
            <div class="col-sm-12">
                <h2>4- Affichage</h2>
                <p>Pour afficher du texte sur notre page à partir d'un script PHP, on peut utiliser : </p>
                <ul>
                    <li>L'instruction <span>echo</span> : permet d'effectuer un affichage. On peut y insérer du code HTML (ex : voir code sur VSC)</li>
                    <div class="alert alert-primary w-50">
                        <?php 
                            echo "Hello Echo World !";
                        ?>
                    </div>
                    <li>L'instruction <span>print</span> : autre instruction permettant d'effectuer un affichage. On peut aussi y inséser du code HTML (ex : voir code sur VSC)</li>
                    <div class="alert alert-primary w-50">
                        <?php 
                            print "Hello Print World !"
                        ?>
                    </div>
                    <li>Les instructions <span>var_dump()</span> et <span>print_r()</span> : permettent d'afficher du contenu mais sert principalement pour le debug. Ces deux fonctions d'affichage permettent d'analyser dans le navigateur le contenu d'une variable par exemple</li>
                </ul>
            </div>
            <div class="col-sm-12">
                <h2>5- Concaténation</h2>
                <p>En PHP, la concaténation se fait avec "<span>.</span>"</p>
                <p>Dans une première variable, on stocke le mot 'Hello' et dans une deuxième le mot 'World', afin d'afficher la phrase complète, on concatène les deux variables avec un point "<span>.</span>" (ex : voir code sur VSC)</p>
                <div class="alert alert-primary w-50">
                    <?php 
                        $word1 = 'Hello';
                        $word2 = 'World !';
                        echo $word1 . " " . $word2; // Affiche 'Hello World !'
                    ?>
                </div>
                <div class="col-sm-12">
                    <h2>6- Variables utilisateurs</h2>
                    <p>Une variable est un espace mémoire qui porte un nom et permet de conserver une valeur. Cette valeur peut être de n'import quel type.</p>
                    <p>Chaque varaible possède un identifiant particulier qui commence toujours par le caractère <span>$</span>.</p>
                    <p>Ce caractère est suivi du nom de la variable. Il existe des règles de nommage des variables en PHP.</p>
                    <ul>
                        <li>Par convention un nom de variable commence par une minuscule puis on met une majuscule à chaque mot (cammelcase)</li>
                        <li>Le nom commence par un caractère alphabétique, pris dans les ensembles [A_Z] ou [a_z] ou "<span>_</span>" (déconseillé car en PHP il existe des variables prédéfinies qui commencent par "<span>_</span>")</li>
                        <li>Les caractères qui suivent peuvent être les mêmes avec en plus l'ensemble [0_9] (jamais au début)</li>
                        <li>La longueur du nom de notre variable n'est pas limitée mais il convient d'être raisonnable, il est conseillé d'avoir des noms de variables les plus parlant possible. ex : <span>$nameClient</span> est plus parlant que <span>$x</span></li>
                        <li>Les noms de variables sont sensibles à la casse : <span>$mavar</span> et <span>$maVar</span> ne seront pas les mêmes variables</li>
                    </ul>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-4 me-5 alert alert-success">
                            <p>Les noms de variables suivants sont corrects : </p>
                            <ul>
                                <li><span>$mavar</span></li>
                                <li><span>$_mavar</span></li>
                                <li><span>$mavar2</span></li>
                                <li><span>$M1</span></li>
                                <li><span>$_123</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-4 me-5 alert alert-danger">
                            <p>Les noms de variables suivants sont interdites : </p>
                            <ul>
                                <li><span>$*mavar</span></li>
                                <li><span>$5_mavar</span></li>
                                <li><span>$mavar2+</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <h2>7- Affectation des variables utilisateurs</h2>
                <p>Affecter une variable consiste à lui donner une valeur : lorsque vous déclarez une variable vous ne lui donnez pas de type c'est la valeur que vous lui affectez qui va déterminer son type</p>
                <ul>
                    <li>$maVar1 = 75; => integer</li>
                    <li>$maVar2 = "Paris"; => string</li>
                    <li>$maVar3 = 12.5; => double</li>
                    <li>$maVar4 = true; => boolean</li>
                </ul>
            </div>
            <div class="col-sm-12">
                <h2>8- Les opérateurs  numériques </h2>
                <table  class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Opérateur</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">+</th>
                            <td>Addition</td>
                        </tr>
                        <tr>
                            <th scope="row">-</th>
                            <td>Soustraction</td>
                        </tr>
                        <tr>
                            <th scope="row">*</th>
                            <td>Multiplication</td>
                        </tr>
                        <tr>
                            <th scope="row">**</th>
                            <td>Puissance (associatif à droite)</td>
                        </tr>
                        <tr>
                            <th scope="row">/</th>
                            <td>Division</td>
                        </tr>
                        <tr>
                            <th scope="row">%</th>
                            <td>Modulo : reste de la division du premier opérande par le deuxième. Fonctionne aussi avec
                                des
                                opérandes décimaux. Dans ce cas, PHP ne tient compte que des parties entières de chacun
                                des
                                opérandes.</td>
                        </tr>
                        <tr>
                            <th scope="row">--</th>
                            <td>Décrémentation : soustrait une unité à la variable. Il existe deux possibilités, la
                                prédécrémentation, qui soustrait avant d'utiliser la variable, et la postdécrémentation,
                                qui
                                soustrait après avoir utilisé la variable.</td>
                        </tr>
                        <tr>
                            <th scope="row">++</th>
                            <td>Incrémentation : ajoute une unité à la variable. Il existe deux possibilités, la
                                préincrémentation, qui ajoute 1 avant d'utiliser la variable, et la postincrémentation,
                                qui
                                ajoute 1 après avoir utilisé la variable. </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-12">
                    <h2>9- Les opérateurs d'affectation combinés numérique</h2>
                    <p>En plus de l'opérateur classique d'affection (=), il existe plusieurs opérateurs d'affectation
                         combinés. Ces opérateurs réalisent à la fois une opération entre deux opérandes et l'affectation du
                         résultat à l'opérande de gauche.</p>
                    <table  class="table table-dark table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Opérateur</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">+=</th>
                                <td>Addition puis affectation :<br>
                                   $x += $y équivaut à $x = $x + $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                            </tr>
                            <tr>
                                <th scope="row">-=</th>
                                <td>Soustraction puis affectation :<br>
                                   $x -= $y équivaut à $x = $x - $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                            </tr>
                            <tr>
                                <th scope="row">*=</th>
                                <td>Multiplication puis affectation :<br>
                                   $x *= $y équivaut à $x = $x * $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                            </tr>
                            <tr>
                                <th scope="row">**=</th>
                                <td>Puissance puis affectation<br>
                                   $x**=2 équivaut à $x=($x)²</td>
                            </tr>
                            <tr>
                                <th scope="row">/=</th>
                                <td>Division puis affectation :<br>
                                   $x /= $y équivaut à $x = $x / $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre différent de 0.</td>
                            </tr>
                            <tr>
                                <th scope="row">%=</th>
                                <td>Modulo puis affectation :<br>
                                   $x %= $y équivaut à $x = $x % $y $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                            </tr>
                            <tr>
                                <th scope="row">.=</th>
                                <td>Concaténation puis affectation :<br>
                                   $x .= $y équivaut à $x = $x . $y<br>
                                   $y peut être une expression littérale dont la valeur est une chaîne de caractères.</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-sm-12">
                    <h2>10- Variables prédéfinies</h2>
                    <p>PHP propose toute une série de variables qui sont déjà présentes dans le langage sans que vous n'ayez à les déclarer et  accessibles à tous vos scripts. Ces variables s'écrivent toujours en majuscules et nous fournissent divers renseignements.</p>
                    <p>Nous allons voir Les variables <span>Super-globales</span> qui sont des variables prédéfinies internes et sont toujours disponibles, quelque soit le contexte.</p>
                    <p> Il est inutile de faire <span>global $variable;</span> avant d'y accéder dans les fonctions ou les méthodes.</p>
                    <table class="table table-dark table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Super-globale</th>
                                <th>Utilisation</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>$GLOBALS</td>
                                    <td>Elle contient le nom et la valeur de toutes les variables du script. Les noms de
                                        variables sont les clés du tableau qui est renvoyé par cette variable. Pour appeler une
                                        variable en particulier : <code>$GLOBALS["nomvariable"]</code>. Ce code permet de
                                        récupérer la valeur de la variable en dehors de sa zone de visibilité. </td>
                                </tr>
                                <tr>
                                    <td>$_COOKIE</td>
                                    <td>Contient le nom et la valeur des cookies enregistrés sur le poste client. Comme pour
                                        $GLOBALS, le clés de ce tableau sont les noms des cookies.</td>
                                </tr>
                                <tr>
                                    <td>$_ENV</td>
                                    <td>Contient le nom et la valeur de toutes les variables d'environnement qui changent selon
                                        le serveur utilisé. </td>
                                </tr>
                                <tr>
                                    <td>$_GET</td>
                                    <td>Elle contient les informations passées à travers un url ou un formulaire ayant la méthod
                                        GET. Dans ce cas, les clés du tableau sont le name des champs du formulaire.</td>
                                </tr>
                                <tr>
                                    <td>$_POST</td>
                                    <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la method
                                        POST. Comme pour $_GET c'est le name des input qui sera la clé du tableau. </td>
                                </tr>
                                <tr>
                                    <td>$_REQUEST</td>
                                    <td>Contient l'ensemble des de ces variables : $_GET, $_POST, $_COOKIE, $_FILES</td>
                                </tr>
                                <tr>
                                    <td>$_SERVER</td>
                                    <td>Contient les informations liées au serveur web, tel le contenu des en-têtes HTTP ou le nom du script en cours d'exécution. Retenons les variables suivantes :
                                        <ul>
                                             <li><code>$_SERVER["HTTP_ACCEPT_LANGUAGE"]</code>, qui contient le code de langue du
                                                  navigateur client.</li>
                                             <li><code>$_SERVER["HTTP_COOKIE"]</code>, qui contient le nom et la valeur des
                                                  cookies lus
                                                  sur
                                                  le poste client.</li>
                                             <li><code>$_SERVER["HTTP_HOST"]</code>, qui donne le nom de domaine.</li>
                                             <li><code>$_SERVER["SERVER_ADDR"]</code>, qui indique l'adresse IP du serveur.</li>
                                             <li><code>$_SERVER["PHP_SELF"]</code>, qui contient le nom du script en cours. Nous
                                                  l'utiliserons souvent dans les formulaires.</li>
                                             <li><code>$_SERVER["QUERY_STRING"]</code>, qui contient la chaîne de la requête
                                                  utilisée
                                                  pour accéder au script.
                                    </td>
                                </tr>
                                <tr>
                                    <td>$_SESSION</td>
                                    <td>Contient l'ensemble de nom de variables de session et leur valeur</td>
                                </tr>
                                <tr>
                                    <td>$_FILES</td>
                                    <td>Contient le nom des fichiers téléchargés.</td>
                                </tr>
                        </tbody>
                    </table>
               </div>
               </div>
            </div>
            <div class="col-sm-12">
                <h2>11- Constantes utilisateurs</h2>
                <p>Une constante permet de conserver une valeur sauf que celle-ci est invariable. C'est-à-dire qu'on ne pourra pas la modifier durant l'exécution du script. Utile par exemple pour conserver les paramètres de connexion à la BDD de façon certaines.</p>
                <p>Les constantes sont sensibles à la casse, par convention une constante s'écrit toujours en MAJ.</p>
                <p>Pour définir une constante on la fonction <span>define()</span> dont la syntaxe sera la suivante : <code>define("NOM_CONSTANTE","Value const");</code> (ex : voir code VSC)</p>
                <div class="alert alert-primary w-25">
                    <?php
                        define("CAPITALE_FRANCE","Paris"); // Déclaration de la constante 'CAPITALE_FRANCE' dans laquelle on stock la valeur 'Paris';
                        echo CAPITALE_FRANCE; // Affiche 'Paris'
                    ?>
                </div>
            </div>

        </div>
    </main>
    <footer>
        <div class="d-flex justify-content-evenly align-items-center bg-dark text-light p-3">
            <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/">Documentation PHP</a>
            <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>