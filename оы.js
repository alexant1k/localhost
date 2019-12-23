<!DOCTYPE html>
<html lang = "en">
<head>
   <meta charset="UTF-8">
   <title>Title</title>
<script src = "https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
<div style="width: 1000px; height: 300px"><canvas id="myChart" width="400" height="300"></canvas></div>
<script>
    var Z = 21
    var sinMass = [];
    var cosMass = [];
    var filterMass = [6,0,-4,-3,5,6,-6,-13,7,44,64,44,7,-13,-6,6,5,-3,-4,0,6];
    var sin = 0;
    var cos = 0;
    var A_MASS = [];

    var COUNTER =0;

    for (var N=2; N<Z;){
       for (var i = 0; i<Z-1; i++){
        sinMass.push(Math.sin((2*Math.PI/N)*i))
        cosMass.push(Math.cos((2*Math.PI/N)*i))
    }

    const sinFiltered = sinMass.map( (e) => {
    return e*filterMass[COUNTER++];
    })

    COUNER =0;
    const cosFiltered = cosMass.map ( (e) => {
    return e*filterMass[COUNTER++];
    })
    COUNER =0;
    var GLOBAL_SIN =0;
    for (var i=0; i<sinFiltered.length; i++){
    GLOBAL_SIN += sinFiltered[i]
    }
    GLOBAL_SIN = Math.pow(GLOBAL_SIN, 2)

    var GLOBAL_COS = 0;
    for (var i=0; i<cosFiltered.length; i++){
    GLOBAL_COS += cosFiltered[i]
    }
    GLOBAL_COS = Math.pow(GLOBAL_COS, 2)
     var A = Math.sqrt (GLOBAL_SIN + GLOBAL_COS)
     A_MASS.push ({"x":  2/N, "y": Math.log10(A)*20} )
     sinMass = [];
     cosMass=[];
     N +=0.1
     console.log(N)
     }
     var ctx = document.getElementById('myChart');
     var myLineChart = new Chart (ctx,{
     type: 'line',
     data: {
     data: datasets: [ {
     label: 'Grafic',
     data: A_MASS
        }]
     },
     options: {
        scales: {
          xAxes: [
          type: 'linear',
            ]}
          },
         }
         });
 </script>
 </body>
 </html>


</body>
</html>