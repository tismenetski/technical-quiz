<template>
    <div class="questionnaire-main" v-if="questionnaireExists && questionnaire.length > 0">
        <div class="question">
            <h3>{{questionNumber}}</h3>
            <h4>{{questionDifficulty}}</h4>
            <h5>{{questionCategory}}</h5>
            <hr>
            <p class="question-text">{{getCurrentQuestion}}</p>
            <hr>
            <div v-for="(answer,index) in extractAnswers" :key="index" class="answers">
                    <div class="answer" v-if="answer!==null">
                        <input type="checkbox" :value="answer" v-model="selectedAnswersCurrentQuestion">
                        <span>{{answer}}</span>
                    </div>
            </div>
        </div>
        <button class="submit-answer" v-on:click="checkAnswer">Submit Answers</button>
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
            currentQuestionNumber : 0,
            questionnaireExists : false,
            currentQuestion : null,
            currentQuestionAnswers: [],
            selectedAnswersCurrentQuestion : [],
            correct_answer  : true,
            showToast : false,

        }
    },
    methods : {
      async checkAnswer() {
            let answers = this.selectedAnswersCurrentQuestion;
            let arr = JSON.parse(this.currentQuestion.answers);
            let arr2 = JSON.parse(this.currentQuestion.correct_answers);
            arr = Object.keys(arr).map((k) => arr[k]);
            arr2 = Object.keys(arr2).map((k) => arr2[k]);
            answers = Object.keys(answers).map((k) => answers[k]);
            answers.forEach(answer => {

                // console.log(arr.contains(answer));
                if (arr.includes(answer)){
                    let index = arr.indexOf(answer);
                    if (arr2[index] === 'false') {
                        this.correct_answer = false;
                    }
                }

            });
            if (this.correct_answer) {
                this.$swal({
                    toast : true,
                    title : "Correct Answer",
                    position : 'top-right',
                    timer : 3000,
                    timerProgressBar : true,
                    icon: 'success'
                })
            }
            else {
                this.$swal({
                    toast : true,
                    title : "Wrong Answer",
                    position : 'top-right',
                    timer : 3000,
                    timerProgressBar : true,
                    icon: 'error'
                })
            }
          await  this.$store.dispatch('questions/answerQuestion',{
              answer : this.correct_answer,
              question_id : this.currentQuestion.id,
              category_id : this.currentQuestion.category_id
          })
          this.nextQuestion();

        },
        nextQuestion() {
            this.currentQuestion = this.questionnaire[++this.currentQuestionNumber];
            this.correct_answer = true;
            this.selectedAnswersCurrentQuestion = [];
        }
    },
    created() {
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
            return JSON.parse(this.currentQuestion.answers);
        },
        questionNumber() {
            return  `Question Number: ${this.currentQuestionNumber +1} `;
        },
        questionDifficulty() {
            return `Question Difficulty: ${this.currentQuestion.difficulty}`;
        },
        questionCategory() {
            return `Question Category: ${this.currentQuestion.category}`;
        }
    }
}
</script>

<style scoped>

h3,h4,h5 {
    text-align: center;
    color: #fff;
}

.question {
    margin-top: 65px;
    text-align: center;
}

.answer {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content:center;
}

.answer span {
    padding: 10px;
    font-size: 18px;
    color: #fff;
}

.answer input {
    padding : 10px;
}

.question-text {
    font-size: 30px;
    color: #fff;
}

.submit-answer {
    display: block;
    width: 15vw;
    height: 5vh;
    background-color: #824275;
    color: #fff;
    padding: 20px;
    border-radius: 20px;
    margin-left:auto;
    margin-right: auto;
    margin-top: 20px;
    line-height: 0 !important;
}
</style>
