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
            type: 'bar',
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

getVentas();
function getVentas()
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
          const ctx = document.getElementById('Ventas').getContext('2d');
          const myChart = new Chart(ctx, {
          type: 'doughnut',
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
    