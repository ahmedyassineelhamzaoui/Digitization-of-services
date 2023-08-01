
let step = document.querySelectorAll(".step");
let compt =0;
let clickNext =document.querySelector("#click-next")
let cercle = document.querySelectorAll(".cercle");
let progressEmpty = document.querySelector(".progress-empty");
let progressFull = document.querySelector(".progress-full");
if(cercle && cercle[compt]){
  cercle[compt].style.background="black";
}

color="rgb(8, 149, 53)";

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
function deleteApplication(id){
  document.querySelector('#app_deletedId').value=id
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
        $('#spinner').removeClass('d-none');
          var formData = $(this).serialize();
          var url = $(this).attr('action');
          $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
              $('#spinner').addClass('d-none');
              var message = response.message;
              var alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                          '<strong>' + message + '</strong>' +
                          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                          '</div>';
              
              if(response.number == -1){
                document.querySelector("#error-paiment").innerHTML = alert;
              }else if(response.number == -2){
                document.querySelector("#error-paiment").innerHTML = alert;
              }else if(response.number == -3){
                document.querySelector("#error-paiment").innerHTML = alert;
              }else if(response.number == -4){
                document.querySelector("#error-paiment").innerHTML = alert;
              }
              else if(response.number == -5){
                document.querySelector("#error-paiment").innerHTML = alert;
              }else if(response.number == -6){
                document.querySelector("#error-paiment").innerHTML = alert;
              }else if(response.number == -7){
                document.querySelector("#error-paiment").innerHTML = alert;
              }else{
                clickNextbutton();
              }
            },
            error: function(xhr) {
              $('#spinner').addClass('d-none');
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
            let newroleName="";
            // check if the role_name option exists in the dropdown
            var role_name= response.role_name;
            var roles = response.roles;
            var select = $('#role_nameedit');
                select.empty();
                $.each(roles, function(index, role) {
                    if(role.name == 'controleur 1'){
                      newroleName = "MODERATEUR";
                    }else if(role.name == 'controleur 2'){
                      newroleName = "SOUS DIRECTEUR";
                    }else if(role.name == 'controleur 3'){
                      newroleName = "DIRECTEUR";
                    }else{
                      newroleName = role.name;
                    }
                    if(role_name == role.name ){
                    select.append('<option selected value="' + role.name + '">' + newroleName + '</option>');
                    }else{
                    select.append('<option value="' + role.name + '">' + newroleName + '</option>');
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
        if (this.value === "refuser") {
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
    $('#update-status').submit(function(e){
      e.preventDefault();
      let contrNumber = document.querySelector("#contrenu");
      if(contrNumber.value != 'controleur 3'){
        if(select.value == "refuser"){
          if(textarea.value == ''){
            $('#comment').after('<span id="error-reason" class="text-danger fs-7"><strong> il faut ajouté une raison </strong></span>');
          }else{
            var formData = $(this).serialize();
            $('#confirmedit-application').modal('show');
            $('#remove-application').submit(function(e){
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
            })


          }
        }else{
          var formData = $(this).serialize();
          var url = $(this).attr('action')
          $('#confirmedit-application').modal('show');
          $('#remove-application').submit(function(e){
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
          })


        }
      }else{
        if(select.value == "refuser"){
          if(textarea.value == ''){
            $('#comment').after('<span id="error-reason" class="text-danger fs-7"><strong> il faut ajouté une raison </strong></span>');
          }else{
            var formData = $(this).serialize();
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
      }


    })
    $('#search-demande').on('keyup',function(){
      $value=$(this).val();
      $.ajax({
      type : 'get',
      url : '/search-application',
      data:{'search_demande':$value},
      success: function (response)  {
          let tablelines = '';
          var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          if(response.applications.length>5){
          for (var i = 0; i < 5; i++) {
                        tablelines += '<tr class="border-b text-tablecolor">' +
                        '<td style="font-weight: bold">'+response.names[i]+'</td>'+
                        '<td>';
                          tablelines += '<form id="form-sendinfo" action="http://127.0.0.1:8000/formulaire" method="post" class="mb-3">' +
                            '<input type="hidden" name="personel_id" value="' + response.userPersonelinfos[i].id + '" id="personel-idinscription">' +
                            '<input type="hidden" name="_token" value="'+csrfToken+'">'+
                            '<button type="submit" name="print_info" class="btn btn-primary"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger</button>' +
                            '</form>'+
                        '</td>'+
                        '<td>'+
                            '<form  action="http://127.0.0.1:8000/formulaire"" method="post" class="mb-3">'+
                            '<input type="hidden" name="personel_id" value="'+response.userPersonelinfos[i].id+'" id="personel-idinscription">'+
                            '<input type="hidden" name="_token" value="'+csrfToken+'">'+
                            '<button type="submit" name="print_payment" class="btn btn-success"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger</button>'+
                            '</form>'+
                        '</td>'+
                        '<td class="ps-3">'+
                                  '<button data-files-id='+response.files[i].id+' data-bs-target="#show-joinedFile" data-bs-toggle="modal" name="print_info" class="btn show-allfiles" style="background-color:rgb(149, 0, 255);  color:white;"><span class="me-2"><i class="fa-solid fa-eye"></i></span> ouvrir</button>'+
                        '</td>'+
                        '</td>' +
                  '<td>';


                if (response.applications[i].status == 'accepter') {
                    tablelines += '<button class="btn" style="background-color:rgb(7, 165, 7); color:white;">accepter</button>';
                } else if (response.applications[i].status == 'refuser') {
                    tablelines += '<button class="btn" style="background-color:rgb(216, 38, 38); color:white;"> refuser</button>';
                } else if (response.applications[i].status == 'en cours') {
                    tablelines += '<button class="btn d-flex align-items-center" style="background-color:rgb(225, 131, 0); color:white;">' +
                        '<div class="me-1"> en cours </div>' +
                        '<div class="spinner-border" style="width:15px;height:15px" role="status">' +
                            '<span class="visually-hidden">Loading...</span>' +
                        '</div>' +
                    '</button>';
                } else {
                    tablelines += '<button class="btn" style="background-color:black; color:white;">en attente</button>';
                }

                tablelines += '</td>';
                if (response.roleName == 'Administrateur') {
                    tablelines += '<td>';
                    tablelines += '<button class="btn btn-danger me-1" onclick="deleteApplication(' + response.applications[i].id + ')" data-bs-toggle="modal" data-bs-target="#delete-application">' +
                        '<i class="fa-regular fa-trash-can"></i>' +
                        '</button>';
                    tablelines += '</td>';
                }

                if (response.roleName != 'Administrateur' && response.roleName != 'utilisateur' ) {
                    tablelines += '<td>';
                    if ( response.roleName == 'controleur 1' && response.applications[i].editable1 == 'yes') {
                        tablelines += '<button class="btn btn-warning show-editstatusform" data-status-id="' + response.applications[i].id + '" data-bs-target="#edit-status" data-bs-toggle="modal">' +
                            '<i class="fa-solid fa-pen-to-square"></i>' +
                            '</button>';
                    } else if ( response.roleName == 'controleur 2' && response.applications[i].editable2 == 'yes') {
                        tablelines += '<button class="btn btn-warning show-editstatusform" data-status-id="' + response.applications[i].id + '" data-bs-target="#edit-status" data-bs-toggle="modal">' +
                            '<i class="fa-solid fa-pen-to-square"></i>' +
                            '</button>';
                    } else if ( response.roleName == 'controleur 3' && response.applications[i].editable3 == 'yes') {
                        tablelines += '<button class="btn btn-warning show-editstatusform" data-status-id="' + response.applications[i].id + '" data-bs-target="#edit-status" data-bs-toggle="modal">' +
                            '<i class="fa-solid fa-pen-to-square"></i>' +
                            '</button>';
                    }
                    tablelines += '</td>';
                }else{
                  tablelines += '';
                }

                tablelines +=
                    '</tr>';
          }
          }else{
            for(let i=0;i<response.applications.length;i++){
              tablelines += '<tr class="border-b text-tablecolor">' +
              '<td style="font-weight: bold">'+response.names[i]+'</td>'+
              '<td>';
                tablelines += '<form id="form-sendinfo" action="http://127.0.0.1:8000/formulaire" method="post" class="mb-3">' +
                  '<input type="hidden" name="personel_id" value="' + response.userPersonelinfos[i].id + '" id="personel-idinscription">' +
                  '<input type="hidden" name="_token" value="'+csrfToken+'">'+
                  '<button type="submit" name="print_info" class="btn btn-primary"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger</button>' +
                  '</form>'+
              '</td>'+
              '<td>'+
                  '<form  action="http://127.0.0.1:8000/formulaire" method="post" class="mb-3">'+
                  '<input type="hidden" name="personel_id" value="'+response.userPersonelinfos[i].id+'" id="personel-idinscription">'+
                  '<input type="hidden" name="_token" value="'+csrfToken+'">'+
                  '<button type="submit" name="print_payment" class="btn btn-success"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger</button>'+
                  '</form>'+
              '</td>'+
              '<td class="ps-3">'+
                        '<button data-files-id='+response.files[i].id+' data-bs-target="#show-joinedFile" data-bs-toggle="modal" name="print_info" class="btn show-allfiles" style="background-color:rgb(149, 0, 255);  color:white;"><span class="me-2"><i class="fa-solid fa-eye"></i></span> ouvrir</button>'+
              '</td>';

        tablelines += '<td>'
      if (response.applications[i].status == 'accepter') {
          tablelines += '<button class="btn" style="background-color:rgb(7, 165, 7); color:white;">accepter</button>';
      } else if (response.applications[i].status == 'refuser') {
          tablelines += '<button class="btn" style="background-color:rgb(216, 38, 38); color:white;"> refuser</button>';
      } else if (response.applications[i].status == 'en cours') {
          tablelines += '<button class="btn d-flex align-items-center" style="background-color:rgb(225, 131, 0); color:white;">' +
              '<div class="me-1"> en cours </div>' +
              '<div class="spinner-border" style="width:15px;height:15px" role="status">' +
                  '<span class="visually-hidden">Loading...</span>' +
              '</div>' +
          '</button>';
      } else {
          tablelines += '<button class="btn" style="background-color:black; color:white;">en attente</button>';
      }
      tablelines +='</td>';
      if (response.roleName == 'Administrateur') {
          tablelines += '<th>';
          tablelines += '<button class="btn btn-danger me-1" onclick="deleteApplication(' + response.applications[i].id + ')" data-bs-toggle="modal" data-bs-target="#delete-application">' +
              '<i class="fa-regular fa-trash-can"></i>' +
              '</button></th>';
      }
      else if (response.roleName != 'Administrateur' && response.roleName != 'utilisateur' ) {
        tablelines += '<th>';
          if ( response.roleName == 'controleur 1' && response.applications[i].editable1 == 'yes') {
              tablelines += '<button class="btn btn-warning show-editstatusform" data-status-id="' + response.applications[i].id + '" data-bs-target="#edit-status" data-bs-toggle="modal">' +
                  '<i class="fa-solid fa-pen-to-square"></i>' +
                  '</button>';
          } else if ( response.roleName == 'controleur 2' && response.applications[i].editable2 == 'yes') {
              tablelines += '<button class="btn btn-warning show-editstatusform" data-status-id="' + response.applications[i].id + '" data-bs-target="#edit-status" data-bs-toggle="modal">' +
                  '<i class="fa-solid fa-pen-to-square"></i>' +
                  '</button>';
          } else if ( response.roleName == 'controleur 3' && response.applications[i].editable3 == 'yes') {
              tablelines += '<button class="btn btn-warning show-editstatusform" data-status-id="' + response.applications[i].id + '" data-bs-target="#edit-status" data-bs-toggle="modal">' +
                  '<i class="fa-solid fa-pen-to-square"></i>' +
                  '</button>';
          }
          tablelines += '</th>';
      }else if( response.roleName == 'utilisateur'){
      tablelines += '';
      }
      tablelines += '</tr>';
            }

          }

        $('#tbody').html(
            tablelines
        );
          let showEditStatus = document.querySelectorAll('.show-editstatusform');
          showEditStatus.forEach(function(element) {
              element.addEventListener('click', handleEditStatusClick);
          });
        },
      error : function(xhr,status,error){
          console.log(error)
      }
      });
  })
});
document.addEventListener("DOMContentLoaded", function() {
  let showEditStatus = document.querySelectorAll('.show-editstatusform');
  showEditStatus.forEach(function(element) {
      element.addEventListener('click', handleEditStatusClick);
  });
});


function handleEditStatusClick() {
  var statusId = $(this).data('status-id');
  $.ajax({
      type: 'GET',
      url: '/edit-application/' + statusId,
      success: function(response) {
          $('#status_id').val(response.id);
      },
      error: function(xhr, status, error) {
      }
  });
}

function  deleteNotification(id)
{
    document.querySelector("#notification_deletedId").value=id
}
let chartOfMonth=document.querySelector('#chart-of-month');
let chartOfWeek =document.querySelector('#chart-of-week');
let chartOfYear =document.querySelector('#chart-of-year');

let selectTimeOption1 =document.querySelector('#select-time1');
let selectTimeOption2 =document.querySelector('#select-time2');
let selectTimeOption3 =document.querySelector('#select-time3');


function timeChanged1(){

  if(selectTimeOption1.value == 2){
    chartOfMonth.classList.add('d-block')
    chartOfMonth.classList.remove('d-none')
    chartOfWeek.classList.add('d-none')
    chartOfWeek.classList.remove('d-block')
    chartOfYear.classList.add('d-none')
    chartOfYear.classList.remove('d-block')
    selectTimeOption2.value = 2
  }else if(selectTimeOption1.value == 3){
    chartOfYear.classList.add('d-block')
    chartOfYear.classList.remove('d-none')
    chartOfWeek.classList.add('d-none')
    chartOfWeek.classList.remove('d-block')
    chartOfMonth.classList.add('d-none')
    chartOfMonth.classList.remove('d-block')
    selectTimeOption3.value = 3
  }else{
    chartOfYear.classList.add('d-none')
    chartOfYear.classList.remove('d-block')
    chartOfWeek.classList.add('d-block')
    chartOfWeek.classList.remove('d-none')
    chartOfMonth.classList.add('d-none')
    chartOfMonth.classList.remove('d-block')
    selectTimeOption1.value = 1
  }
}
function timeChanged2(){
  if(selectTimeOption2.value == 1){
    chartOfMonth.classList.add('d-none')
    chartOfMonth.classList.remove('d-block')
    chartOfWeek.classList.add('d-block')
    chartOfWeek.classList.remove('d-none')
    chartOfYear.classList.add('d-none')
    chartOfYear.classList.remove('d-block')
    selectTimeOption1.value = 1
  }else if(selectTimeOption2.value == 3){
    chartOfYear.classList.add('d-block')
    chartOfYear.classList.remove('d-none')
    chartOfWeek.classList.add('d-none')
    chartOfWeek.classList.remove('d-block')
    chartOfMonth.classList.add('d-none')
    chartOfMonth.classList.remove('d-block')
    selectTimeOption3.value = 3
  }else{
    chartOfYear.classList.add('d-none')
    chartOfYear.classList.remove('d-block')
    chartOfWeek.classList.add('d-none')
    chartOfWeek.classList.remove('d-block')
    chartOfMonth.classList.add('d-block')
    chartOfMonth.classList.remove('d-none')
    selectTimeOption2.value = 2
  }
}
function timeChanged3(){
  if(selectTimeOption3.value == 2){
    chartOfMonth.classList.add('d-block')
    chartOfMonth.classList.remove('d-none')
    chartOfWeek.classList.add('d-none')
    chartOfWeek.classList.remove('d-block')
    chartOfYear.classList.add('d-none')
    chartOfYear.classList.remove('d-block')
    selectTimeOption2.value = 2
  }else if(selectTimeOption3.value == 1){
    chartOfYear.classList.add('d-none')
    chartOfYear.classList.remove('d-block')
    chartOfWeek.classList.add('d-block')
    chartOfWeek.classList.remove('d-none')
    chartOfMonth.classList.add('d-none')
    chartOfMonth.classList.remove('d-block')
    selectTimeOption1.value = 1
  }else{
    chartOfYear.classList.add('d-block')
    chartOfYear.classList.remove('d-none')
    chartOfWeek.classList.add('d-none')
    chartOfWeek.classList.remove('d-block')
    chartOfMonth.classList.add('d-none')
    chartOfMonth.classList.remove('d-block')
    selectTimeOption3.value = 3
  }
}
