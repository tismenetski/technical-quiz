export default {

    async getAllQuestions(context,data) {
        console.log('getAllQuestions Endpoint on frontend');
    },
     async getNewQuestionaire(context,data) {
        console.log('getNewQuestionaire Endpoint on frontend');

        console.log(data);
        // todo this should be a call in the actions of questions store
         await axios.get('/sanctum/csrf-cookie');
         const response = await axios.post('/api/questions/createNewQuestionnaire',data);
                 console.log(response.data);
                 context.commit('setNewQuestionnaire',response.data);
        // axios.get('/sanctum/csrf-cookie').then(response => {
            // axios.post('/api/questions/createNewQuestionnaire',data)
            //     .then(response => {
            //         console.log(response.data);
            //         context.commit('setNewQuestionnaire',response.data);
            //     })
            //     .catch(function (error) {
            //         console.error(error);
            //     });
        // })


    }
}
