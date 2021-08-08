export default {

    setNewQuestionnaire(state,payload) {
        console.log('setNewQuestionnaire Mutator');
        console.log(payload);
        state.currentQuestionaire = payload;
        console.log(state.currentQuestionaire);
        state.currentQuestionaireExists = true;
    },
    setAnsweredQuestions(state,payload) {
        console.log('setAnsweredQuestions Mutator');
        console.log(payload);
        state.answeredQuestions = payload;
        console.log(state.answeredQuestions);

    }
}
