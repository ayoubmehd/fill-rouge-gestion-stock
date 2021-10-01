<template>
  <nav class="navbar">
            <v-container>
                <router-link to="/" tag="span" style="cursor: pointer">
                    <v-icon size="45">mdi-mustache</v-icon>
                    {{ title }}
                </router-link>
                <ul class="navbar__nav">
                    <li
                        class="navbar__item"
                        v-for="item in menuItems"
                        :key="item.text"
                    >
                        <router-link
                            class="navbar__link navbar__link-main"
                            :to="item.to"
                            :exact="item.exact"
                        >
                            <v-icon class="navbar__link-icon" size="30">
                                {{ item.icon }}
                            </v-icon>
                            {{ item.text }}
                        </router-link>
                    </li>
                </ul>

                <ul class="navbar__nav">
                    <li
                        class="navbar__item"
                        v-for="item in rightMenuItems"
                        :key="item.text"
                    >
                        <a class="navbar__link" href="">
                            <v-icon size="30">{{ item.icon }}</v-icon>
                        </a>
                    </li>
                </ul>
            </v-container>
        </nav>
</template>

<script>
// import Layout from "./components/Layouts/Layout.vue";

export default {
    components: {},
    props: {
        menuItems: [],
        rightMenuItems: [],
        title: {
            type: String,
            default: "Admin"
        }
    },
    data() {
        return {
            
        };
    }
};
</script>
</script>

<style>

</style>