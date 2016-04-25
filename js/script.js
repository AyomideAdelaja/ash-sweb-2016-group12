var currentUsername = document.getElementById('cur_user_id').innerHTML;

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


/** 
* Function To manage response from the server for updating the count of consultations
*/

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

/** 
* Function To update the count of consultation given the current user's id
*/
function updateCountersJS(){
  // alert("Counter is working!");
  var ajaxUrl = "visitLogsAjax.php?cmd=1&cu="+currentUsername;
  // alert(ajaxUrl);
  $.ajax(ajaxUrl,
  {
    async: true,
    complete: updateCountersComplete
  });
}

/** 
* Function To manage response from the server for viewing a consultation
*/
function viewConsultationJSComplete(xhr, status){
  if(status != "success"){
    alert("not successful");
    return;
  }
  // alert("Completed");
  var serverResponse=$.parseJSON(xhr.responseText);
  // alert(serverResponse.message);
  document.getElementById('vid').value = serverResponse.message.VID;
  document.getElementById('vd').value = serverResponse.message.DateOfVisit;
  document.getElementById('pname').value = serverResponse.message.PatientFirstName + " " + serverResponse.message.PatientLastName;
  document.getElementById('nname').value = serverResponse.message.UserFirstName + " " + serverResponse.message.UserLastName ;
  document.getElementById('dia').value = serverResponse.message.Diagnosis;
  document.getElementById('obs').value = serverResponse.message.Observations;
  document.getElementById('vit').value = serverResponse.message.VitalsInfo;
  document.getElementById('sym').value = serverResponse.message.Symptoms;
  document.getElementById('pres').value = serverResponse.message.Prescriptions;
  div_show();
}

/** 
* Function To view a consultation given it's id
*/
function viewConsultationJS(VID){
  // alert("View Your Consultations here with id "+ VID);

  var ajaxUrl = "../visitLogsAjax.php?cmd=2&vid="+VID;
  $.ajax(ajaxUrl,
  {
    async: true,
    complete: viewConsultationJSComplete
  });
}

/** 
* Function To edit a consultation given it's id
*/
function editConsultationJS(VID){
  //alert("Sorry, you cannot edit consultation "+ VID +" at the moment.");
  
  var ajaxUrl = "../visitLogsAjax.php?cmd=2&vid="+VID;
  $.ajax(ajaxUrl,
  {
    async: true,
    complete: viewConsultationJSComplete
  });
}

/** 
* Function To Display Popup
*/
function div_show() {
document.getElementById('popup-div').style.display = "block";
}

/** 
* Function to Hide Popup
*/
function div_hide(){
document.getElementById('popup-div').style.display = "none";
}




