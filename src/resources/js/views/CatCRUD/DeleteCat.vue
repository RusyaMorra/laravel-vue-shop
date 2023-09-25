<template>
    <div>
        <div class="uk-alert-danger" uk-alert v-if="error">
            <a class="uk-alert-close" uk-close></a>
            <p>Проверьте правильность введенный полей</p>
        </div>
        <form style="margin-bottom: 20px;">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Удалить категорию</legend>

                <div class="uk-margin">
                    <input class="uk-input" v-model="form.id" type="text" placeholder="Пропишите id категории которую нужно удалить(вручную чисто для тз)">
                </div>
                

                <button class="uk-button uk-button-primary" @click.prevent="update">
                    <div uk-spinner v-if="loading"></div>
                    <span v-else>Удалить</span>
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
            },
            loading: false,
            error: false
        }),
        methods: {
            update() {
                this.loading = true;
                axios.delete('/api/v1/cats/' + this.form.id, this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/cats/' + res.data.id);
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
