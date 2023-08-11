/**
*Javascript functions file
* by:Mohamed_Nabil
* email: mohamedn085@gmail.com
*/

      // Hide one item
  
    function Hide(id)
    {
       var elem=document.getElementById(id);

       return elem.style.display='none';

    }

    function Show(id)
    {
      var elem=document.getElementById(id);
        
      
      return elem.style.display='block';
   }

  // slider content 

   function ShowHide(id)
   {   
      var content=document.getElementById(id);
       
       if (content.style.display ==='none')
       {   
       	
           return content.style.display='block'; 
       }
       
       else{

       	   return content.style.display='none'; 
       }   

  

   }

   function classToggle(id,className,replace)
   {
       var elem=document.getElementById(id);

       if (elem.className == className)
       {
          elem.className=replace;
       }

       else
       {
       	elem.className=className;
       }

   }
   
   function SlideToggle(id)
   {  
   	  var content=document.getElementById(id);
       content.style.transition='all 8s ease-in-out';
       
         
       if (content.style.display ==='none')
       {   

           
           content.style.transform='scaleY(2)';
           content.style.display='block';
       }
       
       else{

       	   return content.style.display='none'; 
       }   

  
   	     

   }
    
    var fliped = false;
   function FlipToggle(id,speed)
   {   

       elem=document.getElementById(id);
       
       var speed  = parseInt(speed);
       
        

       	  elem.style.transition='transform'+' '+speed+'s'+' '+'ease-in-out';
       
         
        
             if (!fliped)
             {   
             	fliped=true;
                return elem.style.transform = 'rotateX(180deg)';
             }
             else{
             	fliped=false;
           
             	return elem.style.transform = 'rotateX(360deg)';
             }
          
        

   }
   
  function FullWidth(id,speed){

  	  elem=document.getElementById(id);
  	
      speed=parseInt(speed);
  	  elem.style.transition='all'+' '+speed+'ms'+' '+'ease-in-out';
  	  elem.style.transform='scale(1)';

  	 
 
  	  
  }

  function closer(elem){
  	 	elem=document.getElementById(elem); 
        elem.style.transform='scale(0)';
  	  
  }

  function get(elem){
     return document.getElementById(elem);
  }
  
  function getAttr(elem,attr){
     return document.getElementById(elem).getAttribute(attr);
  }

  function setRandomColor()
  {
      var words='012AB3D459AB678CD012EF'.split('');
      
      var color='#';
          
          for (var i = 0; i <6; i++) {
             
             color += words[Math.round(Math.random()*15)];
          }

     return color;
  }

  function css(element,nstyle,newvalue)
  {
     elem=document.getElementById(element);
      
       elem.style.nstyle=newvalue;


  }

  function RedirctTo(loc,time=0) {
    time=parseInt(time);
    setTimeout(function(){
      return window.location.href=loc;
    },time);
    
}

function windowlocation(loc,width=500,height=470){
    var myWindow = window.open(loc,"",`width=${width},height=${height}`);
}

function uploadFileNum(id)
{
    elem=get(id);

    return elem.files.length


}
 
function fadeIn(id,time)
{  

  var elem=get(id);
   
   elem.style.opacity=0;
   elem.style.display='block';
  
  var startfade=0;

  var time=parseInt(time);
  
  var action= setInterval(function(){
      var opacity=parseInt(elem.style.opacity);
       
        if (opacity < 1 && startfade<1)
        {  
           startfade+=.1; 
           elem.style.opacity=startfade;
           

        }
        
      
   },time);
    if (startfade === 1)
       {
        clearInterval(action);
       }

}

function readFile(file,id='')
{
    var newFile=get(file);

    if (uploadFileNum(file)>=1)
    {
       var reader = new FileReader;

       reader.onload=function(e){
        get('form').style.backgroundImage='url('+e.target.result+')';
        get('form').style.backgroundRepeat='no-repeat';
        get('form').style.backgroundSize='100% 100%';
        //get(id).setAttribute("src",e.target.result);
          var img = new Image();
          img.src = e.target.result;
          img.onload = function(){
            get('width').setAttribute("value",img.width);
           get('height').setAttribute("value",img.height);
           console.log(img.width);
          } 
       }
       reader.readAsDataURL(newFile.files[0]);
       //newFile.style.display='none';
       get('para').style.visibility='hidden';
       get('form').style.border='none';

    }
}
  

 function countDown(time)
 {
  // Set the date we're counting down to
 var countDownDate = new Date(time).getTime();

// Update the count down every 1 second
  var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML =hours + ":"
    + minutes + ": " + seconds + " ";
    if (distance < 0) {
        stop_time(x);
        document.getElementById("demo").innerHTML = "تم انهاء الوقت";
    }
    // If the count down is over, write some text 

}, 1000);
     
     return x;

 }

 function stop_time(x)
 {
      return  clearInterval(x);
 }
 
function changeBorder()
{
   
   get('form').style.transition='all .2s ease';
   get('form').style.borderStyle='solid';
   get('form').style.boxShadow='inset 0px 0px 0px 0.25em #25333d';
   


}

function getBtnText(btn)
{
      return get(btn).textContent;
}

function changeBtnText(btn,newtext)
{
      return get(btn).textContent = newtext;
}














