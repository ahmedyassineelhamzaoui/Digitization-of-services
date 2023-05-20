let step = document.querySelectorAll(".step");
let compt =0;
let clickNext =document.querySelector("#click-next")
let cercle = document.querySelectorAll(".cercle");
let progressEmpty = document.querySelector(".progress-empty");
let progressFull = document.querySelector(".progress-full");
if(cercle && cercle[compt]){
  cercle[compt].style.background="black";
}

color="#005e73";

let radioOui = document.getElementById('response-oui');
let inputParentName = document.getElementById('parent_name');
let radioNon = document.querySelector("#response-non")
if(radioOui){
  radioOui.addEventListener('change', function() {
    if (this.checked) {
        inputParentName.disabled = false;
    }
});
}
if(radioNon){
  radioNon.addEventListener('change', function() {
    if (this.checked) {
      inputParentName.disabled = true;
    }
  });
}



function clickNextbutton()
{
    if (compt < 4) {
        compt++;
        if(cercle && cercle[compt]){
          cercle[compt].style.background = "black";
          cercle[compt - 1].style.background = color;
        }
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

function deleteUser(id){
  document.querySelector('#user_deletedId').value=id
}
function deleteRole(id){
  document.querySelector('#role_deletedId').value=id
}
$(document).ready(function() {
    $(`#step-1-form`).submit(function(event) {
        event.preventDefault();
          if(!inputParentName.disabled && inputParentName.value == ''){
            event.preventDefault();
            document.querySelector("#error-parentname").innerText="Veuiller remplir ce champ";
          }else{
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
        }
        
          
   
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
    $('#create-user').submit(function(e){
      e.preventDefault();
      var formData = $(this).serialize();
      var url = $(this).attr('action');
      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(response) {
            $("#user-create-alert").addClass('show')
            $("#user-create-alert").removeClass('hide')
            $(".cretae-user-success").text(response.message);
        },
        error: function(xhr) {
          var errors = xhr.responseJSON.errors;
          $.each(errors, function(key, value) {
            $('#' + key).after('<span class="text-danger fs-7"><strong>' + value + '</strong></span>');
        });
        }
      });
    })
    let editUserbutton = document.querySelectorAll('.edit-userbutton');
    editUserbutton.forEach(element => {
      element.addEventListener('click', function() {
        // get the user data from the server
        var userId = $(this).data('user-id');
        $.ajax({
            type: 'GET',
            url: '/modifier-utilisateur/'+userId, // replace with your Laravel route
            success: function(response) {
            $('#user-updateId').val(response.user.id);
            $('#full_nameedit').val(response.user.full_name);
            $('#emailedit').val(response.user.email);
            $('#passwordedit').val(response.user.password);
            
            // check if the role_name option exists in the dropdown
            var role_name= response.role_name;
            var roles = response.roles;
            var select = $('#role_nameedit');
                select.empty();
                $.each(roles, function(index, role) {
                    if(role_name == role.name ){
                    select.append('<option selected value="' + role.name + '">' + role.name + '</option>');
                    }else{
                    select.append('<option value="' + role.name + '">' + role.name + '</option>');
                    }
                });
            $('#password').val(response.password);
            },
            error: function(xhr, status, error) {
            
            }
        });
      });
    });
    $('#update-user').submit(function(event) {
      event.preventDefault();
        var formData = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
          url: url,
          type: 'POST',
          data: formData,
          success: function(response) {
              $("#user-edit-alert").addClass('show')
              $("#user-edit-alert").removeClass('hide')
              $('.edit-user-success').text(response.message)
          },
          error: function(xhr,status,error) {
             var errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
              $('#' + key+'edit').after('<span class="text-red-500"><strong>' + value + '</strong></span>');
          });
          }
        });
    }); 
    $('#create-role').submit(function(e){
      e.preventDefault();
     var formData = $(this).serialize();
     var url = $(this).attr('action');
     $.ajax({
        url : url,
        type : 'POST',
        data : formData,
        success : function(response) {
           $("#role-create-alert").addClass('show')
           $("#role-create-alert").removeClass('hide')
           $('.create-role-success').text(response.message);
        },
        error: function(xhr,status,error) {
          var errors = xhr.responseJSON.errors;
         $.each(errors, function(key, value) {
           $('#' + key).after('<span class="text-danger"><strong>' + value + '</strong></span>');
         });
        }
     });
    });
    let editRolebutton = document.querySelectorAll(".edit-rolebutton")
    editRolebutton.forEach(function(element) {
        element.addEventListener('click', function() {
            var roleId = $(this).data('role-id');
            $.ajax({
                url: '/modifier-role/' + roleId,
                type: 'GET',
                success: function(response) {
                    $('#role_editId').val(response.role.id);
                    $('#name-edit').val(response.role.name);
                    var permissionsDiv = $('<div>', {
                        id: 'permissions-edit',
                        class: 'bg-light border border-secondary text-secondary text-sm rounded-lg focus-ring border-0 form-control overflow-auto',
                        style: 'max-height: 300px;',
                        rows: '10',
                        required: ''
                    });
                    $("#picalty").empty()
                    response.permissions.forEach(function(permission) {
                        var checkboxDiv = $('<div>', {
                            class: 'form-check mb-1'
                        });
                        var checkboxInput = $('<input>', {
                            type: 'checkbox',
                            id: permission.name,
                            value: permission.name,
                            class: 'form-check-input cursor-pointer',
                            name: 'permission[]'
                        });
                        if (response.rolePermissions.includes(permission.name)) {
                            checkboxInput.prop('checked', true);
                        }
                        var checkboxLabel = $('<label>', {
                            class: 'form-check-label cursor-pointer text-primary',
                            for: permission.name,
                            text: permission.name
                        });
                        checkboxDiv.append(checkboxInput);
                        checkboxDiv.append(checkboxLabel);
                        permissionsDiv.append(checkboxDiv);
                    });
                    $("#picalty").append(permissionsDiv)
                },
                error: function(xhr, status, error) {
    
                }
            });
        });
    });
    $('#update-role').submit(function(e){
     e.preventDefault();
     var formData = $(this).serialize();
     var url = $(this).attr('action');
     $.ajax({
        url : url,
        type : 'POST',
        data : formData,
        success : function(response) {
          if(response.error){
            $("#role-edit-error").addClass('show')
            $("#role-edit-error").removeClass('hide')
            $(".edit-role-error").text(response.error)
          }
          if(response.message)
          {
            $("#role-edit-alert").addClass('show')
            $("#role-edit-alert").removeClass('hide')
            $(".edit-role-success").text(response.message);
          }
           
        },
        error: function(xhr,status,error) {
          var errors = xhr.responseJSON.errors;
          $.each(errors, function(key, value) {
            $('#' + key).after('<span class="text-danger fs-7"><strong>' + value + '</strong></span>');
          });
        }
     });
    });
    let showAllfiles =document.querySelectorAll('.show-allfiles');
    showAllfiles.forEach(function(element){
      element.addEventListener('click', function() {
        var fileId = $(this).data('files-id');
        $.ajax({
            url: 'show-files/' + fileId,
            type: 'GET',
            success: function(response) {
                var filesDiv = document.querySelector('#file_liste');
                filesDiv.innerHTML = '';
                let index = 0;
                for (var key in response.file) {
                  
                  if (response.file.hasOwnProperty(key) && response.file[key]) {
                    var fileName = key.replace('_path', '');
                    var filePath = response.file[key];
                    var fileLink = document.createElement('a');
                    fileLink.classList.add('text-light');
                    fileLink.href = filePath;
                    fileLink.download = fileName;
                    if(index == 0){
                      fileLink.textContent = 'Décision de nomination';
                    }
                    if(index == 1){
                      fileLink.textContent = 'Décision d\'affectation ou page fonctionnaire';
                    }
                    if(index == 2){
                      fileLink.textContent = 'Certificat de 1ère prise de service';
                    }
                    if(index == 3){
                      fileLink.textContent = 'Bulletin de solde avant nomination';
                    }
                    if(index == 4){
                      fileLink.textContent = 'Bulletin de solde après nommination';
                    }
                    if(index == 5){
                      fileLink.textContent = 'Certificat de non hébergement';
                    }
                    if(index == 6){
                      fileLink.textContent = 'Attestation sur l\'honneur légalisée';
                    }
                    if(index == 7){
                      fileLink.textContent = 'certificat de résidence';
                    }
                    if(index == 8){
                      fileLink.textContent = 'Pièce d\'identité';
                    }
                    if(index == 9){
                      fileLink.textContent = 'Acte de mariage';
                    }
                    var fileButton = document.createElement('button');
                    fileButton.classList.add('btn','btn-primary','m-1','fixed-width','d-flex','text-align-center')
                    
                    var icon = document.createElement('i');
                    icon.classList.add('fa-solid', 'fa-file-invoice');
                    var span = document.createElement('span')
                    span.classList.add('me-1')
                    span.appendChild(icon)
                    fileButton.appendChild(span);  
                    fileButton.appendChild(fileLink);
                    filesDiv.appendChild(fileButton);
                    index++
                  }
                }
            },
            error: function(xhr, status, error) {

            }
        });
    });
    });

    let select = document.getElementById("status_name");
    let commentDiv = document.getElementById("comment");
    let textarea = document.createElement("textarea");
    if(select){
      select.addEventListener("change", function() {
        if (this.value === "decline") {
          // Add textarea
          textarea.setAttribute("rows", 10);
          textarea.classList.add('form-control')
         
          textarea.name = "comment";
          textarea.placeholder = "la raison ";
          
          commentDiv.appendChild(textarea);  
        } else {
          // Remove textarea  
          commentDiv.innerHTML = "";
        }
      });
    }
  
    let showEditStatus =document.querySelectorAll('.show-editstatusform');
    showEditStatus.forEach(function(element){
      element.addEventListener('click', function() {
        var statusId = $(this).data('status-id');
        console.log(statusId);
        $.ajax({
            type: 'GET',
            url: '/edit-application/'+statusId,
            success: function(response) {
                $('#status_id').val(response.id)
            },
            error: function(xhr, status, error) {

            }
        });
    });
    });
    $('#update-status').submit(function(e){
      e.preventDefault();
      if(select.value == "decline"){
        if(textarea.value == ''){
          $('#comment').after('<span id="error-reason" class="text-danger fs-7"><strong> il faut ajouté une raison </strong></span>');
        }else{
          var formData = $(this).serialize();
          var url = $(this).attr('action')
          $.ajax({
            type : 'POST',
            data : formData ,
            url : url, 
            success : function(response){
              if(response.error){
                $("#status-edit-error").addClass('show')
                $("#status-edit-error").removeClass('hide')
                $(".status-role-error").text(response.error)
              }
              if(response.message)
              {
                $("#status-edit-alert").addClass('show')
                $("#status-edit-alert").removeClass('hide')
                $(".status-role-success").text(response.message);
              }
            },
            error : function(xhr,status,error){
  
            }
          });
         
        }
      }else{
        var formData = $(this).serialize();
        var url = $(this).attr('action')
        $.ajax({
          type : 'POST',
          data : formData ,
          url : url, 
          success : function(response){
              if(response.error){
                $("#status-edit-error").addClass('show')
                $("#status-edit-error").removeClass('hide')
                $(".status-role-error").text(response.error)
              }
              if(response.message)
              {
                $("#status-edit-alert").addClass('show')
                $("#status-edit-alert").removeClass('hide')
                $(".status-role-success").text(response.message);
              }
              },
          error : function(xhr,status,error){

          }
        });
       
      }
    })
});
