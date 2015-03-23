
//document is our HTML page.
//dollar sign around it is jquery
//ready saying when it's ready, execute code inside

function vote_up(ideaID) {
	alert(JSON.stringify(ideaID));
	$.post(ideaID + "/1");
}
