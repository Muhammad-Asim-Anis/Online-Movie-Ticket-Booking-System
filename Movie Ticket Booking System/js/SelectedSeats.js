printseat.addEventListener("click",function(arg) {
      console.log(seatsIndex);
      
    var src= "Seats.php?element="+seatsIndex;
    console.log("print");
    window.location.href = src;
   
  })