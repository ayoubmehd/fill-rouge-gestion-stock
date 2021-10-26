<template>
    <div
        v-if="!commandesState"
        class="position-fixed right top-2 show-commandes"
    >
        <button
            v-if="!show"
            @mouseenter="show = true"
            type="button"
            class="btn btn-primary"
        >
            <i class="mdi mdi-shopping"></i>
        </button>
        <button
            v-if="show"
            @mouseleave="show = false"
            @click="toggleCommandes"
            type="button"
            class="btn btn-primary"
        >
            Commandes
            <span class="badge badge-light">{{ commandesCount }}</span>
        </button>
    </div>
</template>

<script>
import bus from "./../helpers/bus.js";

export default {
    data() {
        return { commandesCount: 0, show: false, commandesState: false };
    },
    methods: {
        toggleCommandes() {
            this.commandesState = !this.commandesState;
            bus.$emit("toggleCommandes", this.commandesState);
        }
    },
    mounted() {
        bus.$on("toggleCommandes", state => {
            this.commandesState = state;
        });
        bus.$on("showMoreFor", time => {
            this.show = true;
            setTimeout(() => {
                this.show = false;
            }, time);
        });

        bus.$on("count", count => (this.commandesCount = count));
    }
};
</script>

<style>
.show-commandes {
    z-index: 99;
}
.top-2 {
    top: 100px;
}
.right {
    right: 0;
}
</style>
