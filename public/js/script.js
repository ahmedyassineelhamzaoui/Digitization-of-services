
let step = document.querySelectorAll(".step");
let compt =0;
let clickNext =document.querySelector("#click-next")
let cercle = document.querySelectorAll(".cercle");
let progressEmpty = document.querySelector(".progress-empty");
let progressFull = document.querySelector(".progress-full");
cercle[compt].style.background="black";
color="#005e73";
// let parentName =document.querySelector("#parent_name")
// let responseNon=document.querySelector("#response-non")
// let responseOui=document.querySelector("#response-oui")
// if(responseOui.checked){
//   console.log('ok');
// }
function clickNextbutton()
{
    if (compt < 4) {
        compt++;
        cercle[compt].style.background = "black";
        cercle[compt - 1].style.background = color;
        if (compt == 3) {
            cercle[compt].style.background = color
            cercle[compt - 1].innerHTML = '<svg  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>'
            cercle[compt].innerHTML = '<svg  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>'
        }else{
            cercle[compt - 1].innerHTML = '<svg  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>'
        }
        // content of divs
        step[compt].style.display ="block";
        step[compt-1].style.display ="none";
        // end
        progressFull.style.width = `${compt * 33}%`;
    }

}

$(document).ready(function() {
    
    let curent = compt+1;
    $(`#step-1-form`).submit(function(event) {
        event.preventDefault();
          var formData = $(this).serialize();
          var url = $(this).attr('action');
          $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
                $("#personel-id").val(response.personel_id);
                $("#personel-idpaiment").val(response.personel_id);
                $("#personel-idinscription").val(response.personel_id)
                $("#personel-idreçupaiment").val(response.personel_id)

                clickNextbutton();
            },
            error: function(xhr) {
              var errors = xhr.responseJSON.errors;
              $.each(errors, function(key, value) {
                $('#' + key).after('<span class="text-danger fs-7"><strong>' + value + '</strong></span>');
            });
            }
        });
   
    });
    $('#step-2-form').submit(function(event) {
        event.preventDefault();
      
        var formData = new FormData(this); // Create a new FormData instance
      
        var url = $(this).attr('action');
      
        $.ajax({
          url: url,
          type: 'POST',
          data: formData, // Pass the FormData instance as the data
          processData: false, // Prevent jQuery from processing the data
          contentType: false, // Tell jQuery not to set the content type
          success: function(response) {
            console.log(response.message);
            clickNextbutton();
          },
          error: function(xhr) {
            var errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
              $('#' + key).after('<span class="text-danger fs-7"><strong>' + value + '</strong></span>');
            });
          }
        });
    });
    $(`#step-3-form`).submit(function(event) {
        event.preventDefault();
          var formData = $(this).serialize();
          var url = $(this).attr('action');
          $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
               console.log(response.message)
                clickNextbutton();
            },
            error: function(xhr) {
              var errors = xhr.responseJSON.errors;
              $.each(errors, function(key, value) {
                $('#' + key).after('<span class="text-danger fs-7"><strong>' + value + '</strong></span>');
            });
            }
        });
   
    });
});
// }