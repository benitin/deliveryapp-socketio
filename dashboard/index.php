<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		body,html{
		    height: 100%;
		  }

		  nav.sidebar, .main{
		    -webkit-transition: margin 200ms ease-out;
		      -moz-transition: margin 200ms ease-out;
		      -o-transition: margin 200ms ease-out;
		      transition: margin 200ms ease-out;
		  }

		  .main{
		    padding: 10px 10px 0 10px;
		  }

		 @media (min-width: 765px) {

		    .main{
		      position: absolute;
		      width: calc(100% - 40px); 
		      margin-left: 40px;
		      float: right;
		    }

		    nav.sidebar:hover + .main{
		      margin-left: 200px;
		    }

		    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
		      margin-left: 0px;
		    }

		    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
		      text-align: center;
		      width: 100%;
		      margin-left: 0px;
		    }
		    
		    nav.sidebar a{
		      padding-right: 13px;
		    }

		    nav.sidebar .navbar-nav > li:first-child{
		      border-top: 1px #e5e5e5 solid;
		    }

		    nav.sidebar .navbar-nav > li{
		      border-bottom: 1px #e5e5e5 solid;
		    }

		    nav.sidebar .navbar-nav .open .dropdown-menu {
		      position: static;
		      float: none;
		      width: auto;
		      margin-top: 0;
		      background-color: transparent;
		      border: 0;
		      -webkit-box-shadow: none;
		      box-shadow: none;
		    }

		    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
		      padding: 0 0px 0 0px;
		    }

		    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
		      color: #777;
		    }

		    nav.sidebar{
		      width: 200px;
		      height: 100%;
		      margin-left: -160px;
		      float: left;
		      margin-bottom: 0px;
		    }

		    nav.sidebar li {
		      width: 100%;
		    }

		    nav.sidebar:hover{
		      margin-left: 0px;
		    }

		    .forAnimate{
		      opacity: 0;
		    }
		  }
		   
		  @media (min-width: 1330px) {

		    .main{
		      width: calc(100% - 200px);
		      margin-left: 200px;
		    }

		    nav.sidebar{
		      margin-left: 0px;
		      float: left;
		    }

		    nav.sidebar .forAnimate{
		      opacity: 1;
		    }
		  }

		  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
		    color: #CCC;
		    background-color: transparent;
		  }

		  nav:hover .forAnimate{
		    opacity: 1;
		  }
		  section{
		    padding-left: 15px;
		  }
	</style>
	
	<style type="text/css">
      #map {
        /*width: 80%;*/
        height: 750px;
        margin-bottom: 15px;
        border: 2px solid #fff;
        position: relative;
        margin: 15px 15px 15px 15px;
      }
      .fondo{
      	position: absolute;
      	width: 100%;
      	height: 100%;

      }
      .o{
      	z-index: 1000;
      	opacity: 0.8;
      	float: left;
      	overflow: auto;
      }
      .titulo{
      	position: relative;
      	text-align: center;
      }
    </style>

</head>
<body>
<nav class="navbar navbar-default sidebar o" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav" id="pedidos">
        <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <!--
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span>
          <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>

        </li>          
        <li ><a href="#">Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
        <li ><a href="#">Tags<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
        -->
      </ul>
    </div>
  </div>
</nav>

<div class="container fondo">
 <div class="row">
    <!--
 	<dir class="titulo">
 		<h2>Monitor X-Presion</h2>
	    <p>Pedidos OnLine</p>
 	</dir>
 	-->
    <div id='map'>  
     0
    </div>
 </div>
</div>

<script src="socket.io/socket.io.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnycWatbGyK6ldFqErjFtko1yeMclNUOA&amp;sensor=true"></script>
<script type="text/javascript">
	var map = null
	$(function () {
        function initMap() {
            var location = new google.maps.LatLng(-17.779278600, -63.19003490);
            var mapCanvas = document.getElementById('map');
            var mapOptions = {
                center: location,
                zoom: 16,
                panControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(mapCanvas, mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    });
</script>

<script type="text/javascript">
	  var socket = io('http://localhost:3001');
      /*$('form').submit(function(){
        socket.emit('chat message', $('#m').val());
        $('#m').val('');
        return false;
      });
      socket.on('chat message', function(msg){
        $('#messages').append($('<li>').text(msg));
      });*/
    // RTA
    socket.on("emit",function(data){
      	console.log(data)
	    /*$('#pedidos').append('<a href="#" class="list-group-item">'+
	      '<div class="alert alert-primary" role="alert">'+
	      '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
	      '<span class="sr-only">' +data.pedido.id+ '</span>'+
	      '<span class="navbar-text">' +data.cliente.nombre+ '</span>'+
	      '<span class="navbar-text">' +data.puntoEntrega.direccion+ '</span>'+
	      '</div>'+
	      '</a>')*/
	    $('#pedidos').append('<a href="#" class="dropdown-toggle" data-toggle="dropdown">' +data.cliente.nombre+ '<span class="caret"></span>'+
          '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>')
	    var position = new google.maps.LatLng(data.puntoEntrega.latitud, data.puntoEntrega.longitud);
	    var marker=new google.maps.Marker({
	        position:position,
	      });
	    marker.setMap(map);
    })
    //end RTA
</script>
</body>
</html>