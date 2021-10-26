<template>
    <div class="inner">
        <div class="px-3">
            <produit
                v-for="(produit, index) in produits"
                :produit="produit"
                :key="Math.random().toString()"
                :index="index"
                @remove="remove"
            />
        </div>
    </div>
</template>

<script>
import bus from "./../helpers/bus.js";
import Produit from "./CommandeProduit.vue";

export default {
    props: ["produits"],
    components: {
        Produit
    },
    data: () => ({
        top: 0,
        show: false
    }),
    methods: {
        hideCommandes() {
            bus.$emit("toggleCommandes", false);
        },
        remove(index) {
            bus.$emit("removeCommande", index);
        }
    },
    mounted() {
        bus.$on("toggleCommandes", state => {
            this.show = state;
        });
    }
};
</script>

<style>
.inner {
    height: 80%;
    overflow: auto;
}
.top {
    top: 0;
}
.right {
    right: 0;
}
.commande-footer {
    height: 10%;
}
</style>
