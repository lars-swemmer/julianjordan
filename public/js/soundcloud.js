console.log('soundcloud.js');

SC.initialize({
	client_id: 'b49907f8e31c645942d6560df905162e'
});

var inputField;
var currentPlayer;

var streamTrack = function(track){
    return SC.stream('/tracks/' + track.id).then(function(player){

    	// set html

    	// title.innerText = track.title;
      	// info.style.display = 'inline-block';

      	if (currentPlayer) {
        	currentPlayer.pause();
      	}
      	currentPlayer = player;

	    player.play();
    }).catch(function(){
    	// error handling
    	console.log(arguments);
    });
};

var search = function($track){
	inputField = $track.attr('data-soundcloud-url');
    
    SC.resolve(inputField).then(streamTrack);
};

$('.toggle-track-btn').click(function() {
	if ($(this).find('i').attr('class') == 'fa fa-play-circle') {
		playTrack($(this).find('i'));
	} else {
		pauseTrack($(this).find('i'));
	}
});

function playTrack($btn) {
	$btn.removeClass('fa-play-circle').addClass('fa-pause-circle');

	if (inputField == $btn.attr('data-soundcloud-url')) {
		// zelfde track
		console.log('zelfde track');
		if (currentPlayer) {
			currentPlayer.play();
		} else {
			search($btn);
		}
	} else {
		// nieuwe track, nieuw eplayer maken?
		console.log('nieuwe track');
		if (currentPlayer) {
			currentPlayer.pause();
			search($btn);
		} else {
			search($btn);
		}	
	}

	console.log($btn.attr('data-soundcloud-url'));
}

function pauseTrack($btn) {
	$btn.removeClass('fa-pause-circle').addClass('fa-play-circle');
	if (currentPlayer) {
		currentPlayer.pause();
	}
}