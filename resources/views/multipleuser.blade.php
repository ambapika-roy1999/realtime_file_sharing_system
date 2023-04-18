
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
            
             let marker;
              function initMap() {
              
               const myLatLng = { lat:22.580436364008314, lng:88.4351865968853};
                  map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 16,
                center: myLatLng,
                });
                    Echo.channel('first').listen('first_event', (e) => {
                console.log(e);
                var latitude =Number(e.lat);  
                var longitude = Number(e.lng)  ;
                var assist =[];
                var b;
                marker= new google.maps.Marker({
                position: { lat: latitude, lng:longitude},
                label:{text: e.user, color: "yellow"},
                map,
                title: "Hello World!",
              
                });
                console.log("markers",markers)
              
              
                
                  if(markers.length!=0){
                    for (let i = 0; i < markers.length; i++) {   
                      if(markers[i].user_id==e.user){   //2 is the count of no of user
                        console.log("markers[i].user_id",markers[i].user_id)
                        console.log("e.user",e.user)
                        markers[i].marker_index.setMap(null); 
                     
                       }

                       else{
                       
                         assist.push(markers[i]);
                       }

                    }  
                    
                    assist.push({"marker_index":marker, "user_id":e.user});
                   markers=assist;
                  
              
                  }
                  else{
                    markers.push({"marker_index":marker, "user_id":e.user});
                  }
                

                for (let i = 0; i < markers.length; i++) {
                  markers[i].marker_index.setMap(map);
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
   
   
