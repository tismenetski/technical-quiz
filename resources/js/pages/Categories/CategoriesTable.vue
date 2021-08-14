<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Topic</th>
            <th scope="col">Questions Available</th>
            <th scope="col">Questions Faced</th>
            <th scope="col">Questions Answered</th>
            <th scope="col">Progress</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(category,index) in categoriesForUser" :key="index">
            <categories-item v-bind:category="category"></categories-item>
        </tr>
        </tbody>
    </table>
</template>

<script>
import CategoriesItem from "./CategoriesItem";

export default {
    name: "CategoriesTable",
    components: {
        CategoriesItem
    },
    data() {
        return {
            categories: [],
            categoriesForUser : []
        }
    },
    methods: {
        getCategoriesForUser() {
            console.log(this.$store.getters['categories/getCategoriesForUser']);
            this.categoriesForUser = this.$store.getters['categories/getCategoriesForUser'];
        }
    },

   async created() {
        await this.$store.dispatch('categories/getCategoriesForUserAction');
        this.getCategoriesForUser();
    }
}
</script>

<style scoped>

th {
    text-align : center;
    color: var(--text-color);
    font-size: 20px;

}



</style>
