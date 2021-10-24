<template>
    <div class="card shadow mb-4 position-relative">
        <button
            class="btn btn-circle btn-danger btn-sm position-absolute top right"
            style="top: 1.25rem; right: 1.25rem"
            @click="$emit('remove', index)"
        >
            <i class="mdi mdi-trash-can" aria-hidden="true"></i>
        </button>
        <div class="card-body">
            <h3 class="card-title font-weight-bold">
                {{ produit.name }}
            </h3>
            <h4 class="card-title">{{ produit.prix }} MAD</h4>
            <p class="card-text">
                {{ produit.description }}
            </p>
            <div class="d-flex align-items-end">
                <form action="" class="mb-0">
                    <div class="form-group mb-0">
                        <label for="">Quantite</label>
                        <input
                            type="number"
                            name=""
                            id=""
                            class="form-control"
                            placeholder=""
                            v-model="quantite"
                        />
                    </div>
                </form>
                <div class="mb-2 ml-2">{{ totale }} DH</div>
            </div>
        </div>
    </div>
</template>

<script>
import bus from "../helpers/bus.js";

export default {
    props: ["index", "produit"],
    computed: {
        quantite: {
            get() {
                return this.produit.quantite;
            },
            set(val) {
                this.totale = this.produit.prix * val;

                bus.$emit("calcTotal", {
                    total: this.totale,
                    quantite: val,
                    index: this.index
                });
            }
        }
    },
    data() {
        return {
            totale: this.produit.total || this.produit.prix
        };
    }
};
</script>

<style></style>
