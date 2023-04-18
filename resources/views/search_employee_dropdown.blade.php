<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">

	<!-- These are the jQuery extensions taken from
		bootstrap website to enable the drop down
		function of the menu bar -->
	<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
	</script>

	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js">
	</script>

	<!-- Default bootstrap CSS link taken from the
		bootstrap website-->
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


	<style>
		*{
			margin: 0; padding: 0; box-sizing: border-box;
		}
		body{
			justify-content: center;
			align-items: center;
			min-height: 100%;
		}
		.form{
			margin: 2% 20%;
		}
		.mul-select {
			min-width: 100%;
		}
		
		h1 {
			color: #fff;
		}
        .btn{
            background: #fff;
        }
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
	<div class="container-fluid bg-dark" style="min-height: 50vh;">
		<div class="text-center">
			<h1 class="pt-4" style="color: #29c94f;">GeeksforGeeks</h1>
			<h1 class="py-4">Select Multiple Options</h1>
		</div>

		<!-- These modifications are done to make the webpage
			adaptive to the screen size and automatically
			reduce the size when screen is minimized -->
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="form-group form">

					<!-- Various options in drop down menu to
						select the types of data structures
						that we need -->
					<select class="mul-select" multiple="true" id="select_box">
						<option value="1">Saikat Sarkar</option>
						<option value="2">Anushree Paul</option>
						<option value="3">Subhadip Barman</option>
						<option value="4">Ambapika Roy</option>
					</select>
                    <button class="btn">Submit</button>
				</div>
			</div>
		</div>
	</div>
    <div id="map"></div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly"
      defer
    ></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<!-- JavaScript code to enable the drop down function -->
    <script src="{{ asset('js/app.js') }}"></script> 
	<script>
		
			$(".mul-select").select2({
				placeholder: "select data-structures",
				tags: true,
			});
            let dropdownList ="";
            let first_time_entry =  false;
            let markers=[];
            let map ="";
          
          
            function initMap() {
                 const myLatLng = { lat: 22.577341409329147, lng: 88.3644464290272};
              
                 $(".btn").click(function(){
                  markers=[];
                    dropdownList =$('#select_box').val();
                    first_time_entry=true;
                        console.log(  'dropdownList',  dropdownList);
                       
                 map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 16,
                        center: myLatLng,
                    });
                    if(first_time_entry==true){
                        let task={"ids":dropdownList};
                        console.log("dropdownList",dropdownList)
                        console.log("task",task)
                        axios.post('/map_dropdowns', task)
                            .then((response) => {
                                console.log('response', response)
                                for(let i=0;i<response.data.data.length;i++){
                                    add_marker_map('nothing',response.data.data[i].latitude, 
                                    response.data.data[i].longitude, response.data.data[i].user_id)
                                }
                            });
                            console.log('markers',markers)
                            first_time_entry=false;  
                    
                    }
                 })
                  
                   
                    function add_marker_map(optional, latitude, longitude,user_id){

                      const mark=  new google.maps.Marker({
                            position: { lat: Number(latitude), lng: Number(longitude) },
                            map,
                            title: "Hello World!",
                            label:{text:String(user_id), color: "yellow"},
                        });
                        if(optional=='nothing'){

                            markers.push({"marker_index":mark, "user_id":user_id});
                        }
                        else{
                            return mark;
                        }
                    }
                    Echo.channel('first').listen('first_event', (e) => {
                        var assist =[];
                      if(markers.length!=0 && dropdownList.includes(e.user) ){ 
                        for (let i = 0; i < markers.length; i++) {   
                            if(markers[i].user_id==e.user){   
                                console.log("markers[i].user_id",markers[i].user_id)
                                console.log("e.user",e.user)
                                markers[i].marker_index.setMap(null); 
                            
                            }

                            else{
                            
                                assist.push(markers[i]);
                            }
                           
                        }  
                         markers=assist;


                        markers.push({"marker_index":add_marker_map(null,e.lat, e.lng, e.user), "user_id":e.user});
                        console.log('event marker', markers)
                        for (let i = 0; i < markers.length; i++) {
                            markers[i].marker_index.setMap(map);
                        }

                      }

                    });
            }
          

            window.initMap = initMap;
            
		 
	</script>
</body>

</html>
