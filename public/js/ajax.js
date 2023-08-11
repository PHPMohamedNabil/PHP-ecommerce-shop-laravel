function change_sub()
 {  
   

    var area_id = get('mem_area_id').value;

       //alert(area_id);
     var outp='';
     $.post('{url(ajax.php)}',{sub_id:area_id},function(data)
     {
      
      
      for (var i = 0; i <data.length; i++)
      {  
        outp+='<option value="'+data[i].sub_id+'"">'+data[i].sub_area_name+'</option>';
      }

       $('#sub_area_list').html(outp);

      },'json');
   

   


 }

function get_emps()
 {  
     var leader_id = get('leader').value;
           
       var sales     = get('total-sales');

          var outp='';
     $.post('{url(ajax.php)}',{leader_id:leader_id},function(data)
     {
      
      for (var i = 0; i <data.length; i++)
      { 
        outp+='<tr>';
        outp+='<td>'+data[i].emp_id+'</td>';
        outp+='<td>'+data[i].emp_name+'</td>';
        outp+='</tr>';
        $('#total-sales').html(getTeamSales(data[i].emp_id));
      }
       
       $('#data-team').html(outp);

      },'json');
   

   


 }

 function getTeamSales(emp_id)
 {
    

          var outp='';
     $.post('{url(ajax.php)}',{sales:emp_id},function(data)
     {
      
      for (var i = 0; i <data.length; i++)
      { 
        outp+='<td>'+data[i].sold+'</td>';
      }
       
       return outp;

      },'json');
   

 }

  function change()
 {    
   

    var area_id = get('mem_area_id').value;

       //alert(area_id);
     var outp='';
     $.post('{url(ajax.php)}',{sub_id:area_id},function(data)
     {
      
      
      for (var i = 0; i <data.length; i++)
      {  
        outp+='<option value="'+data[i].sub_id+'"">'+data[i].sub_area_name+'</option>';
      }

       $('#sub_area_list').html(outp);

      },'json');
   

   


 }