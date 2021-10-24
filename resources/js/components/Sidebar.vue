<template>
    <div
        v-if="show"
        class="shadow sidebar position-fixed z-10"
        :style="{ marginTop: `${top}px`, height: `calc(100vh - ${top}px)` }"
    >
        <header
            class="commande-header d-flex justify-content-between px-3 pt-3"
        >
            <button @click="hideCommandes" class="btn btn-lg ml-auto">
                <i class="mdi mdi-close"></i>
            </button>
        </header>
        <component :is="component"></component>
        <footer
            class="commande-footer px-3 d-flex justify-content-between align-items-center"
        >
            <div class="font-weight-bold">Prix Total: {{ prixTotal }}</div>
            <button
                @click="nextStage"
                type="button"
                class="btn btn-primary btn-lg px-3"
            >
                Order
            </button>
        </footer>
    </div>
</template>

<script>
import bus from "../helpers/bus.js";

export default {
    data: () => ({
        top: 0,
        show: false,
        stages: ["Commandes", "Livreurs"],
        currentStage: 0,
        component: "div",
        prixTotal: 0
    }),
    methods: {
        scroll() {
            if (window.scrollY === 0) {
                this.top = 64;
            } else this.top = 0;
        },
        hideCommandes() {
            bus.$emit("toggleCommandes", false);
        },
        nextStage() {
            this.currentStage++;
            this.loadStage();
        },
        loadStage() {
            if (!this.stages[this.currentStage]) {
                this.component = "div";
                return;
            }

            this.component = () =>
                import(`./${this.stages[this.currentStage]}.vue`);
        }
    },
    mounted() {
        window.addEventListener("scroll", this.scroll);
        this.scroll();
        bus.$on("toggleCommandes", state => {
            this.show = state;
        });

        bus.$on("prixTotalCal", val => {
            this.prixTotal = val;
        });

        this.loadStage();
    },
    destroyed() {
        window.removeEventListener("scroll", this.scroll);
    }
};
</script>

<style>
.sidebar {
    background-color: #f5f5f5;
    z-index: 99;
    top: 0;
    right: 0;
    bottom: 0;
    width: 35%;
    height: 100vh;
}
</style>
