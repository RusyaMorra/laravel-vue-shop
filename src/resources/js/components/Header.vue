<template>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-center">

            <ul class="uk-navbar-nav">
<!--                class="uk-active"-->
                <li v-for="link in links" >
                    <router-link :to="link.href" v-if="!link.authorizedOnly && link.showAlways" >{{ link.title }}</router-link>
                    <router-link :to="link.href" v-if="link.authorizedOnly && isauthorized && role == link.rigths ">{{ link.title }}</router-link>
                    <router-link :to="link.href" v-if="link.authorizedOnly == false && !isauthorized">{{ link.title }}</router-link>
                   
                    
                </li>
            </ul>

        </div>
    </nav>
</template>

<script>
    import {createCookie, getCookie} from '../utils';
    
    


    
    export default {
        
        data() {
            return {
                links: [
                    {
                        title: "Главная",
                        href: "/",
                        rigths: 'All',
                        showAlways: true,
                    },
                    {
                        title: "Магазин",
                        href: "/Shop",
                        rigths: 'All',
                        showAlways: true,
                    },
                    {
                        title: "Создать пост",
                        href: "/product/create",
                        authorizedOnly: true,
                        rigths: 'Admin'
                    },
                    {
                        title: "Обновить пост",
                        href: "/product/update",
                        authorizedOnly: true,
                        rigths: 'Admin'
                    },
                    {
                        title: "удалить пост",
                        href: "/product/delete",
                        authorizedOnly: true,
                        rigths: 'Admin'
                    },
                    {
                        title: "Создать категорию",
                        href: "/cats/create",
                        authorizedOnly: true,
                        rigths: 'Admin'
                    },
                    {
                        title: "Обновить категорию",
                        href: "/cats/update",
                        authorizedOnly: true,
                        rigths: 'Admin'
                    },
                    {
                        title: "Удалить категорию",
                        href: "/cats/delete",
                        authorizedOnly: true,
                        rigths: 'Admin'
                    },
                    {
                        title: "Регистрация",
                        href: "/register",
                        authorizedOnly: false,
                        rigths: 'All',
                        showAlways: false,
                    },
                    {
                        title: "войти",
                        href: "/login",
                        authorizedOnly: false,
                        rigths: 'All',
                        showAlways: false,
                       
                    }
                ],
                isauthorized: this.isAuthorized(),
                role: getCookie('role')
            }
        },
        methods: {
            isAuthorized(){
                if(getCookie('authorized')){
                    return getCookie('authorized');
                }else{
                    return false;
                }
                
            }
        }
    }
</script>

<style scoped>

</style>
