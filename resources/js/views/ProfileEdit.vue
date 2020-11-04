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
        <div id="userPhoto">
            <img v-bind:src="'/uploads/user/avatars/'+avatar" class="img-fluid" width="150px">
        </div>
        <div class="form-group">
            <label for="avatar">Ваша фотография профиля</label>
            <input type="file" name="avatar" class="form-control-file" ref="file" id="avatar" @change="uploadAvatar">
        </div>
        <hr>
        <form @submit="formSubmit">
            <div class="form-group">
                <label for="first_name">Ваше имя</label>
                <input type="text" name="first_name" class="form-control" v-bind:class="{'is-valid':first_name,'is-invalid':errors.first_name}" id="first_name" v-model="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Ваша фамилия</label>
                <input type="text" name="last_name" class="form-control" v-bind:class="{'is-valid':last_name,'is-invalid':errors.last_name}" id="last_name" v-model="last_name">
            </div>
            <div class="form-group">
                <label for="country">Страна проживания</label>
                <select name="country" class="form-control" v-bind:class="{'is-valid':country,'is-invalid':errors.country}" id="country" v-model="country" @change="regionList">
                    <option v-for="cntr in countryList" v-bind:value="cntr.id">{{cntr.country_name_ru}}</option>
                </select>
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
    var urlData = "/api/v1/profile/edit";
    var urlImg = "/api/v1/profile/img";
    var urlRegion = "/api/v1/region";
    export default {
        props: ['data'],
        mounted() {
            console.log('Component mounted.')
        },
        headers: {
          'Content-type:': 'application/json',
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                id: this.data.user.id,
                first_name: this.data.user.first_name,
                last_name: this.data.user.last_name,
                countryList: this.data.countryList,
                email: this.data.user.email,
                phone: this.data.user.phone,
                info: this.data.user.info,
                avatar: this.data.user.avatar,
                country: '',
                region: '',
                city: '',
                output: '',
                errors: '',
                loader: false,
            };
        },
        methods: {
            cityList(e) {

            },
            regionList(e) {
                var formData = new FormData();
                formData.append("country", e.target.value);
                formData.append("formData", 'html');
                axios.post(urlRegion, formData, {
                    header: {
                        'Content-type': 'multipart/form-data'
                    },
                })
                .then(function (response) {
                    this.region = response.data;
                    $('#region').fadeIn(10, function(){
                        $(this).html(response.data);
                    });
                    currentObj.errors = false;
                })
                .catch(function (error) {
                    //currentObj.output = error;
                    currentObj.errors = error.response.data.errors;
                });
            },
            uploadAvatar(e) {
                let currentObj = this;
                var formData = new FormData();
                var imagefile = document.querySelector('#avatar');
                formData.append("avatar", imagefile.files[0]);
                formData.append("id", this.id);
                axios.post(urlImg, formData, {
                    header: {
                        'Content-type': 'multipart/form-data'
                    },
                })
                    .then(function (response) {
                        $('#userPhoto').fadeIn(10, function(){
                            $(this).html('<img src="/uploads/user/avatars/'+response.data+'" class="img-fluid" width="150px">');
                        });
                        currentObj.errors = false;
                    })
                    .catch(function (error) {
                        //currentObj.output = error;
                        currentObj.errors = error.response.data.errors;
                    });
            },
            formSubmit(e) {
                e.preventDefault();
                this.loader = true;
                let currentObj = this;
                axios.put(urlData, {
                    id: this.id,
                    first_name: this.first_name,
                    last_name: this.last_name,
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