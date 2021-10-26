<template>
    <v-app id="app-content">
        <navbar :menu-items="menuItems" :right-menu-items="rightMenuItems" />

        <v-main class="grey lighten-2">
            <v-container>
                <router-view />
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import Navbar from "../components/Layouts/Navbar.vue";

export default {
    components: { Navbar },
    data() {
        return {};
    }
};
</script>

<style lang="scss">
// $body-font-family: "Roboto", sans-serif;
</style>
