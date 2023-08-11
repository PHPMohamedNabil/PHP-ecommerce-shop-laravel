$(function(){
   $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

           Chart.defaults.global.responsive = true;
 
         /*Get Ajax Data*/
        
         
       $.get('/chart/',{order_month:'order_month'},function(data){
              
          months   =["zero","January", "February", "March", "April", "May", "June", "July","Aug","Sep","Oct","Nov","Dec"];
          num_order=[];
          month    =[];
         
             //alert(obj);

           for(var i in data)
           {   
                num_order.push(data[i].money/1000);
                month.push(months[data[i].month]);

           }
           
            var ctx = $("#dashboard-order-chart").get(0).getContext("2d");

        var options = {
        bezierCurve: false,
        pointDotRadius : 8,
        datasetStroke : true,
        datasetStrokeWidth : 2,
        scaleGridLineColor : "rgba(0,0,0,.05)",
        scaleFontColor: "#666",
        scaleLineColor: "rgba(0,0,0,0)",
        scaleShowVerticalLines: false,
        scaleShowGridLines : true,
        scaleOverride: false,
        scaleSteps: 10,
        pointDotStrokeWidth : 2,

    }

    var data = {
        labels:month,
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(0,177,106,0.3)",
                strokeColor: "rgba(0,177,106,1)",
                pointColor: "#FFF",
                pointStrokeColor: "rgba(0,177,106,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data:num_order
            }
        ]
    };

    
    var myLineChart = new Chart(ctx).Line(data, options);

       });
      
       /*End Ajax Data*/


      
    });

