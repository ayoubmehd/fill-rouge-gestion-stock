<template>
    <div class="px-3 overflow-auto" style="height: 80%">
        <livreur
            v-for="(l, i) in livreurs"
            :key="i"
            :livreur="l"
            :livreurId="livreurId"
        ></livreur>

        <button
            type="button"
            :disabled="isLastPage"
            class="btn btn-primary btn-lg btn-block"
            @click="loadMore"
        >
            <i class="mdi mdi-arrow-down"></i>
            Load More
        </button>
    </div>
</template>

<script>
import bus from "../helpers/bus";
import Livreur from "./Livreur.vue";

export default {
    props: ["livreurId"],
    components: {
        Livreur
    },
    data() {
        return {
            livreurs: [],
            url: "/livreurs",
            isLastPage: false
        };
    },
    methods: {
        async loadLivreurs() {
            if (!this.url) return;
            const res = await axios.get(this.url);
            this.livreurs = [...this.livreurs, ...res.data.data];
            if (!res.data.next_page_url) {
                this.url = null;
                this.isLastPage = true;
                return;
            }
            const url = new URL(res.data.next_page_url);
            this.url = url.pathname + url.search;
        },
        loadMore() {
            this.loadLivreurs();
        }
    },
    mounted() {
        this.loadLivreurs();
    }
};
</script>

<style></style>
