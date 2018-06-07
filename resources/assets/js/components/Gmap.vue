<template>
  <div>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="myMap"/>
    <input id="lat" type="hidden">
    <input id="lng" type="hidden">
  </div>
</template>

<script>

export default {
  name: 'Gmap',
  data: function () {
    return {
      map: {},
      marker: {},
      latLng: {lat: 14.617290, lng: 121.059311}
    }
  },
  mounted () {
    this.initialize()
    this.onClickMap()
  },
  methods: {
    onClickMap () {
      var map = this.map
      var marker = this.marker
      google.maps.event.addListener(map, 'click', function (event) {
        var lat = event.latLng.lat()
        var lng = event.latLng.lng()
        marker.setMap(null)
        marker = new google.maps.Marker({
          position: (new google.maps.LatLng(lat, lng)),
          map: map
        })
        $('#lat').val(lat)
        $('#lng').val(lng)
        marker.setMap(map)
      })
    },
    initialize () {
      var map = new google.maps.Map(document.getElementById('myMap'), {
        center: this.latLng,
        scrollwheel: false,
        zoom: 16
      })
      var marker = new google.maps.Marker({
        position: this.latLng,
        map: map
      })
      marker.setMap(map)

      // Create the search box and link it to the UI element.
      var input = document.getElementById('pac-input')
      var searchBox = new google.maps.places.SearchBox(input)
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input)

      // Bias the SearchBox results towards current map's viewport.
      map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds())
      })

      var markers = []
      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces()

        if (places.length == 0) {
          return
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
          marker.setMap(null)
        })
        markers = []

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds()
        places.forEach(function (place) {
          if (!place.geometry) {
            console.log('Returned place contains no geometry')
            return
          }
          var icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          }

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            position: place.geometry.location
          }))

          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport)
          } else {
            bounds.extend(place.geometry.location)
          }
        })
        map.fitBounds(bounds)
      })
      this.map = map
      this.marker = marker
    }
  }
}
</script>
<style scoped>
  #myMap {
    height: 300px;
    width: 100%;
  }
  #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
  }

  #infowindow-content .title {
    font-weight: bold;
  }

  #infowindow-content {
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }

  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
  }
  #target {
    width: 345px;
  }
</style>
