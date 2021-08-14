<template>
    <div>
        <h1 class="welcome-heading">Welcome {{ name }}</h1>
            <categories-table></categories-table>
    </div>
</template>

<script>
import CategoriesTable from "./Categories/CategoriesTable";
export default {
    name: "Dashboard",
    components : {
        CategoriesTable
    },
    data() {
        return {
            name: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>


<style scoped>

.welcome-heading {
    text-align: center;
    padding: 10px 0;
    color: var(--text-color);
}


</style>
