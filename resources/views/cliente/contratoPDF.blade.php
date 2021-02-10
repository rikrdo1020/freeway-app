<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
    @page{

      margin: 30px 10px;
    }
    header{
      font-size:18px;
      text-decoration:underline;
      font-weight:700;
      text-align:center;
      margin-bottom:10px;
    }
    .header{
      display:inline-flex;
    }
    p{
      line-height: 2.0em;
    }
    h3{
      text-decoration:underline;
      padding-bottom:30px;
    }
    .page-break {
      page-break-after: always;
    }
    .rojo{
      color:#FF0000;
    }
    </style>
    <title>Contrato</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-sm-10 mx-auto">
            
              <form action="/contratoPDF/{{$data->id}}" method="GET">
                @csrf
                
                  <div class="header">
                  <header>CONTRATO POR SERVICIO DE CURSO DE MANEJO FREEWAY</header>
                  <img src="images/freeway-logo.png" alt="logo" height=50px width=50px>
                  
                  </div>
                  

                  <p >Los suscrito a saber: <b>AYAX ALBERTO ORTEGA NUÑEZ,</b> varon, Panameño, mayor de edad, portador de la cedula de
                  identidad personar No. 8-722-627, actuando en representación de la empresa <b>FREEWAY ESCUELA DE MANEJO, S.A.</b> 
                  el <b>Sr.(a) {{$data->nombreCompleto}}</b>
                  con cédula de identidad personal <b> No. {{$data->cedula}} </b> , quien se denominará el cliente.
                  Dirección:<b> {{$data->direccion}}</b> </p>


                  <p>N° de Teléfono: {{$data->telefono}}
                  <b>DECLARAN:</b> Ambas partes convienen en celebrar este contrato el cual la empresa se compromete a bridar al cliente, un
                  servicio de capacitación y adiestramiento teórico y práctico relacionado con el aprendizaje de conducción de vehículos a
                  motor. El mismo se regirá bajo los términos y condiciones que se detallan en las siguientes cláusulas:</p>

                  
                  <p><b>PRIMERA:</b> El cliente se compromete a pagar la suma de <b>B/ {{$data->monto}}</b>; por el servicio de instrucción de manejo del
                  plan el cual escoja a continuación:
                  <b>Usted abonó la suma de: B/ {{$data->abono}}, quedando así con un pendiente de B/ {{$data->pendiente}}, y usted se compromete a</b>
                  <b> cancelarlos el día {{$data->cancelacion}}</b>. <b class="rojo">IMPORTANTE: *** El abono permitirá que
                  usted inicie únicamente las clases teóricas, para inicial la parte práctica del curso usted deberá realizar la cancelación
                  el mismo día de inicio de clases prácticas.***</b>
                  </p>
                  <p><b>CURSO DE MANEJO: </b>{{$data->tipo_curso}} <br>
                  <b>TRANSMISIÓN: </b>{{$data->transmision}} <br>

                  <b>SEGUNDA:</b> Solo se puede dar en transmisión automática o de cambio <b>(la que elijá será hasta el final).</b></p>
                

              </form>

            <div class="page-break"></div>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam eveniet harum eum ea esse doloribus temporibus ullam deserunt consequatur aut molestias, enim ad mollitia itaque corrupti exercitationem architecto repudiandae numquam cumque expedita molestiae nisi nemo facilis? Eveniet doloremque et, mollitia harum impedit pariatur consequatur labore. Sapiente, aperiam! Libero, distinctio. Alias voluptatem aliquid culpa nobis ipsum quae a omnis eos! Totam magni quis reprehenderit cum provident enim beatae deserunt asperiores sapiente consequuntur error officia, excepturi earum voluptatibus facilis atque ad quisquam tempora ea illum obcaecati eum? Delectus cum, libero explicabo aliquam possimus dolorum praesentium odio debitis. Odit sequi nisi et commodi.</p>
              
          </div>
        </div>
        
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>