<template>
    <div>
        <div class="uk-alert-danger" uk-alert v-if="error">
            <a class="uk-alert-close" uk-close></a>
            <p>Проверьте правильность введенный полей</p>
        </div>
        <form style="margin-bottom: 20px;">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Создать категорию</legend>

          

                <div class="uk-margin">
                    <input class="uk-input" v-model="form.cat_name" type="text" placeholder="название категории">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.cat_tag" type="text" placeholder="ярлык категории">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.perent_cat_tag" type="text" placeholder="ярлык родительской рубрики">
                </div>
                
            <button class="uk-button uk-button-primary" @click.prevent="store">
                    <div uk-spinner v-if="loading"></div>
                    <span v-else>Создать</span>
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
                cat_name: "",
                cat_tag: "",
                perent_cat_tag: "",
            
            },
            loading: false,
            error: false
        }),
        methods: {
            store() {
                this.loading = true;
                axios.post('/api/v1/cats', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/cats/' + res.data.post.id);
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
