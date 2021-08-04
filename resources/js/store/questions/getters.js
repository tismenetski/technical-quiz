export default {

    getAllLoadedQuestions(state) {
        return state.questions;
    },
    getCurrentQuestionaire(state) {
        return state.currentQuestionaire;
    },
    getCurrentQuestionaireExists(state) {
        return state.currentQuestionaireExists;
    }
}
