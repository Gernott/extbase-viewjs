
var vm = new Vue({
    el: '#app',
    data: {
        name: '',
        address: ''
    },
    computed: {
        summary: function() {
            return this.name + this.address;
        }

    },
    beforeMount: function() {
        this.name = this.$el.querySelector("#name").value;
        this.address = this.$el.querySelector('[id="address"]').value;
    }

})