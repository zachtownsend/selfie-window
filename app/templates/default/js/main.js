/*var PubNub = PUBNUB.init({
	publish_key: 'pub-c-78611005-04c9-492f-aadd-58d1ed70357e',
	subscribe_key: 'sub-c-cdd5c262-b910-11e4-80fe-02ee2ddab7fe'
});

var WindowGram = PubNub.sync('window');*/

var pubnub = PUBNUB.init({
    subscribe_key: 'sub-c-cb09c518-75a1-11e4-a290-02ee2ddab7fe',
    publish_key:   'pub-c-161fc194-bfd2-44e1-af19-0d44c834089d'
});
var windagram = pubnub.sync("windagram");
var homepage = ($('#instagram-window').length > 0);
var domain = document.URL;

var InstagramWindow = {
	json: '',
	container: $('.content-container', '#instagram-window'),
	maxIndex: 50,
	index: 0,
	//pubnub: PubNub.sync('window'),
	updateImg: function(index) {
		var data = this.json;
		var imgSrc = data[index];
		this.container.css({'background-image' : 'url(' + imgSrc + ')'});
	},
	ajax: function() {
		$.get(domain + 'instagram', function(data) {
			InstagramWindow.json = data;
			InstagramWindow.updateImg(InstagramWindow.index);
			windagram.merge({'index' : InstagramWindow.index});
		});
	},
	next: function() {
		this.index++;
		this.index = (this.index >= this.maxIndex) ? 0 : this.index;
		windagram.merge({'index' : this.index});
	}
}



windagram.on.ready(function(ref){
	if(homepage) InstagramWindow.ajax();
});

windagram.on.change(function(ref){
	if(homepage) InstagramWindow.updateImg(ref.data.index);
});


$('#update-button').click(function(){
	InstagramWindow.next();
});

$(window).load(function(){
	if(homepage) return false;

	$('#instagram-window').click(function(){
		InstagramWindow.next();
	});
});