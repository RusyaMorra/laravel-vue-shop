<template>
    <div>
        <spin v-if="loading"/>
        <div v-else-if="!loading && !not_found">
            <h1>{{ post.name}} <span class="uk-badge">{{ post.created_at}}</span></h1>
            <p class="uk-text-lead">{{ post.price}} тенге</p>
            <p class="uk-text-lead">{{ post.cat_name}} </p>
            <img :src="post.img" class="img-product" alt="">
            <p class="uk-text-lead">{{ post.description}}</p>
            <time datetime="2016-04-01T19:00">{{post.is_available == '1'?'есть в наличии':'нет в наличии'}}</time> <br>
        </div>
        <div uk-alert v-if="not_found">
            <a class="uk-alert-close" uk-close></a>
            <h3>404 пост не найден</h3>
        </div>
    </div>
</template>

<script>
    import Spin from "../components/Spin";
    import axios from "axios";

    export default {
        components: {
            Spin
        },
        data: () => ({
            loading: true,
            post: [],
            not_found: false
        }),
        mounted() {
            this.loadPost(this.$route.params.id);
        },
        methods: {
            loadPost(id) {
                axios.get('/api/v1/products/' + id)
                .then(res => {
                    this.post = res.data;
                    setTimeout(()=> {
                        this.loading = false;
                    }, 500);
                })
                .catch(err => {
                    this.not_found = true;
                })
            }
        }
    }
</script>

<style scoped>

</style>
