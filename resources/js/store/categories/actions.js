export default {

    async getCategoriesAction(context) {
        // await axios.get('/sanctum/csrf-cookie');
        const response = await axios.get('/api/categories');
        const categories = response.data.data;

        context.commit('setCategories',categories);
    },

    async getCategoriesForUserAction(context) {
        const response = await axios.get('/api/categories/categoriesForUser');
        const categories = response.data.data;
        console.log(categories);
        context.commit('setCategoriesForUser',categories);
    }

}
