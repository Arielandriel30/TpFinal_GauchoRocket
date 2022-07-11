getVentas();
function getVentas()
{
  const url = "/reportes/getVentas";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send();
  http.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
          let nombre = [];
          let cantidad = [];
          for (let i = 0; i < res.length; i++){
              nombre.push(res[i]['mes']);
              cantidad.push(res[i]['ventas']);
          }
          const ctx = document.getElementById('Ventas').getContext('2d');
          const myChart = new Chart(ctx, {
          type: 'pie',
          data: {
          labels: nombre,
          datasets: [{
              label: 'Ventas mensuales',
              data: cantidad,
              backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
              ],
              borderColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
      }
  }
}
 
 
 
 
 
 
 getCentros();
 function getCentros()
  {
    const url = "/reportes/getCentros";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++){
                nombre.push(res[i]['m']);
                cantidad.push(res[i]['Cantidad']);
            }
            const ctx = document.getElementById('Centros').getContext('2d');
            const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels:nombre,
            datasets: [{
                label: 'Centros Médicos Asignados',
                data: cantidad,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
        }
    }
}


  getCabinas();
  function getCabinas()
  {
    const url = "/reportes/getCabinas";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++){
                nombre.push(res[i]['TIPO']);
                cantidad.push(res[i]['Cantidad']);
            }
            const ctx = document.getElementById('Cabinas').getContext('2d');
            const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels:nombre,
            datasets: [{
                label: 'Cabinas más Pedidas',
                data: cantidad,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
        }
    }
}

$(document).ready(function(){
    $('#btnimgGrafica').click(function(){
        tomarImagenPorSeccion('reportesGraficos','reportesGraficos');
    });
});

function tomarImagenPorSeccion(div,nombre) {

	html2canvas(document.querySelector("#" + div)).then(canvas => {
		var img = canvas.toDataURL();
        const url = "/reportes/crearImagen";
		console.log(img);
		base = "img=" + img + "&nombre=" + nombre;
        
      
        
		$.ajax({
			type:"POST",
			url: url,
			data:base,
			success:function(respuesta) {	
				respuesta = parseInt(respuesta);
				if (respuesta > 0) {
					alert("Imagen creada con exito!");
				} else {
					alert("No se pudo crear la imagen :(");
				}
			}
		});
	});	
}    
    