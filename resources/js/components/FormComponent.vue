<template>
    <div class="form" v-if="!output">
        <div class="alert alert-danger" v-if="errors">
            <div v-for="err in errors">
                {{err[0]}}
            </div>
        </div>
        <form @submit="formSubmit">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-success mt-3 mb-3" role="status" v-if="loader && !errors && !output">
                    <span class="sr-only">Загрузка...</span>
                </div>
            </div>
            <div class="form-group">
                <label for="head">Заголовок объявления</label>
                <input type="text" name="head" class="form-control" v-bind:class="{'is-valid':head,'is-invalid':errors.head}" id="head" v-model="head">
            </div>
            <div class="form-group">
                <label for="category">Категория объявления</label>
                <select name="category" class="form-control" v-bind:class="{'is-valid':category,'is-invalid':errors.category}" id="category" v-model="category">
                    <option v-for="cat in categoryList" v-bind:value="cat.id">{{cat.head}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="avatar">Главное фото объявления</label>
                <input type="file" name="avatar" class="form-control-file" ref="file" v-bind:class="{'is-valid':avatar,'is-invalid':errors.avatar}" id="avatar">
            </div>
            <div class="form-group">
                <label for="body">Текст объявления</label>
                <textarea name="body" class="form-control" v-bind:class="{'is-valid':body,'is-invalid':errors.body}" id="body" rows="5" v-model="body"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input name="price" type="number" class="form-control" v-bind:class="{'is-valid':price,'is-invalid':errors.price}" id="price" v-model="price">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-file-plus"></i> Опубликовать объявление</button>
        </form>
    </div>
    <div class="alert alert-success" v-else-if="output">
        {{output}}
    </div>
</template>

<script>
    var url = "/api/v1/adsadd";
    export default {
        props: ['data'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                id: this.data.userId,
                categoryList: this.data.categoryList,
                head: '',
                category: '',
                avatar: '',
                body: '',
                price: '',
                output: '',
                errors: '',
                loader: false,
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                this.loader = true;
                var formData = new FormData();
                var imagefile = document.querySelector('#avatar');
                formData.append("userId", this.id);
                formData.append("avatar", imagefile.files[0]);
                formData.append("head", this.head);
                formData.append("category", this.category);
                formData.append("body", this.body);
                formData.append("price", this.price);
                let currentObj = this;
                axios.post(url, formData, {
                    header: {
                        'Content-type': 'multipart/form-data'
                    },
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
