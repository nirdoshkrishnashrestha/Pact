$(function() {		
	$('#message').hide();		
	var oTable = $('#userstable').dataTable( {
		"sPaginationType": "full_numbers",
		"bDestroy": true,
		"bRetrieve": true,
		"aoColumnDefs": [
		{ "bSearchable": false, "aTargets": [ 8 ] },
		{ "bSortable": true, "aTargets": [ 1 ] },
		{ "bSortable": true, "aTargets": [ 2 ] },
		{ "bSortable": true, "aTargets": [ 3 ] },
		{ "bSortable": true, "aTargets": [ 4 ] },
		{ "bSortable": true, "aTargets": [ 5 ] },
		{ "bSortable": true, "aTargets": [ 6 ] },
		{ "bSortable": true, "aTargets": [ 7 ] },
		{ "bSortable": false, "aTargets": [ 8 ] }
		]		
	});
	var iRow = 0;
	oTable.fnSort( [ [$('#DefaultOrderBy').html(),'desc']] );
	
	$("#addEditform").validate();
	$( "#dialog:ui-dialog" ).dialog( "destroy" );	
	var maincat = $( "#maincat" ),
		title = $( "#title" ),
		details = $( "#description" ),
		allFields = $( [] ).add( maincat ).add( title ).add( details );
		$( "#dialog-form" ).dialog({
		autoOpen: false,
		height: 500,
		width: 900,
		modal: true,
		open: function(event, ui) {			  
			 $('#dialog-form').load($('#formPath').text(), function() {
			   $( "#dialog-form" ).dialog( "open" );
			 			   			   						   
			 });
		   },
		buttons: {
			"Save": function() {				
				if($("#addEditform").valid())	
				{
					//$('#txtPhoto').uploadifyUpload();						
					var params, fields;					
					params = $('#addEditform').serialize();						
					//alert(params);
					$.post($('#actionPath').text(), params,function(r) {
										
						if(r=='login')
							window.location='login';
						else
						{														
							var paramsharu = r.split('^^');										
							oTable.dataTable().fnAddData(paramsharu,true);	
							$('#displayMsg').text('Record added successfully !');							
							$('#message').show().delay(3000).fadeOut('slow');												
							$( this ).dialog( "close" );
						}
					});

					allFields.val( "" ).removeClass( "error" );
					allFields.val( "" ).removeClass( "ui-state-error" );
					
					$( this ).dialog( "close" );	
				}												
			},
			"Edit": function() {
				
				if($("#addEditform").valid())	
				{	
				
					var params, fields;					
					
					params = $('#addEditform').serialize();
					// make ajax request
					$.post($('#actionPath').text(), params,function(r) {
						//alert(r);
						if(r=='login')
							window.location='login';
						else
						{											
							var params = r.split('^^');	
							var anSelected = fnGetSelected( oTable );						
							iRow = oTable.fnGetPosition( anSelected[0] );																						
  							oTable.fnUpdate( params,iRow ); 
							$('#displayMsg').text('Record updated successfully !');							
							$('#message').show().delay(3000).fadeOut('slow');												
							$( this ).dialog( "close" );
						}
					});
					allFields.val( "" ).removeClass( "error" );
					allFields.val( "" ).removeClass( "ui-state-error" );
					
					$( this ).dialog( "close" );	
				}												
			},
			Cancel: function() {
				allFields.val( "" ).removeClass( "error" );
				allFields.val( "" ).removeClass( "ui-state-error" );
				$( this ).dialog( "close" );
				$('#message').hide();
			}
		},
		close: function() {
			allFields.val( "" ).removeClass( "error" );
			allFields.val( "" ).removeClass( "ui-state-error" );
		}
	});
	
	
		$( "#user-details" ).dialog({
			autoOpen: false,
			height: 500,
			width: 900,
			modal: true,
			open: function(event, ui) {			  
				 $('#user-details').load($('#detailPagePath').text(), function() {
				   $( "#user-details" ).dialog( "open" );
																   
				 });
			   },
			buttons: {			
			Cancel: function() {
				$( this ).dialog( "close" );
				
			}
		},
		});
	$('.viewdetails').live('click',function(){
		 $('#detailPagePath').text($(this).attr('rel'));
		 $( "#user-details" ).dialog( "open" );
		 
	});

	$( "#CreateNew" ).click(function() {			
		$('#actionPath').text($(this).attr('rel'));	
		$('#formPath').text('users/loadForm');		
		$('#main_id').val('');
		var whatis = $('#whatisthis').text();
		$('#ui-dialog-title-dialog-form').text('Add '+whatis);
		$( "#dialog-form" ).dialog( "open" );
		$('.ui-button-text').each(function(){
			if($(this).text()=='Edit')
				$(this).hide();
			else
				$(this).show();
		});						
	});
	
	$('.deleteRow').live('click',function(event){
		event.stopImmediatePropagation();

		if(confirm('Are you sure to delete this record?'))
		{			
			var e = this;
			var newoTable = oTable;
			$.ajax({
			  type: "POST",
			  url: $(e).attr('rel'),
			  success:function( msg ) {				  
				if(msg=='login')
				{
					window.location='login';	
				}
				else
				{						
					$('tr').removeClass('row_selected');
					$(e).parents('tr').addClass('row_selected');
					var anSelected = fnGetSelected( oTable );						
					iRow = oTable.fnGetPosition( anSelected[0] );																
					oTable.fnDeleteRow(iRow,function(){
						$('#displayMsg').text('Record deleted successfully !');							
						$('#message').show().delay(3000).fadeOut('slow');												
					},true);	
																						  											
				}
			  }
		   });							
		}
	});
	
	$('#js-delete-selected').click(function(event){
		event.stopImmediatePropagation();
		if(CheckClicked(document.frmUser)>'0')
		{
		if(confirm('Are you sure to delete this record?'))
		{
			params = $('#frmUser').serialize();
			$('tr').removeClass('row_selected');	
			$('input[name="selected[]"]:checked').each(function(index) {
				$(this).parents('tr').addClass('row_selected');
			});
			var newoTable = oTable;
			$.ajax({
			  type: "POST",
			  url: 'users/deleteSelected',
			  data: params,
			  success:function( msg ) {				 		  
				if(msg=='login')
				{
					window.location='login';	
				}
				else
				{						
					var anSelected = fnGetSelected( oTable );	
					for(var i=0; i<anSelected.length; i++)
					{					
						iRow = oTable.fnGetPosition( anSelected[i] );
						oTable.fnDeleteRow(iRow);																
					
					}					
					$('#displayMsg').text('Record deleted successfully !');							
					$('#message').show().delay(3000).fadeOut('slow');	
																						  											
				}
			  }
		
			});
		}
		}
		else
		{
			alert('Please select the user to delete.');	
		}
	});
	
	$('.editRow').live('click',function(event){				
		//event.stopImmediatePropagation();				
		var whatis = $('#whatisthis').text();
		
		$('#ui-dialog-title-dialog-form').text('Edit '+whatis);
		
		$('#actionPath').text($(this).attr('rel'));
		var id = $(this).attr('id');		
		
		$('#formPath').text('users/loadForm/'+id);	
		var whatis = $('#whatisthis').text();
		$( "#dialog-form" ).dialog( "open" );
		//alert('ss');
		$('#dialog-form').attr('title','Edit '+whatis);	
					
		$('.ui-button-text').each(function(){
			if($(this).text()=='Save')
				$(this).hide();
			else
				$(this).show();
		});	
		$('#inline_'+id+' > div').each(function() {
			if($('#'+$(this).attr('class')))
				$('#'+$(this).attr('class')).val($(this).text());
		});
		$('tr').removeClass('row_selected');
		$(this).parents('tr').addClass('row_selected');
		var anSelected = fnGetSelected( oTable );						
		iRow = oTable.fnGetPosition( anSelected[0] );		
		
	});	
	
	
	
});
	
function fnGetSelected( oTableLocal )
{
	var aReturn = new Array();
	var aTrs = oTableLocal.fnGetNodes();
	
	for ( var i=0 ; i<aTrs.length ; i++ )
	{
		if ( $(aTrs[i]).hasClass('row_selected') )
		{
			aReturn.push( aTrs[i] );
		}
	}
	return aReturn;
}