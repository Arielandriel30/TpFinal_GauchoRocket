<body class="w3-container w3-padding" style="background-image: url('assets/img/img1.png')">
<header class="w3-container desplazar w3-padding" style="background-image: url('assets/img/img1.png')">Completar Datos para el Registro</header>
<link rel="stylesheet" href="assets/styleprincipal.css">
<div>
<form id="form" action="/register/validate" target="_parent" method="POST" class="topBefore desplazar">
		

         <input id="email" type="text" placeholder="Email" name="email"><br>
         <input id="user" type="text" placeholder="Usuario" name="usuario">
		 <select name="type" >
   		 <option value="1">Admiminstrador</option>
    	 <option value="0">Cliente</option>
		 </select><br>
		 <input id="messager" name="pass" type="password" placeholder="Contraseña"></input><br>

         <input id="submit" type="submit" value="REGISTRAR">
  
</form>
</div>