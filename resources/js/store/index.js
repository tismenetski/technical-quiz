import { createStore } from 'vuex'
import authModule from './auth/index'
import questionsModule from './questions/index'

const store = createStore({

    modules: {
        authModule,
        questionsModule
    }
})

export default store;
