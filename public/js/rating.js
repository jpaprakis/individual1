
//document is our HTML page.
//dollar sign around it is jquery
//ready saying when it's ready, execute code inside

function vote_up(ideaID, item) {
	$.post("/ratings/" + ideaID + "/1", function(data){
		successHandler(data);
		item.style.color="red";
	});
}

function vote_down(ideaID, item) {
	$.post("/ratings/" + ideaID + "/0", function(data){
		successHandler(data);
		item.style.color="red";
	});
}

function successHandler(data){
	console.log(data);
}

function clearColour(span){
	span.querySelector('.vote').style.color="grey";
}