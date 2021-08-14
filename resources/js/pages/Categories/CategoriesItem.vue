<template>
    <td>{{ category.name }}</td>
    <td>{{ category.questions_count }}</td>
    <td>{{category.read_questions}}</td>
    <td>{{category.answered_questions}}</td>
    <td>{{progress}}</td>

</template>

<script>
export default {
    props: ['category'],
    name: "CategoriesItem",
    computed : {
        progress() {
            console.log(this.category);
            if (this.category.read_questions > 0 ) {
                return (this.category.answered_questions / this.category.questions_count) * 100 + '%';
            }
            return '0%';
        }
    }
}
</script>

<style scoped>
td {
    text-align : center;
    color: var(--text-color);
    font-size: 16px;
}
</style>
