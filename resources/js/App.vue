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
    <el-container>
        <el-aside>
            <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                @open="handleOpen"
                @close="handleClose"
                background-color="#D3DCE6"
                text-color="#000"
                active-text-color="#2098d1">



                        <el-menu-item index="1-1"><i class="el-icon-setting"></i> <router-link to="/questions/newQuestionaire">Create New Questionnaire</router-link>  </el-menu-item>
                        <el-menu-item index="1-2">Answered Questions</el-menu-item>

            </el-menu>
        </el-aside>
        <el-container>
            <el-header>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="collapse navbar-collapse">
                                <!-- for logged-in user-->
                                <div class="navbar-nav" v-if="isLoggedIn">
                                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                                    <router-link to="/books" class="nav-item nav-link">Books</router-link>
                                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                                </div>
                                <!-- for non-logged user-->
                                <div class="navbar-nav" v-else>
                                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                                    <router-link to="/login" class="nav-item nav-link">login</router-link>
                                    <router-link to="/register" class="nav-item nav-link">Register
                                    </router-link>
                                    <router-link to="/about" class="nav-item nav-link">About</router-link>
                                </div>
                            </div>
                        </nav>
            </el-header>
            <el-main>
                <router-view/>
            </el-main>
            <el-footer>Footer</el-footer>
        </el-container>
    </el-container>
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

nav {
    height: 60px;
}

a {
    text-decoration: none;
}

.el-header, .el-footer {
    background-color: #B3C0D1;
    color: #333;
    text-align: center;
    line-height: 60px;
}

.el-header {
    padding: 0;
}

.el-aside {

    background-color: #D3DCE6;
    color: #333;
    text-align: center;
    line-height: 200px;
    height: 100vh;
}

.el-menu {
    background-color: #D3DCE6;
    margin-top: 60px;
    color: #333;
}

.el-main {
    background-color: #E9EEF3;
    color: #333;
    text-align: center;
    line-height: 160px;
}

body > .el-container {
    margin-bottom: 40px;
}

.el-container:nth-child(5) .el-aside,
.el-container:nth-child(6) .el-aside {
    line-height: 260px;
}

.el-container:nth-child(7) .el-aside {
    line-height: 320px;
}
</style>
