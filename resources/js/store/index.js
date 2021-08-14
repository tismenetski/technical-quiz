import { createStore } from 'vuex'
import authModule from './auth/index'
import questionsModule from './questions/index'
import categoriesModule from './categories/index'

const store = createStore({

    modules: {
        auth:authModule,
        questions: questionsModule,
        categories: categoriesModule
    }
})

export default store;
