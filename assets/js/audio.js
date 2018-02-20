var audio;

$('#pause').hide();

initAudio($('#playlist li:first-child'));

function initAudio(element){

	var song = element.attr('song');
	var title = element.attr('songtitle');
//	'var artist = element.attr('artist');

	audio = new Audio(song);

	if(!audio.currentTime){
    	$('#duration').html('0:00');
	}

	$('#audio-player .title').text(title);
//	$('#audio-player .artist').text(artist);

	$('#playlist li').removeClass('active');
	element.addClass('active');

	$(audio).on("ended", function() {
		audio.pause();
		var next = $('#playlist li.active').next();
		if (next.length == 0) {
			next = $('#playlist li:first-child');
		}
		initAudio(next);
		audio.play();
		showDuration();
	});
}

$('#play').click(function(){
	audio.play();
	$('#play').hide();
	$('#pause').show();
	showDuration();
});

$('#pause').click(function(){
	audio.pause();
	$('#pause').hide();
	$('#play').show();
});