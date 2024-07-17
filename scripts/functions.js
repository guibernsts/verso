
function resetTeste()
	{
	
     $.ajax({
		type: 'POST',
		url: 'resetTeste.php', 		
		success: function(response) {
			
		    listUsers();
			
			toastr.success('Base de Dados Resetada.', 'Sucesso');	
		},
		error: function(error) {
		  // Lógica para tratar erros na requisição AJAX
		  console.log('Erro ao enviar os dados:', error);
		}
	  });
	}

function searchUser(id)
	{
	
     $.ajax({
		type: 'POST',
		url: 'usersSearch.php', 
		data: { id: id },
		success: function(response) {
		    
			
			document.getElementById("ajaxSearch").innerHTML = response;
			eval(document.getElementById("runscriptUserSearh").innerHTML);
			
		},
		error: function(error) {
		  // Lógica para tratar erros na requisição AJAX
		  console.log('Erro ao enviar os dados:', error);
		}
	  });
	}


function deleteUser(id) 
	{ 
	document.form.id.value = id;
	userActions("delete");
	}

function userActions(action)
	{	
	
		
	 
		
     $.ajax({
		type: 'POST',
		url: 'usersSave.php', 
		data: 
		 	{ 
			action: action,	
			id: document.form.id.value,
			name: document.form.name.value,	
			email: document.form.email.value,				
			colors: $('#colors').chosen().val()
			},
		 
		success: function(response) {
		    
			
			restarForm();	
			listUsers();			
			if(action=="delete") toastr.error('Usuário excluído com sucesso!', 'Erro');	
			if(action=="update") toastr.success('Usuário alterado com sucesso!', 'Sucesso');	
			if(action=="insert") toastr.success('Usuário cadastrado com sucesso!', 'Sucesso');	
			
			document.getElementById("ajaxSearch").innerHTML = response;
			eval(document.getElementById("runscriptUserSearh").innerHTML);
			
		},
		error: function(error) {
		  // Lógica para tratar erros na requisição AJAX
		  console.log('Erro ao enviar os dados:', error);
		}
	  });
	}


function saveUser()
	{	
	if(document.form.id.value>0) userActions('update');
	else						 userActions('insert');
     
	}


function listUsers()
	{
	
     $.ajax({
		type: 'POST',
		url: 'usersControl.php', 
		
		success: function(response) {
		    
			
			document.getElementById("ajaxResponse").innerHTML = response;
			
			
		},
		error: function(error) {
		  // Lógica para tratar erros na requisição AJAX
		  console.log('Erro ao enviar os dados:', error);
		}
	  });
	}


function restarForm()
	{
	
	document.form.id.value = 0;	
	document.form.name.value = "";	
	document.form.email.value = "";	
		
		
	$('#colors').val('').trigger('chosen:updated');
		
		
		
		
	}