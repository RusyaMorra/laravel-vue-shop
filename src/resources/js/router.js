import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./views/Index";
import Shop from "./views/Shop";
import ProductSingle from "./views/ProductSingle";
import CreateProduct from "./views/ProductCRUD/CreateProduct";
import UpdateProduct from "./views/ProductCRUD/UpdateProduct";
import DeleteProduct from "./views/ProductCRUD/DeleteProduct";

import CreateCat from "./views/CatCRUD/CreateCat";
import UpdateCat from "./views/CatCRUD/UpdateCat";
import DeleteCat from "./views/CatCRUD/DeleteCat";

import Register from "./views/Auth/Register";
import Login from "./views/Auth/Login";

const routes = [
    {
        path: "/",
        component: Index
    },
    {
        path: "/shop",
        component: Shop
    },
    {
        path: "/productspage/:id",
        component: ProductSingle
    },
    {
        path: "/product/create",
        component: CreateProduct
    },
    {
        path: "/product/update",
        component: UpdateProduct
    },
    {
        path: "/product/delete",
        component: DeleteProduct
    },
    {
        path: "/cats/create",
        component: CreateCat
    },
    {
        path: "/cats/update",
        component: UpdateCat
    },
    {
        path: "/cats/delete",
        component: DeleteCat
    },
    {
        path: "/register",
        component: Register
    },
    {
        path: "/login",
        component: Login
    }
];

export default new vueRouter({
    mode: "history",
    routes
});
