import mutations from './mutations.js';
import getters from './getters.js';
import actions from './actions.js';

export default {
    namespaced : true,
    state()  {
           return {
               currentQuestionaire : [],
               currentQuestionaireExists : false,
               questions : [],
               answeredQuestions : [],
               loading : false,
               errors : null,
           }
    },
    mutations,
    actions,
    getters,
}
