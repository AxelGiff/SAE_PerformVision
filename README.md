# Titre du projet

[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com)  [![forthebadge](http://forthebadge.com/images/badges/powered-by-electricity.svg)](http://forthebadge.com)

require __DIR__ . '/../../fichier.php'; 
require $_SERVER['DOCUMENT_ROOT'] . '/chemin/vers/fichier.php';
Perform Vision est une société dirigé par le client qui a demandé à ce qu'on lui réalise un site de prestations de régie. Faisant ses CRA sur un fichier.csv, le client,voulant un site extranet, a pu obtenir un site permettant de renseigner un CRA par mois pour différents clients en tant que prestataire.

// Exemple de tableau $_POST qui contient des périodes de début et fin
$_POST = [
    'debut' => ['2024-01-01', '2024-02-01'],
    'fin' => ['2024-01-15', '2024-02-15']
];

// On stocke les périodes dans le tableau $periods
$periods = [$_POST['debut'], $_POST['fin']];

// On boucle sur les périodes
foreach ($periods[0] as $index => $debut) {
    // Récupérer la date de début et la date de fin correspondante
    $fin = $periods[1][$index];
    
    // Afficher ou traiter les périodes
    echo "Période : Début = $debut, Fin = $fin\n";
}


## Pour commencer


### Pré-requis

Ce qu'il est requis pour commencer avec notre projet...

- Avoir tailwindcss
- Utiliser une BDD PGSQL (PgAdmin)
- Utiliser un serveur web faisant tourner PGSQL

## Fabriqué avec


* [Tailwindcss](https://tailwindcss.com/) - Framework CSS (front-end)
* [Javascript](https://developer.mozilla.org/fr/docs/Web/JavaScript) - Javascript
* [PHP](https://www.php.net/manual/fr/intro-whatis.php) - PHP



## Auteurs
Listez le(s) auteur(s) du projet ici !
* **Samia Ouchallal**
* **Fulya Rizaogly**
* **Kavusikan Thurairajasingam**
* **Moustapha Camara** 



## License

Ce projet est sous licence ``exemple: WTFTPL`` - voir le fichier [LICENSE.md](LICENSE.md) pour plus d'informations


