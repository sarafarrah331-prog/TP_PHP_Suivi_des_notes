<hr>
<footer>
    <?php
    
    echo "<p>Date du jour : " . date("d/m/Y") . "</p>";
    $aujourdhui = new DateTime(); 
    $finSemestre = new DateTime("2026-06-30"); 
    $diff = $aujourdhui->diff($finSemestre); 
    echo "<p>Il reste " . $diff->days . " jours avant la fin du semestre (30/06/2026)</p>";
    $jour_test = 31;
    $mois_test = 2;
    $annee_test = 2026;
    
    echo "<p>Test date : $jour_test/$mois_test/$annee_test : ";
    if (checkdate($mois_test, $jour_test, $annee_test)) {
        echo "Date valide</p>";
    } else {
        echo "Date invalide ! (fevrier ma fihch 31)</p>";
    }

    if (checkdate(2, 28, 2026)) {
        echo "<p>Test 28/02/2026 : Date valide</p>";
    }
    ?>
    <p>&copy; TP PHP - 2026</p>
</footer>
</body>
</html>