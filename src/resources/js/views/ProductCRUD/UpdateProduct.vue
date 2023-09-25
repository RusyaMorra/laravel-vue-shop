<template>
    <div>
        <div class="uk-alert-danger" uk-alert v-if="error">
            <a class="uk-alert-close" uk-close></a>
            <p>Проверьте правильность введенный полей</p>
        </div>
        <form style="margin-bottom: 20px;">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Обновить товар</legend>

                <div class="uk-margin">
                    <input class="uk-input" v-model="form.id" type="text" placeholder="Пропишите id поста(вручную чисто для тз)">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.name" type="text" placeholder="Заголовок">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.price" type="text" placeholder="Цена">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.img" type="text" placeholder="ссылка на картинку">
                </div>
                

                <div class="uk-margin">
                    <textarea class="uk-textarea" v-model="form.description" rows="5" placeholder="Описание продукта"></textarea>
                </div>

                <div class="uk-margin">
                    <input class="uk-input" v-model="form.cat_name" type="text" placeholder="название категории">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.is_available" type="text" placeholder="есть в наличии да/нет">
                </div>

                <button class="uk-button uk-button-primary" @click.prevent="update">
                    <div uk-spinner v-if="loading"></div>
                    <span v-else>Обновить</span>
                </button>
            </fieldset>

        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        components: {},
        data: () => ({
            form: {
                id:"",
                name: "",
                price: "",
                img: "",
                description: "",
                cat_name: "",
                is_available: "",
            },
            loading: false,
            error: false
        }),
        methods: {
            update() {
                this.loading = true;
                axios.patch('/api/v1/products/' + this.form.id, this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/products/' + res.data.id);
                    } else {
                        setTimeout(() => {
                            this.loading = false;
                        }, 300);
                        this.error = true;
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
