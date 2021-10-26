<template>
    <div class="mt-5">
        <section class="heading dashboard__container">
            <div class="dashboard__wrap">
                <h1>
                    Users
                </h1>
                <v-btn fab dark color="indigo">
                    <v-icon dark>
                        mdi-plus
                    </v-icon>
                </v-btn>
            </div>
        </section>

        <section class="my-3 heading dashboard__container">
            <div class="dashboard__wrap flex-column">
                <v-text-field
                    label="Search"
                    append-icon="mdi-magnify"
                ></v-text-field>
                <v-autocomplete
                    filled
                    flwidth
                    chips
                    color="blue-grey lighten-2"
                    label="Select"
                    item-text="name"
                    item-value="name"
                    multiple
                >
                    <!-- <template v-slot:selection="data"></template> -->
                    <!-- <template v-slot:item="data"></template> -->
                </v-autocomplete>
            </div>
        </section>

        <section class="heading dashboard__container">
            <div class="dashboard__wrap"></div>
        </section>

        <div>
            <v-data-table :headers="headers" :items="users">
                <template v-slot:item.name="props">
                    <v-edit-dialog
                        :return-value.sync="props.item.name"
                        @save="save"
                        @cancel="cancel"
                        @open="open"
                        @close="close"
                    >
                        {{ props.item.name }}
                        <template v-slot:input>
                            <v-text-field
                                v-model="props.item.name"
                                :rules="[max25chars]"
                                label="Edit"
                                single-line
                                counter
                            ></v-text-field>
                        </template>
                    </v-edit-dialog>
                </template>
                <template v-slot:item.iron="props">
                    <v-edit-dialog
                        :return-value.sync="props.item.iron"
                        large
                        persistent
                        @save="save"
                        @cancel="cancel"
                        @open="open"
                        @close="close"
                    >
                        <div>{{ props.item.iron }}</div>
                        <template v-slot:input>
                            <div class="mt-4 text-h6">
                                Update Iron
                            </div>
                            <v-text-field
                                v-model="props.item.iron"
                                :rules="[max25chars]"
                                label="Edit"
                                single-line
                                counter
                                autofocus
                            ></v-text-field>
                        </template>
                    </v-edit-dialog>
                </template>
            </v-data-table>

            <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
                {{ snackText }}

                <template v-slot:action="{ attrs }">
                    <v-btn v-bind="attrs" text @click="snack = false">
                        Close
                    </v-btn>
                </template>
            </v-snackbar>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            snack: false,
            snackColor: "",
            snackText: "",
            max25chars: v => v.length <= 25 || "Input too long!",
            pagination: {},
            headers: [
                { text: "User Name", value: "name" },
                { text: "Role", value: "role" }
            ],
            users: [
                {
                    name: "ayoub",
                    role: "admin"
                }
            ]
        };
    },
    methods: {
        save() {
            this.snack = true;
            this.snackColor = "success";
            this.snackText = "Data saved";
        },
        cancel() {
            this.snack = true;
            this.snackColor = "error";
            this.snackText = "Canceled";
        },
        open() {
            this.snack = true;
            this.snackColor = "info";
            this.snackText = "Dialog opened";
        },
        close() {
            console.log("Dialog closed");
        }
    }
};
</script>

<style></style>
