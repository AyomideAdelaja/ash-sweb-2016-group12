$(document).ready(function(){
  updateCountersJS();
  console.log("ready!");
});

/* Code from 
https://www.christianheilmann.com/2015/04/08/keeping-it-simple-coding-a-carousel/ */

carousel = (function(){
  var box = document.querySelector('.carouselbox');
  var next = box.querySelector('.next');
  var prev = box.querySelector('.prev');
  var items = box.querySelectorAll('.car-content li');
  var counter = 0;
  var amount = items.length;
  var current = items[0];
  box.classList.add('active');
  function navigate(direction) {
    current.classList.remove('current');
    counter = counter + direction;
    if (direction === -1 && 
        counter < 0) { 
      counter = amount - 1; 
    }
    if (direction === 1 && 
        !items[counter]) { 
      counter = 0;
    }
    current = items[counter];
    current.classList.add('current');
  }
  next.addEventListener('click', function(ev) {
    navigate(1);
  });
  prev.addEventListener('click', function(ev) {
    navigate(-1);
  });
  navigate(0);
})();

function updateCountersComplete(xhr,status){
  if (status != "success"){
    // alert("Error while updating the counters");
    return;
  }
  // alert(xhr.responseText{message});

  var serverResponse=$.parseJSON(xhr.responseText);
  var today ;
  var week ;
  var month ;
  var year ;
  var total ;
  
  if(serverResponse.result==0){
    alert(serverResponse.message);  
  } else {
    today = document.getElementById('stat-num-d');
    week = document.getElementById('stat-num-w');
    month = document.getElementById('stat-num-m');
    year = document.getElementById('stat-num-y');
    total = document.getElementById('stat-num-t');

    today.innerHTML=serverResponse.message.today;
    week.innerHTML=serverResponse.message.week;
    month.innerHTML=serverResponse.message.month;
    year.innerHTML=serverResponse.message.year;
    total.innerHTML=serverResponse.message.total;

  }
}

function updateCountersJS(){
  // alert("Counter is working!");
  var ajaxUrl = "visitLogsAjax.php?cmd=1";
  $.ajax(ajaxUrl,
  {
    async: true,
    complete: updateCountersComplete
  });
}

function viewConsultationJSComplete(xhr, status){
  if(status != "success"){
    alert("not successful");
    return;
  }
  // alert("Completed");
  var serverResponse=$.parseJSON(xhr.responseText);
  alert(serverResponse.message);
}

function viewConsultationJS(VID){
  alert("View Your Consultations here with id "+ VID);

  var ajaxUrl = "../visitLogsAjax.php?cmd=2&vid="+VID;
  $.ajax(ajaxUrl,
  {
    async: true,
    complete: viewConsultationJSComplete
  });
}

function editConsultationJS(VID){
  alert("Edit Your Consultations here with id "+ VID);
}

//Function To Display Popup
function div_show() {
document.getElementById('popup-div').style.display = "block";
}

//Function to Hide Popup
function div_hide(){
document.getElementById('popup-div').style.display = "none";
}

// /**
// *callback function for deleteRecord ajax call
// */
// function deleteRecordComplete(xhr,status){
//   if(status!="success"){
//     divStatus.innerHTML="error while deleteing a page";
//     return;
//   }
//   divStatus.innerHTML=xhr.responseText;
//   //write a code to delete the row from the HTML table
// }
// /**
// *makes an AJAX call to the server
// */
// function deleteRecord(recordID){
//   var ajaxPageUrl="usersajax.php?cmd=1&uc="+recordID;
//   $.ajax(ajaxPageUrl,
// {async:true,complete:deleteRecordComplete } 
//   );
// }
// var currentObject = null;



