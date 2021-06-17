<?php global $current_user_id; ?>
<?php require "./treatment/carte/connection.php";?>
<?php $current_user_id = 2; // Todo : Rendre Dynamique La recuperation de l'ID User ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <title>Trouver un partenaire</title>
    <style>
    #map{
        height:400px;
        width:100%;
    }
    
    </style>
    </head>
    <body>
    <?php require "./partials/header.php";?>
    <?php $reponse_current_user = $bdd->query("SELECT * FROM users WHERE user_id=".$current_user_id); ?>
     <?php while ($donnees = $reponse_current_user->fetch()) : ?>
        <?php $current_user = $donnees; ?>
    <?php endwhile; ?>
    <?php $search_users = array(); ?>
    <?php $reponse_search_users = 
        $bdd->query("SELECT * FROM users WHERE niveau='".$current_user['niveau']. "' AND user_id <> ".$current_user['user_id']); 
    ?>
    <?php while ($donnees_users = $reponse_search_users->fetch()) : ?>
        <?php $search_users[] = $donnees_users; ?>
    <?php endwhile; ?>
    <?php var_dump($reponse_search_users); ?>
    

    <h1>My Google Map</h1>
    <div id="map"></div>
    amateur novice experimenter 
   
    <script>
        var map;
        var marker_current;
        
        function initMap(){
            var options = {
                zoom:11,
                center:{lat:<?php echo $current_user['lattitude']; ?>,lng:<?php echo $current_user['longitude']; ?>}
            }
            var image = {
                url: 'http://www.ssglobalsupply.com/images/location-contact.png',
                // This marker is 100 pixels wide by 100 pixels high.
                size: new google.maps.Size(100, 100),
            };
            map = new google.maps.Map(document.getElementById('map'), options);
            
            const marker_current = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $current_user['lattitude']; ?>,<?php echo $current_user['longitude'];?>),
                map: map,
                icon: image
                
                
                
            });
            
            var infowindow = new google.maps.InfoWindow;
            var marker, i;
            var locations = [ 
            <?php for ($i = 0 ; $i < sizeof($search_users); $i++) { ?>
            ["<?php 
                echo $search_users[$i]['adresse']; ?>",<?php echo $search_users[$i]['lattitude']; ?>,<?php echo $search_users[$i]['longitude']; 
                ?>, 
            1],
            <?php } ?>
            ];
            
             for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1],locations[i][2]),
                    map: map
                    
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
         return function() {
             infowindow.setContent(locations[i][0]);
             infowindow.open(map, marker);
         }
    })(marker, i));
            }
            
        }
      /* window.map=map; */
    </script>

    </body>

    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIgBvOBH4VwLuRlNbHyoTKyWL-tS65XvI&callback=initMap">
    google.maps.event.addDomListener(window,'load', initMap);
    </script>
    <?php require "./treatment/carte/load.php";?>
    <?php require "./partials/footer.php";?>
    
</body>
</html>