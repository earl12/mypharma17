new Vue({
	el: '#app',
	
	data : {
		workers : []
	},
	methods :  {
		editEntry(a){
			console.log(a);
		},
		fetchWorkers() {
			axios.get('social-workers').then(function(response){
				console.log(response);
				this.workers = response.data;
			})
			.catch(function(){
				console.log('Error');
			});
		}
	},
	mounted () {
		this.fetchWorkers();
	}
})
