methods = {
	sendMessage: function() {
		console.log(this.message);
		axios.post(sendMessageRoute, {message: this.message})
		.then(response => {
			console.log(response.data);
		})
		.catch (response => {
			console.log(response);
		});
	}
}