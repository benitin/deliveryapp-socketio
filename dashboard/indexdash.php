<!doctype html>
<html>
<head>
	<title>RTA</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
        <style type="text/css">
          .mini-submenu{
              display:none;  
              background-color: rgba(0, 0, 0, 0);  
              border: 1px solid rgba(0, 0, 0, 0.9);
              border-radius: 4px;
              padding: 9px;  
              /*position: relative;*/
              width: 42px;

            }

            .mini-submenu:hover{
              cursor: pointer;
            }

            .mini-submenu .icon-bar {
              border-radius: 1px;
              display: block;
              height: 2px;
              width: 22px;
              margin-top: 3px;
            }

            .mini-submenu .icon-bar {
              background-color: #000;
            }

            #slide-submenu{
              background: rgba(0, 0, 0, 0.45);
              display: inline-block;
              padding: 0 8px;
              border-radius: 4px;
              cursor: pointer;
            }
            .superpuesto{
              z-index: 100;
            }
        </style>
        <style type="text/css">
          #map {
            /*width: 80%;*/
            height: 600px;
            margin-bottom: 15px;
            border: 2px solid #fff;
            position: relative;
          }
        </style>
</head>
<body>

<div class="container">
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 superpuesto">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu" >
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <!-- 
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
 -->
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="row">
    <div class="col-sm-4 col-md-3 sidebar">
        <div class="mini-submenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <div class="list-group" id="pedidos">
            <span href="#" class="list-group-item active">
                Pedidos
                <span class="pull-right" id="slide-submenu">
                    <i class="fa fa-times"></i>
                </span>
            </span>
            <!--
            <a href="#" class="list-group-item">
                <i class="fa fa-comment-o"></i> Lorem ipsum
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-search"></i> Lorem ipsum
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-user"></i> Lorem ipsum
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-folder-open-o"></i> Lorem ipsum <span class="badge">14</span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-bar-chart-o"></i> Lorem ipsumr <span class="badge">14</span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-envelope"></i> Lorem ipsum
            </a>
          -->
        </div>        
    </div>

        <div class="col-sm-8" id='map' style='height:400px'>        
          <!--table id="messages" class='table table-striped'>
            <tr>
              <th>ROL</th>
              <th>DESCRIPCION</th>
            </tr>
          </table-->
        </div>


  </div>
</div>




  <!-- dfafda -->
 
    <!-- Socket.IO-->
    <script src="js/jquery-1.11.1.js"></script>
    <script src="socket.io/socket.io.js"></script>
    <!--script src="js/gmaps.js"></script-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnycWatbGyK6ldFqErjFtko1yeMclNUOA&amp;sensor=true"></script>
    <script>
      var socket = io('http://localhost:3001');
      var map = null
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
        /*
        <a href="#" class="list-group-item">
                <i class="fa fa-envelope"></i> Lorem ipsum
            </a>
        */
        //$('#pedidos').append($('<a href="#" class="list-group-item">').text( data.data.idCliente + '-' + data.data.idProducto  ));

        $('#pedidos').append('<a href="#" class="list-group-item">'+
          '<div class="alert alert-primary" role="alert">'+
      '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
      '<span class="sr-only">' +data.pedido.id+ '</span>'+
      '<span class="navbar-text">' +data.cliente.nombre+ '</span>'+
      '<span class="navbar-text">' +data.puntoEntrega.direccion+ '</span>'+
      '</div>'+
      '</a>')
        var position = new google.maps.LatLng(data.puntoEntrega.latitud, data.puntoEntrega.longitud);
        var marker=new google.maps.Marker({
            position:position,
          });

        marker.setMap(map);


        //$('#messages').append($('<li>').text( data.data.nombre + '-' + data.data.descripcion  ));
        /*$('#messages').append(
                $('<tr>').append( $('td').text( data.data.nombre)  )
                .append( $('td').text( data.data.descripcion ) )
            );
         */
        
        //$('#messages').append('<tr><td>' + data.data.nombre + '</td><td>' + data.data.descripcion +'</td></tr>' );
        
    })


    $(function(){

        $('#slide-submenu').on('click',function() {             
              $(this).closest('.list-group').fadeOut('slide',function(){
                $('.mini-submenu').fadeIn();  
              });
              
            });

        $('.mini-submenu').on('click',function(){   
              $(this).next('.list-group').toggle('slide');
              $('.mini-submenu').hide();
        })
      })

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
    <!-- end Socket.IO-->
</body>
</html>