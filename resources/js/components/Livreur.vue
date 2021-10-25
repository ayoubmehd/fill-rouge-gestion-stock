<template>
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 mw-25">
                    {{ name }}
                </h5>
                <p class="card-text mb-0 h5" :class="reviewClass">
                    <i class="mdi mdi-star-check h3 mb-0 order-icon"></i>
                    {{ livreur.point }}
                </p>
                <p class="card-text mb-0 h5">
                    <i class="mdi mdi-truck h3 mb-0 order-icon"></i>
                    {{ livreur.livraisons_count }}
                </p>
                <div class="">
                    <div class="form-check">
                        <label
                            class="form-check-label btn btn-sm"
                            :class="
                                livreurId === livreur.id ? 'btn-primary' : ''
                            "
                            :for="`livreur-${livreur.id}`"
                        >
                            <input
                                type="radio"
                                class="form-check-input d-none"
                                name="livreur"
                                :id="`livreur-${livreur.id}`"
                                :value="livreur.id"
                                :checked="livreurId === livreur.id"
                                @change="livreurChange(livreur.id)"
                            />
                            Livrer par
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import bus from "../helpers/bus.js";

export default {
    props: ["livreur", "livreurId"],
    computed: {
        name() {
            return this.livreur.name.length >= 6
                ? this.livreur.name.substring(0, 6) + "..."
                : this.livreur.name;
        },
        reviewClass() {
            return this.livreur.point > 0 ? "text-primary" : "text-danger";
        }
    },
    methods: {
        livreurChange(id) {
            bus.$emit("livreurChange", id);
        }
    }
};
</script>

<style></style>
