
   <html>
        <head>
          <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

          <style>
                  /* 
 * Always set the map height explicitly to define the size of the div element
 * that contains the map. 
 */
#map {
  height: 100%;
}

/* 
 * Optional: Makes the sample page fill the window. 
 */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
          </style>
          
        </head>
          <body>
            <div id="map"></div>
            <script
              src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly"
              defer
            ></script>
              <script src="{{ asset('js/app.js') }}"></script> 
              <script>
             let map;
             let markers = [];
              function initMap() {
              
               const myLatLng = { lat:22.528630356444676, lng:88.26102639082445};
                  map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 16,
                center: myLatLng,
                });
                    Echo.channel('first').listen('first_event', (e) => {
                console.log(e.lat);
                var latitude =Number(e.lat);  
                var longitude = Number(e.lng)  ;
                if(markers.length!=0){
                 
                  markers[0].setMap(null);
                  markers = [];
                  console.log("markers.length",markers[0])
                }
                const marker= new google.maps.Marker({
                position: { lat: latitude, lng:longitude},
                label:{text: "USER", color: "yellow"},
                map,
                title: "Hello World!",
              
                });
                markers.push(marker);
                for (let i = 0; i < markers.length; i++) {
                  markers[i].setMap(map);
                }
              });
                 
  
// function abc(lat,lng){

//   new google.maps.Marker({
//     position: { lat: lat, lng:lng },
//     map,
//     title: "Hello World!",
//   });
// }
}

window.initMap = initMap;

              </script>
        </body>
   </html>
   
   
