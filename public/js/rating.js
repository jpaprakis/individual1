
//document is our HTML page.
//dollar sign around it is jquery
//ready saying when it's ready, execute code inside

function vote_up(ideaID) {
	$.post("/ratings/" + ideaID + "/1", function(data){
		successHandler(data);
	});
}

function vote_down(ideaID) {
	$.post("/ratings/" + ideaID + "/0", function(data){
		successHandler(data);
	});
}

function successHandler(data){
	console.log(data);
}