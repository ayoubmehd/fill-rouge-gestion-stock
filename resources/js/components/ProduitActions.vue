<template>
    <div>
        <button
            @click="order"
            type="button"
            class="btn btn-primary text-white btn-lg"
        >
            Order
        </button>
        <button
            @click="likeUnlike"
            type="button"
            class="btn btn-lg"
            :class="likeText"
        >
            <!-- If liked text-primary -->
            <i class="mdi" :class="likeIcon"></i>
            <!-- If liked heart -->
            Like
        </button>
    </div>
</template>

<script>
import bus from "./../helpers/bus.js";

export default {
    props: ["produit"],
    data() {
        return {
            liked: this.produit.liked
        };
    },
    methods: {
        order() {
            bus.$emit("showMoreFor", 1000);
            bus.$emit("newCommande", this.produit);
        },
        likeUnlike() {
            axios.get("/sanctum/csrf-cookie");
            if (this.liked) {
                axios.delete(`/produits/${this.produit.id}/like`).then(() => {
                    this.liked = false;
                });
                return;
            }
            axios.post(`/produits/${this.produit.id}/like`).then(() => {
                this.liked = true;
            });
        }
    },
    computed: {
        likeIcon() {
            return this.liked ? "mdi-heart" : "mdi-heart-outline";
        },
        likeText() {
            return this.liked ? "text-primary" : "";
        }
    }
};
</script>

<style></style>
