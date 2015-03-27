
//document is our HTML page.
//dollar sign around it is jquery
//ready saying when it's ready, execute code inside

function vote_up(ideaID, item) {
	$.post("/ratings/" + ideaID + "/1", function(data){
		$("#upvote"+ideaID).attr('style', 'color:red');
		$("#downvote"+ideaID).attr('style', 'color:gray');
	});
}

function vote_down(ideaID, item) {
	$.post("/ratings/" + ideaID + "/0", function(data){
		$("#upvote"+ideaID).attr('style', 'color:gray');
		$("#downvote"+ideaID).attr('style', 'color:red');
	});
}

function clearColour(span){
	span.querySelector('.vote').style.color="grey";
}