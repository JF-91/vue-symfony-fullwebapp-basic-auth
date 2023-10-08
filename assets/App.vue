<template >
    <div >
       <nav>
            <router-link class="link-router" to="/">Home</router-link> 
            <router-link class="link-router" to="/about">About</router-link>
            <router-link class="link-router" to="/dashboard">Dashboard</router-link>
            <router-link class="link-router" to="/login">Login</router-link>
            <router-link class="link-router" to="/register">Register</router-link>
       </nav>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'App',
}
</script>
<style lang="scss" scoped>

    nav{
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        margin-right: 20px;
        background-color: #f5f5f5ac;
        padding: 10px;


    }

    .link-router{
        margin-right: 10px;
        text-decoration: none;
        color: black;
        &:hover{
            color: red;
            text-decoration: underline;

        }
    }
</style>