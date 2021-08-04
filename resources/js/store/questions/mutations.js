export default {

    setNewQuestionnaire(state,payload) {
        console.log('setNewQuestionnaire Mutator');
        console.log(payload);
        state.currentQuestionaire = payload;
        console.log(state.currentQuestionaire);
        state.currentQuestionaireExists = true;
    }
}
