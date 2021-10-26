<template>
    <div
        v-if="show"
        class="shadow sidebar position-fixed z-10"
        :style="{ marginTop: `${top}px`, height: `calc(100vh - ${top}px)` }"
    >
        <header
            class="commande-header d-flex justify-content-between px-3 pt-1"
        >
            <button @click="hideCommandes" class="btn btn-lg ml-auto">
                <i class="mdi mdi-close"></i>
            </button>
        </header>
        <component :is="component" v-bind="props"></component>
        <footer
            class="commande-footer px-3 d-flex justify-content-between align-items-center"
        >
            <div class="font-weight-bold">
                Prix Total: {{ prixTotal.toFixed(2) }} DH
            </div>
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
    data() {
        return {
            top: 0,
            show: false,
            produits: [],
            stages: [
                {
                    name: "Commandes",
                    props: {
                        produits: []
                    }
                },
                {
                    name: "Livreurs",
                    props: {
                        livreurId: null
                    }
                }
            ],
            currentStage: 0,
            component: "div",
            props: {},
            prixTotal: 0,
            form: {
                produits: [],
                livreur: null
            }
        };
    },
    methods: {
        calTotal() {
            if (!this.produits) return;

            this.prixTotal = this.produits.reduce((prev, item) => {
                const total = item.total || item.prix;
                return prev + total;
            }, 0);
            bus.$emit("prixTotalCal", this.prixTotal);
        },
        remove(index) {
            this.produits.splice(index, 1);
            this.calTotal();
            this.stroreCommandes();
        },
        scroll() {
            if (window.scrollY === 0) this.top = 64;
            else this.top = 0;
        },
        hideCommandes() {
            bus.$emit("toggleCommandes", false);
        },
        stroreCommandes() {
            localStorage.setItem("commandes", JSON.stringify(this.produits));
        },
        prevStage() {
            this.currentStage--;
            this.loadStage();
        },
        nextStage() {
            if (this.currentStage >= 1) {
                this.order();
                return;
            }
            this.currentStage++;
            this.loadStage();
        },
        loadStage() {
            if (!this.stages[this.currentStage]) {
                this.component = "div";
                this.props = {};
                return;
            }
            this.props = this.stages[this.currentStage].props;
            this.component = () =>
                import(`./${this.stages[this.currentStage].name}.vue`);
        },

        // Async
        async order() {
            this.form.produits = this.produits.map(item => {
                return {
                    id: item.id,
                    quantite: item.quantite || 1
                };
            });

            const res = await axios.post("/orders", this.form);

            console.debug(res);
        }
    },
    mounted() {
        window.addEventListener("scroll", this.scroll);
        this.scroll();
        bus.$on("toggleCommandes", state => {
            this.show = state;
        });

        const commandes = localStorage.getItem("commandes");

        if (commandes) {
            try {
                this.produits = JSON.parse(commandes);
            } catch (e) {}
            this.stages[0].props.produits = this.produits;
        }

        this.calTotal();

        bus.$on("livreurChange", id => {
            this.form.livreur = id;
            this.stages[1].props.livreurId = this.form.livreur;
        });

        bus.$on("newCommande", commande => {
            this.produits.push({ ...commande, quantite: 1 });

            this.stroreCommandes();
            bus.$emit("count", this.produits.length);
        });

        bus.$on("calcTotal", ({ total, quantite, index }) => {
            this.produits[index].total = total;
            this.produits[index].quantite = quantite;
            this.calTotal();
            this.stroreCommandes();
        });

        bus.$on("removeCommande", index => this.remove(index));

        bus.$emit("count", this.produits.length);

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
    width: 90%;
    height: 100vh;
}

@media screen and (min-width: 700px) {
    .sidebar {
        width: 50%;
    }
}
@media screen and (min-width: 1160px) {
    .sidebar {
        width: 35%;
    }
}
</style>
