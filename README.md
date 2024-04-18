# projet_spa


La fonction filtrerPresences($presences) est définie. Cette fonction est utilisée pour filtrer les présences en fonction des critères définis dans la session. Les critères de filtrage sont stockés dans $_SESSION["affichePresence"], et les présences sont filtrées en fonction de ces critères. Si un critère de filtrage est vide, il est ignoré.
<!-- ------------------------------------------------------------------------------------- -->
Dans la ligne $listeFiltre = array_filter($presences, 'filtrerPresences');, la fonction array_filter() est utilisée pour filtrer les présences en utilisant la fonction filtrerPresences() que nous avons définie précédemment. Cela crée une nouvelle liste de présences qui correspondent aux critères de filtrage définis dans la session.

Ensuite, le nombre total de pages est calculé en divisant le nombre total d'éléments filtrés par le nombre d'éléments par page ($eleByPage). La fonction ceil() est utilisée pour arrondir le résultat à l'entier supérieur, car il peut y avoir une fraction de page supplémentaire.

Ensuite, le numéro de la page actuelle ($pageEtu) est vérifié pour s'assurer qu'il est dans les limites acceptables. S'il est inférieur à 1 ou supérieur au nombre total de pages, il est réinitialisé à 1.

Ensuite, l'indice de l'élément de départ sur la page actuelle ($eleDeb) est calculé en utilisant la formule ($pageEtu - 1) * $eleByPage. Cet indice est utilisé pour déterminer quels éléments doivent être affichés sur la page actuelle.

Enfin, la liste des étudiants à afficher sur la page actuelle ($etudiantsPage) est obtenue en utilisant la fonction array_slice() pour extraire les éléments de la liste filtrée qui correspondent à la page actuelle, en commençant par l'indice $eleDeb et en récupérant $eleByPage éléments.

Ensuite, la variable $presence est mise à jour pour contenir les étudiants à afficher sur la page actuelle. Toutefois, la ligne $presence = listPresence(); est inutile car la valeur de $presence est écrasée juste après.

Enfin, il y a une vérification pour voir si une recherche a été effectuée. Si c'est le cas, la liste de présence est mise à jour en conséquence en utilisant la fonction recherche() avec le terme de recherche récupéré depuis $_POST["search"].