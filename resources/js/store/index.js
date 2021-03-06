import Vue from 'vue';
import Vuex, { createLogger } from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    strict: debug,
    modules: {
    },
    plugins: debug ? [createLogger()] : []
});