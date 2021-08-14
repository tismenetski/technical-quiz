<template>
<!--    <div class="container">-->
<!--        <div class="text-center" style="margin: 20px 0px 20px 0px;">-->
<!--            <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/Nt3kJXa.png"></a><br>-->
<!--            <span class="text-secondary">Laravel SPA with Vue 3, Auth (Sanctum), CURD Example</span>-->
<!--        </div>-->

<!--        <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--            <div class="collapse navbar-collapse">-->
<!--                &lt;!&ndash; for logged-in user&ndash;&gt;-->
<!--                <div class="navbar-nav" v-if="isLoggedIn">-->
<!--                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>-->
<!--                    <router-link to="/books" class="nav-item nav-link">Books</router-link>-->
<!--                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>-->
<!--                </div>-->
<!--                &lt;!&ndash; for non-logged user&ndash;&gt;-->
<!--                <div class="navbar-nav" v-else>-->
<!--                    <router-link to="/" class="nav-item nav-link">Home</router-link>-->
<!--                    <router-link to="/login" class="nav-item nav-link">login</router-link>-->
<!--                    <router-link to="/register" class="nav-item nav-link">Register-->
<!--                    </router-link>-->
<!--                    <router-link to="/about" class="nav-item nav-link">About</router-link>-->
<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->
<!--        <br/>-->
<!--        <router-view/>-->
<!--    </div>-->
<!--    <el-container>-->
<!--        <el-aside>-->
<!--            <el-menu-->
<!--                default-active="2"-->
<!--                class="el-menu-vertical-demo"-->
<!--                @open="handleOpen"-->
<!--                @close="handleClose"-->
<!--                background-color="#D3DCE6"-->
<!--                text-color="#000"-->
<!--                active-text-color="#2098d1">-->



<!--                        <el-menu-item index="1-1"><i class="el-icon-setting"></i> <router-link to="/questions/newQuestionaire">Create New Questionnaire</router-link>  </el-menu-item>-->
<!--                        <el-menu-item index="1-2">Answered Questions</el-menu-item>-->

<!--            </el-menu>-->
<!--        </el-aside>-->
<!--        <el-container>-->
<!--            <el-header>-->
<!--                        <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--                            <div class="collapse navbar-collapse">-->
<!--                                &lt;!&ndash; for logged-in user&ndash;&gt;-->
<!--                                <div class="navbar-nav" v-if="isLoggedIn">-->
<!--                                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>-->
<!--                                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; for non-logged user&ndash;&gt;-->
<!--                                <div class="navbar-nav" v-else>-->
<!--                                    <router-link to="/" class="nav-item nav-link">Home</router-link>-->
<!--                                    <router-link to="/login" class="nav-item nav-link">login</router-link>-->
<!--                                    <router-link to="/register" class="nav-item nav-link">Register-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/about" class="nav-item nav-link">About</router-link>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </nav>-->
<!--            </el-header>-->
<!--            <el-main>-->
<!--                <router-view/>-->
<!--            </el-main>-->
<!--            <el-footer>Footer</el-footer>-->
<!--        </el-container>-->
<!--    </el-container>-->
    <div id="header">
        <nav class="navbar">
            <ul class="navbar-nav mr-auto d-flex flex-row justify-content-center align-baseline">
                <li class="nav-item"><a href="#" class="navbar-brand"><i class="fas fa-laptop-code fa-2x" style="color: #000"></i></a></li>
                <li><h1>Tech-Know</h1></li>
            </ul>
            <ul class="navbar-nav flex-row d-flex flex-row justify-content-start">
                <li class="nav-item"><router-link to="/logout">Logout</router-link></li>
            </ul>
        </nav>
    </div>
    <div id="sidebar-left">
        <ul class="list-group d-flex flex-column align-items-center justify-content-between">
            <li class="list-group-item mt-5 text-center">
                <router-link to="/dashboard">Dashboard</router-link>
            </li>
            <li class="list-group-item mt-5 text-center">
                <router-link to="/questions/newQuestionaire">Create New Questionnaire</router-link>
            </li>
            <li class="list-group-item mt-5 text-center">
                <router-link to="/about">About</router-link>
            </li>
        </ul>
    </div>
    <div id="main">
        <div class="container">
            <router-view/>
        </div>
    </div>
    <div id="footer">
        <h2 class="footer-heading">Made By Stas Tismenetski</h2>
<!--        <h3>Contact Me:</h3>-->
<!--        <ul class="list-group d-flex flex-row justify-content-between align-items-center">-->
<!--            <li class="list-group-item">-->
<!--                <a href="https://www.facebook.com/tismenetski">-->
<!--                    <img src="/public/img/facebook.png" alt="">-->
<!--                </a>-->
<!--                </li>-->
<!--        </ul>-->
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }


        //this.$store.dispatch('categories/getCategoriesAction');
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
        handleOpen(key, keyPath) {
            console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
            console.log(key, keyPath);
        }
    },
}
</script>


<style>

:root {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    --text-color  : #fff;
}

#header{
    background-color: #fff;
    width:100%;
    height:8vh;
    text-align: center;
}

#sidebar-left{
    float:left;
    width:20vw;
    background-color: #161109;
}

#main{
    float:left;
    width:80vw;
    background-color: lightgray;
}

#footer{
    clear:both;
    height: 6vh;
    width: 100%;
    text-align: center;
    background-color: #7477bc;
}

#sidebar-left, #main{
    height: 86vh;
}

.list-group-item {
    background-color : #824275;
    border-radius: 20px !important;
    width: 15vw;
}

.list-group-item a {
    color : #fff;
}

a {
    text-decoration: none;
}

body {
    font-family: Roboto, Helvetica, Arial, sans-serif;
}

#main {
    background: url('/img/background.svg');
}
</style>
