import Vue from 'vue';
import Vuex from 'vuex';
import moment from 'moment';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        availableGames: [],
    },
    getters: {
        availableGames: (state) => {
            return state.availableGames;
        },
    },
    mutations: {
        setAvailableGames(state, games) {
            state.availableGames = games;
        },
    },
    actions: {
        getAvailableGames({ commit }, { locationSlug, date }) {
            const formattedDate = moment(date).format('YYYY-MM-DD');

            return window.axios
                .get(
                    `/api/availability/${locationSlug}?include=room.theme,room.location,rate&initial_date=${formattedDate}&final_date=${formattedDate}&filter[bookable]=true`
                )
                .then((response) => {
                    commit('setAvailableGames', response.data.data);

                    return Promise.resolve(response);
                })
                .catch((error) => {
                    return Promise.reject(error);
                });
        },
    },
});

export default store;
