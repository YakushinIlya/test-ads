<template>
    <div class="form">
        <div class="alert alert-danger" v-if="errors && !output">
            <div v-for="err in errors">
                {{err[0]}}
            </div>
        </div>
        <div class="alert alert-success" v-else-if="output">
            {{output}}
        </div>
        <form @submit="formSubmit">
            <div class="form-group">
                <label for="firstName">Ваше имя</label>
                <input type="text" name="firstName" class="form-control" v-bind:class="{'is-valid':firstName,'is-invalid':errors.firstName}" id="firstName" v-model="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Ваша фамилия</label>
                <input type="text" name="lastName" class="form-control" v-bind:class="{'is-valid':lastName,'is-invalid':errors.lastName}" id="lastName" v-model="lastName">
            </div>
            <div class="form-group">
                <label for="email">Ваш E-mail</label>
                <input name="email" type="email" class="form-control" v-bind:class="{'is-valid':email,'is-invalid':errors.email}" id="email" v-model="email">
            </div>
            <div class="form-group">
                <label for="phone">Ваш телефон</label>
                <input name="phone" type="tel" class="form-control" v-bind:class="{'is-valid':phone,'is-invalid':errors.phone}" id="phone" v-model="phone">
            </div>
            <div class="form-group">
                <label for="info">Краткая информация о себе</label>
                <textarea name="info" class="form-control" v-bind:class="{'is-valid':info,'is-invalid':errors.info}" id="info" rows="5" v-model="info"></textarea>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Сохранить данные</button>
        </form>
    </div>
</template>

<script>
    var url = "/api/v1/profile/edit";
    export default {
        props: ['data'],
        mounted() {
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
                firstName: this.data.first_name,
                lastName: this.data.last_name,
                email: this.data.email,
                phone: this.data.phone,
                info: this.data.info,
                output: '',
                errors: '',
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.put(url, {
                    id: this.id,
                    first_name: this.firstName,
                    last_name: this.lastName,
                    email: this.email,
                    phone: this.phone,
                    info: this.info,
                })
                    .then(function (response) {
                        currentObj.output = response.data;
                        currentObj.errors = false;
                    })
                    .catch(function (error) {
                        //currentObj.output = error;
                        currentObj.errors = error.response.data.errors;
                    });
                window.scrollTo({
                    top: 100,
                    behavior: "smooth"
                });
            }
        }
    }
</script>