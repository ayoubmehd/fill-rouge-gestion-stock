<template>
    <div class="inner">
        <div class="px-3">
            <produit
                v-for="(produit, index) in porduits"
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
    components: {
        Produit
    },
    data: () => ({
        porduits: [],
        top: 0,
        show: false
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
        stroreCommandes() {
            localStorage.setItem("commandes", JSON.stringify(this.porduits));
        },
        remove(index) {
            this.porduits.splice(index, 1);
            this.calTotal();
            this.stroreCommandes();
        },
        calTotal() {
            this.prixTotal = this.porduits.reduce((prev, item) => {
                const total = item.total || item.prix;
                return prev + total;
            }, 0);
            bus.$emit("prixTotalCal", this.prixTotal);
        }
    },
    mounted() {
        window.addEventListener("scroll", this.scroll);
        this.scroll();
        const commandes = localStorage.getItem("commandes");
        if (commandes) {
            this.porduits = JSON.parse(commandes);
            this.calTotal();
        }
        bus.$on("toggleCommandes", state => {
            this.show = state;
        });

        bus.$on("newCommande", commande => {
            this.porduits.push({ ...commande, quantite: 1 });
            this.calTotal();
            this.stroreCommandes();
            bus.$emit("count", this.porduits.length);
        });

        bus.$emit("count", this.porduits.length);

        bus.$on("calcTotal", ({ total, quantite, index }) => {
            this.porduits[index].total = total;
            this.porduits[index].quantite = quantite;
            this.calTotal();
            this.stroreCommandes();
        });
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
