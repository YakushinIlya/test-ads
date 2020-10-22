<template>
    <div class="row justify-content-center">
        <div class="alert alert-danger" v-if="errors && !output">
            <div v-for="err in errors">
                {{err[0]}}
            </div>
        </div>

        <div class="alert alert-warning" v-if="output==''">
            Не найдено объявлений
        </div>
        <div class="card-group">

            <div class="card col-md-4" if="output!=''" v-for="ads in output">
                <a v-bind:href="'/ads/'+ads.id">
                    <img v-bind:src="'/uploads/ads/'+ads.avatar" class="card-img-top" v-bind:alt="ads.head">
                </a>
                <div class="card-body">
                    <a v-bind:href="'/ads/'+ads.id">
                        <h5 class="card-title">{{ads.head}}</h5>
                    </a>
                </div>
                <div class="card-footer">
                    <small class="badge badge-success">{{ads.price}} <i class="fa fa-ruble-sign"></i></small>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    var url = "/api/v1/profile/myads";
    export default {
        props: ['data'],
        mounted() {
            let currentObj = this;
            axios.post(url, {
                id: this.id,
            })
                .then(function (response) {
                    currentObj.output = response.data;
                    currentObj.errors = false;
                })
                .catch(function (error) {
                    //currentObj.output = error;
                    currentObj.errors = error.response.data.errors;
                });
            console.log('Component mounted.')
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                id: this.data.id,
                output: '',
                errors: '',
            };
        },
    }
</script>