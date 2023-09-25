<template>
    <div>
        <div class="uk-alert-danger" uk-alert v-if="error">
            <a class="uk-alert-close" uk-close></a>
            <p>Проверьте правильность введенный полей</p>
        </div>
        <form style="margin-bottom: 20px;">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Регистрация</legend>

          

                <div class="uk-margin">
                    <input class="uk-input" v-model="form.name" type="text" placeholder="Ваше имя">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.email" type="text" placeholder="Email">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.password" type="text" placeholder="Пороль">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.role" type="text" placeholder="роль, (Для примера просто пишите Admin или all)">
                </div>
                
            <button class="uk-button uk-button-primary" @click.prevent="Register">
                    <div uk-spinner v-if="loading"></div>
                    <span v-else>Зарегистрироваться</span>
                </button>
            </fieldset>

        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    import {createCookie, getCookie} from '../../utils';

    export default {
        components: {},
        data: () => ({
            form: {
                name: "",
                email: "",
                password: "",
                role: ""
            
            },
            loading: false,
            error: false
        }),
        methods: {
            Register() {
                this.loading = true;
                axios.post('/api/v1/auth/register', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
                 

                    if (res.data.status) {
                        //this.$router.push('/auth/register/' + res.data.user.id);
                        setTimeout(() => {
                            this.loading = false;
                        }, 300);


                        createCookie('user_id', res.data.user.id, 10);
                        createCookie('user_name', res.data.user.name, 10)
                        createCookie('user_mail', res.data.user.email, 10)
                        createCookie('role', res.data.user.role, 10)
                        createCookie('authorized', true, 10)


                        window.location.replace("/");


                       
                    } else {
                       
                        this.error = true;
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
