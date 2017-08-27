/*jshint loopfunc: true */
function generateList(type){
	var elements = {
		melding: $("#melding"),
		van: $("#van"),
		tot: $("#tot"),
		amount: $("#amount"),
		h: $("#h"),
		tussen: $("#tussen"),
		l:$("#l")
	};
	elements.melding.text("");
	if ((elements.tot.val()-elements.van.val()+1)*30-2<elements.amount.val()){
		elements.melding.text("U heeft een te hoog aantal woorden ingevoerd voor de geselecteerde hoofdstukken");
		return;
	}
	if (elements.amount.val()==""){
		elements.melding.text("U heeft geen hoeveelheid woorden ingevuld.");
		return;
	}
	var totvalue = {csrf:$('input[name=csrf]').val(),type:type,van:elements.van.val(),tot:elements.tot.val(),amount:elements.amount.val()};
	if(elements.tot.val()==elements.van.val()){
		elements.h.html(elements.tot.val());
		elements.tussen.html("");
		elements.l.html("");
	} else {
		elements.h.html(elements.tot.val());
		elements.tussen.html(" t/m ");
		elements.l.html(elements.van.val());
	}
	if(type=='overhoren'){
		$('.inputform').hide();
		$('#nakijkknop').show();
	}
	sendRequest(totvalue);
}

function sendRequest(data){
	$.ajax({
		url: "index.php/Welcome/createList",
		type: 'POST',
		data: data,
		success: function(e) {
			$("#resultlist").html(e);
			var counter=1;
			$('.list0').each(function(){
				$(this).prepend(counter+'. ');
				counter++;
			});
			$('.list1').each(function(){
				$(this).prepend(counter+'. ');
				counter++;
			});
			$('.list2').each(function(){
				$(this).prepend(counter+'. ');
				counter++;
			});
			$(".result").show();
		}
	});
}

function check(){
	var stats = {
		fout:0,
		goed:0
	};
	$(".antwoordveld").each(function(){
		var ans = $(this).attr("ans");
		if(ans.indexOf($(this).val())!=(-1) && ans.length>=3 && $(this).val()!=""){
			$(this).css("background-color","rgb(158, 255, 161)");
			stats.goed++;
		} else {
			$(this).css("background-color","#ff9e9e");
			$(this).after("<span class='goedeantwoord'>"+ans+"</span>");
			stats.fout++;
		}
	});
	$("#nakijkknop").hide();
	$("#resultlist").prepend("<tr id='correctresult'><td colspan='3'>Je hebt <b><span style='color:green'>"+stats.goed+"</span></b> woorden goed en <b><span style='color:red'>"+stats.fout+"</span></b> woorden fout. Je hebt dus <b>"+Math.floor(stats.goed/(stats.goed+stats.fout)*100)+"%</b> goed.</td></tr>");
	$('.inputform').show();
}
