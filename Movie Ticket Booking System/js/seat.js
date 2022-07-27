const container = document.querySelector('.seat-container');
const seats = document.querySelectorAll('.seat-row .seat');
const count = document.getElementById('count');
const total = document.getElementById('total');
const movieSelect = document.getElementById('movie');
const printseat = document.getElementById('seats');

populateUI();
// let ticketPrice = +movieSelect.value;

// // Save selected movie index and price
// function setMovieData(movieIndex, moviePrice) {
//   localStorage.setItem('selectedMovieIndex', movieIndex);
//   localStorage.setItem('selectedMoviePrice', moviePrice);
// }

// seats.forEach(seat => {

//   seat.addEventListener("click",(e) => {
//      let index =seat.getAttribute("value");
     
    
//   })
// })
// update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll('.seat-row .seat.selected');
   
  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
  console.log(seatsIndex);
  localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));
  //copy selected seats into arr
  // map through array
  //return new array of indexes
    
//   const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
populateUI();
  count.innerHTML = selectedSeats.length;
//   seatsIndex.forEach((seat, index) => {
//   if(seatsIndex.indexOf(index) > -1 && seatsIndex.indexOf(index) < 16 )
//       {
//           totalprice = parseInt(total.innerHTML);
//           total.innerText = totalprice + 700;  
//       }
//       else if(seatsIndex.indexOf(index) > 15 && seatsIndex.indexOf(index) < 32 )
//       {
//         totalprice = parseInt(total.innerHTML);
//           total.innerText = totalprice + 1000;  
//       }
//       else if(seatsIndex.indexOf(index) > 31 && seatsIndex.indexOf(index) < 48 )
//       {
//         totalprice = parseInt(total.innerHTML);
//         total.innerText = totalprice + 1300;  
//       }
//     });
  // printseat.addEventListener("click",function(arg) {
  //     console.log(seatsIndex);
      
  //   var src= "Seats.php?element="+seatsIndex;
  //   console.log("print");
  //   window.location.href = src;
   
  // })
    
}


// get data from localstorage and populate ui
function populateUI() {
    let totalprice=0;
    
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
  count.innerHTML = selectedSeats.length;
  
  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add('selected');
        
      }
   
    

    });
  }
  else
  {
      total.innerText =0;
  }
  selectedSeats.forEach((seat,index)=> {
      
    if(selectedSeats[index]> -1 && selectedSeats[index] < 16 && selectedSeats.length > 0)
    {
     
      totalprice += 700 ;
      total.innerText = totalprice;  
      
  }
  else if(selectedSeats[index] > 15 && selectedSeats[index] < 32 && selectedSeats.length > 0)
  {
      totalprice += 1000 ;
      total.innerText = totalprice; 
  }
  else if(selectedSeats[index] > 31 && selectedSeats[index] < 48 && selectedSeats.length > 0)
  {
      totalprice += 1300 ;
      total.innerText = totalprice;  
  }
  
  })
  localStorage.setItem('selectedMoviePrice', JSON.parse(total.innerText) );
//   const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

//   if (selectedMovieIndex !== null) {
//     movieSelect.selectedIndex = selectedMovieIndex;
//   }
}
  

// Movie select event
// movieSelect.addEventListener('change', (e) => {
//   ticketPrice = +e.target.value;
//   setMovieData(e.target.selectedIndex, e.target.value);
//   updateSelectedCount();
// });

// Seat click event
container.addEventListener('click', (e) => {
  if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
    e.target.classList.toggle('selected');
    updateSelectedCount();

  }
});

// intial count and total
updateSelectedCount();
