var v = new Vue({
    el: '#app',
    data: {
        url: 'https://abiatechhub.com/',
        search: { text: '' },
        emptyResult: false,
        contact: {
            fullname: '',
            email: '',
            phone: '',
            company: '',
            message: ''
        },
        chooseUser: {},
        formValidate: [],
        successMSG: '',
    },

    methods: {

        SendMessage() {
            var formData = v.formData(v.contact);
            axios.post(this.url + "Home/contact", formData).then(function(response) {
                if (response.data.error) {
                    v.formValidate = response.data.message;
                } else {
                    // redirect to dashboard

                    v.successMSG = response.data.message;
                    v.clearAll();
                    //v.clearMSG();
                }
            })
        },
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        clearMSG() {
            setTimeout(function() {
                v.successMSG = ''
            }, 3000); // disappearing message success in 2 sec
        },

        refresh() {
            v.search.text ? v.searchUser() : v.showAll(); //for preventing

        }
    }
})