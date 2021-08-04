<template>
    <div v-if="questionnaireExists && questionnaire.length > 0">
<!--    <el-tag>Question Number {{currentQuestionNumber}}</el-tag>-->
<!--        <el-card class="box-card">-->
<!--                <div class="card-header">-->
<!--                    <span>{{getCurrentQuestion}}</span>-->
<!--                    <el-button class="button" type="text">Operation button</el-button>-->
<!--                </div>-->
<!--&lt;!&ndash;            <div v-for="o in 4" :key="o" class="text item">&ndash;&gt;-->
<!--&lt;!&ndash;                {{'List item ' + o }}&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--            <el-checkbox-group v-for="answer in currentQuestion.answers" v-model="answers">-->
<!--                <el-checkbox :label="answer.text"></el-checkbox>-->
<!--            </el-checkbox-group>-->
<!--        </el-card>-->
        <div class="question">
            <h3>Question Number {{currentQuestionNumber}}</h3>
            <p>{{getCurrentQuestion}}</p>

            <div v-for="(answer,index) in extractAnswers" :key="index" class="answers">
                    <div v-if="answer!==null">
                        <input v type="checkbox" name="index" id="">
                        <span>{{answer}}</span>
                    </div>
            </div>
        </div>
    </div>
    <div v-else>
        Please Create A New Questionnaire
    </div>
<!--    -->
</template>

<script>
export default {
    name: "Questionnaire",
    data() {
        return {
            questionnaire : [],
            currentQuestionNumber : 1,
            questionnaireExists : false,
            currentQuestion : null,

        }
    },
    created() {
        console.log('Questionnaire Created!!');
        if (this.$store.getters['questions/getCurrentQuestionaireExists']){
            this.questionnaireExists = true;
            this.questionnaire = this.$store.getters['questions/getCurrentQuestionaire'].data;
            this.currentQuestion  = this.questionnaire[0];
        }

    },
    computed : {
        getCurrentQuestion () {
            return this.currentQuestion.question
        },
        extractAnswers() {
            console.log(JSON.parse(this.currentQuestion.answers));
            return JSON.parse(this.currentQuestion.answers);

        }
    }
}
</script>

<style scoped>
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.box-card {
    width: 100%;
}

.text {
    font-size: 14px;
}

.item {
    margin-bottom: 18px;
}

.box-card {
    width: 480px;
}
</style>
