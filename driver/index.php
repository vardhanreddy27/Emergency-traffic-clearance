
<!DOCTYPE html>
<html>
    <head> 
        <title>directions</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <style type='text/css'>body{margin:0;padding:0;overflow:hidden;font-family:'Segoe UI',Helvetica,Arial,Sans-Serif}</style>
    </head>
    <body>


<?php




include '../dbconfig.php';
$cookie_name = "suser";
 

if(!isset($_COOKIE[$cookie_name])) 
    {
     echo "Cookie named '" . $cookie_name . "' is not set!";
    } else 
    {
     //echo "Cookie '" . $cookie_name . "' is set!<br>";
     //echo "Value is: " . $_COOKIE[$cookie_name];
$id=$_COOKIE[$cookie_name];//cookie value will come from this code

$org=$_POST["org"];
$dest=$_POST["dest"];
$sql = "insert into loc(org,dest,id) values('$org','$dest','$id')";
if($conn->query($sql) === TRUE)
{





}
else
{echo "error".$conn->error;}

}



//echo $org;
//echo $dest;









 ?>
        <div id='printoutPanel'></div>
        
        <div id='myMap' style='width: 100vw; height: 100vh;'></div>
        <script type='text/javascript'>
            function loadMapScenario() {
                var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                    /* No need to set credentials if already passed in URL */
                    center: new Microsoft.Maps.Location(12.933397, 77.6929205),
                    zoom: 12
                });
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    if (directionsManager.getAllWaypoints().length < 2) {
                        directionsManager.clearAll();
var seattleWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $org;?>' });
                directionsManager.addWaypoint(seattleWaypoint);
                  var seattleWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $dest;?>' });
                directionsManager.addWaypoint(seattleWaypoint);
                    }
                    // Insert a waypoint
                    directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({  }), 1);
                    // Set the element in which the itinerary will be rendered
                    directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('') });
                    directionsManager.calculateDirections();
                });
                
            }
        </script>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Aqn-jmPL7tquRgpODqTzIyEfuuiF6mYWedixTrf4_MLAlmtlpN1IzedzI6_9fBUI&callback=loadMapScenario' async defer></script>
   </body>
</html>
