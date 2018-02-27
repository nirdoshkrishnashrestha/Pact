// JavaScript Document//Javascript
$(function(){
	$('.js-text-limit').keyup(function(){
		var value1 = $(this).attr('title');
		values =value1.split('|');
		contain = $('#'+values[0]).val();
		chars = contain.length;
		remainingvalue = parseInt(values[1]) - chars;
		if(parseInt(remainingvalue) >= 0)
			$('#'+values[2]).text(remainingvalue);		
		$('#'+values[0]).val(($(this).val()).substr(0,values[1]));  
	});		
		
	/*$('input[name="selected[]"]').live('change',function(){
		$('input[name="selected[]"]').each(function(index) {
			$(this).parents('tr').removeAttr('class');			
		});
		$('input[name="selected[]"]:checked').each(function(index) {			
			$(this).parents('tr').addClass('selected-row');
		});	
		$('input[name="selected[]"]:not(:checked):odd').each(function(index){
			$(this).parents('tr').addClass('odd');
		});
		$('input[name="selected[]"]:not(:checked):even').each(function(index){
			$(this).parents('tr').addClass('even');
		});
	});*/
	
	/*$('#displayMsg').ajaxStart(function(){
		$('#displayMsg').text($('#js-ajax-loading-text').text());
		$('.icon-messages').hide();
		$('.close-msg').hide();
		$('#message').show();
		//alert('ss');
	});
	$('#displayMsg').ajaxComplete(function(){
		$('.icon-messages').show();
		$('.close-msg').show();
		$('#message').hide();
	});*/
});

function goTopage(path,containner,senddata,title,changeurl){	
	
	$.ajax({
		type: "POST",
		url: path,
		data: senddata,
		/*beforeSend: function (msg) {						
			$('#'+containner).html('<div style="width:128px;margin:auto;margin-top:50px;margin-bottom:50px;"><img src="'+base_url+'assets/images/ajax-loader.gif"/></div>');
		},*/		
		success: function (msg) {
			//alert(msg);
			//$('#'+containner).hide();
			$('#'+containner).html(msg);
			$('title').text(site_name+' - ' + title);			
			$('#'+containner).fadeIn();	
			window.history.pushState({path:changeurl},'',changeurl);					
		}
	});	
	/*$('#'+containner).load(path, function(contain) {
		$('#'+containner).html(contain);			  
		$('#'+containner).slideDown();
	});*/
}

function ToggleAll(e, fo, name)
{
	if (e.checked) {
	    CheckAll(fo,name);
	}
	else {
	    ClearAll(fo,name);
	}
}

function CheckAll(fo,name){
	//var fo = document.listitems;
	if(!name)
		name = 'selected[]';
	var len = fo.elements.length;
		for (var i = 0; i < len; i++) {
	    var e = fo.elements[i];
	    if (e.name == name) {
	       if(!e.checked){
	           e.click();
		   }
	    }
	}
	fo.toggleAll.checked = true;
}


function ClearAll(fo,name){
	if(!name)
		name = 'selected[]';
	//var fo = document.listitems;
	var len = fo.elements.length;
	for (var i = 0; i < len; i++) {
	    var e = fo.elements[i];
	    if (e.name == name) {
		   if(e.checked){
	           e.click();
		   }
	    }
	}
	fo.toggleAll.checked = false;
}

function CheckClicked(fo,name) {

	//var fo = document.listitems;
	if(!name)
		name = 'selected[]';
	var len = fo.elements.length;
	var checked=0;
	for (var i = 0; i < len; i++) {
		var e = fo.elements[i];
		if (e.name == name) {
		   if(e.checked){
				checked++;	
				if(checked > 1)
			   		break;
		   }
		}
	}
	return checked;
}	

function getClicked(fo,name) {
	if(!name)
		name = 'selected[]';
	var len = fo.elements.length;
	var checked=0;
	var checkedIds = '';
	for (var i = 0; i < len; i++) {
		var e = fo.elements[i];
		if (e.name == name) {
		   if(e.checked){
				checkedIds += '|'+e.value;
		   }
		}
	}
	checkedIds = checkedIds.substr('1');
	return checkedIds;
}

function strippedValues(id) {
	if(document.getElementById(id)) {
		var returnText=document.getElementById(id).value;
		var returnTextFinal=returnText.replace(/^\s+|\s+/,"");
		return returnTextFinal;
	}
	else {
		alert(id+' not defined');
		return false;
	}
}

function focusElement(id) {
	if(document.getElementById(id)) {
		document.getElementById(id).focus();
	}
	else {
		alert(id+' not defined');
		return false;
	}
}



function setCookie(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function clearText(value,id,defultValue)
{
	if(value==defultValue || value=='')
		document.getElementById(id).value = '';	
}
function setText(value,id,defultValue)
{
	if(value=='')
		document.getElementById(id).value=defultValue;
}


function ClickHereToPrint(ifrmPrint,divToPrint,title){
    try{ 
        var oIframe = document.getElementById(ifrmPrint);
        var oContent = document.getElementById(divToPrint).innerHTML;
        var oDoc = (oIframe.contentWindow || oIframe.contentDocument);
        if (oDoc.document) oDoc = oDoc.document;
		oDoc.write("<html><head><title>"+title+"</title>");
		oDoc.write("</head><body onload='this.focus(); this.print();'  background='images/ticket.gif'>");
		oDoc.write(oContent + "</body></html>");	    
		oDoc.close(); 	    
    }
    catch(e){
	    self.print();
    }
}

//to show confirm box on deleting
$(function () { 
	$('a.delete_link').bind('click',function()
	{
		return confirm('Are you sure you want to delete this?');
	});
	$('a.no_delete').bind('click',function()
	{
		alert('You cannot delete,\n Untill there exists images/categories inside!');
		return false;
	});
});