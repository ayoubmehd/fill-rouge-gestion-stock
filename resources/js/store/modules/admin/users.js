import axios from "axios";

export default {
    state: () => ({
        users: [],
        error: null
    }),
    mutations: {
        setUsers(state, payload) {
            state.users = payload;
        },
        setErrors(state, payload) {
            state.error = payload;
        }
    },
    actions: {
        async fetchUsers({ commit }) {
            try {
                const response = await axios.get("/api/users");

                commit("setUsers", response.data);
            } catch (err) {
                commit("setError", err);
            }
        }
    },
    getters: {}
};