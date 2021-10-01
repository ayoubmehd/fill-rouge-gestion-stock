<template>
    <div>
        <component :is="app"></component>
    </div>
</template>

<script>
export default {
    props: {
        appName: {
            type: String,
            default: "Admin"
        }
    },
    data() {
        return {
            app: null
        };
    },
    mounted() {
        this.app = async () => await import(`./apps/${this.appName}`);
    }
};
</script>

<style lang="scss">
// $body-font-family: "Roboto", sans-serif;
</style>
